<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semester;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters = Semester::latest()->get();
        return view('admin.semesters.index', compact('semesters'));
    }

    public function create()
    {
        return view('admin.semesters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_active' => 'sometimes|boolean',
        ]);

        if ($request->is_active) {
            Semester::query()->update(['is_active' => false]);
        }

        Semester::create([
            'name' => $request->name,
            'is_active' => $request->is_active ?? false,
        ]);

        return redirect()->route('admin.semesters.index')->with('success', 'Semester berhasil ditambahkan.');
    }

    public function edit(Semester $semester)
    {
        return view('admin.semesters.edit', compact('semester'));
    }

    public function update(Request $request, Semester $semester)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_active' => 'sometimes|boolean',
        ]);

        if ($request->is_active) {
            Semester::query()->update(['is_active' => false]);
        }

        $semester->update([
            'name' => $request->name,
            'is_active' => $request->is_active ?? false,
        ]);

        return redirect()->route('admin.semesters.index')->with('success', 'Semester berhasil diperbarui.');
    }

    public function destroy(Semester $semester)
    {
        $semester->delete();
        return redirect()->route('admin.semesters.index')->with('success', 'Semester berhasil dihapus.');
    }
}
