<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lecturer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;

class LecturerController extends Controller
{
    public function index()
    {
        $lecturers = Lecturer::with('user')->latest()->get();
        return view('admin.lecturers.index', compact('lecturers'));
    }

    public function create()
    {
        return view('admin.lecturers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'nidn' => 'required|string|max:50|unique:lecturers',
            'title' => 'required|string|max:100',
        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password ?? $request->nidn),
                'email_verified_at' => now(),
            ]);

            $user->assignRole('Dosen');

            $user->lecturer()->create([
                'nidn' => $request->nidn,
                'title' => $request->title,
            ]);
        });

        return redirect()->route('admin.lecturers.index')->with('success', 'Dosen berhasil ditambahkan. Password default adalah NIDN.');
    }

    public function edit(Lecturer $lecturer)
    {
        $lecturer->load('user');
        return view('admin.lecturers.edit', compact('lecturer'));
    }

    public function update(Request $request, Lecturer $lecturer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $lecturer->user_id,
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'nidn' => 'required|string|max:50|unique:lecturers,nidn,' . $lecturer->id,
            'title' => 'required|string|max:100',
        ]);

        DB::transaction(function () use ($request, $lecturer) {
            $userData = [
                'name' => $request->name,
                'email' => $request->email,
            ];

            if ($request->filled('password')) {
                $userData['password'] = Hash::make($request->password);
            }

            $lecturer->user->update($userData);

            $lecturer->update([
                'nidn' => $request->nidn,
                'title' => $request->title,
            ]);
        });

        return redirect()->route('admin.lecturers.index')->with('success', 'Data Dosen berhasil diperbarui.');
    }

    public function destroy(Lecturer $lecturer)
    {
        // Deleting the user will cascade to delete the lecturer
        $lecturer->user->delete();
        
        return redirect()->route('admin.lecturers.index')->with('success', 'Dosen berhasil dihapus.');
    }
}
