<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->get();
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:50|unique:courses',
            'name' => 'required|string|max:255',
            'credits' => 'required|integer|min:1|max:10',
        ]);

        Course::create($request->only('code', 'name', 'credits'));

        return redirect()->route('admin.courses.index')->with('success', 'Mata Kuliah berhasil ditambahkan.');
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'code' => 'required|string|max:50|unique:courses,code,' . $course->id,
            'name' => 'required|string|max:255',
            'credits' => 'required|integer|min:1|max:10',
        ]);

        $course->update($request->only('code', 'name', 'credits'));

        return redirect()->route('admin.courses.index')->with('success', 'Mata Kuliah berhasil diperbarui.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.courses.index')->with('success', 'Mata Kuliah berhasil dihapus.');
    }
}
