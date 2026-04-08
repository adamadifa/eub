<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;

class StudentManagementController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048',
        ]);

        try {
            Excel::import(new StudentsImport, $request->file('file'));
            return redirect()->route('admin.students.index')->with('success', 'Data mahasiswa berhasil diimport.');
        } catch (\Exception $e) {
            return redirect()->route('admin.students.index')->with('error', 'Gagal mengimport data: ' . $e->getMessage());
        }
    }

    public function index()
    {
        $students = User::role('Mahasiswa')->latest()->paginate(10);
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'nim' => 'required|string|max:20|unique:users',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nim' => $request->nim,
            'password' => Hash::make($request->password ?? $request->nim),
            'email_verified_at' => now(),
        ]);

        $user->assignRole('Mahasiswa');

        return redirect()->route('admin.students.index')->with('success', 'Mahasiswa berhasil ditambahkan. Password default adalah NIM.');
    }

    public function edit(User $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    public function update(Request $request, User $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $student->id,
            'nim' => 'required|string|max:20|unique:users,nim,' . $student->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'nim' => $request->nim,
        ]);

        if ($request->password) {
            $student->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('admin.students.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy(User $student)
    {
        $student->delete();
        return redirect()->route('admin.students.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
