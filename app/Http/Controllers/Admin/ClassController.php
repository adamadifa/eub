<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseClass;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Semester;

class ClassController extends Controller
{
    public function index()
    {
        $classes = CourseClass::with(['course', 'lecturer.user', 'semester'])->latest()->paginate(10);
        return view('admin.classes.index', compact('classes'));
    }

    public function create()
    {
        $courses = Course::all();
        $lecturers = Lecturer::with('user')->get();
        $semesters = Semester::all();
        return view('admin.classes.create', compact('courses', 'lecturers', 'semesters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'lecturer_id' => 'required|exists:lecturers,id',
            'semester_id' => 'required|exists:semesters,id',
            'name' => 'required|string|max:100',
        ]);

        CourseClass::create($request->all());

        return redirect()->route('admin.classes.index')->with('success', 'Kelas berhasil dibuat.');
    }

    public function edit(CourseClass $class)
    {
        $courses = Course::all();
        $lecturers = Lecturer::with('user')->get();
        $semesters = Semester::all();
        return view('admin.classes.edit', compact('class', 'courses', 'lecturers', 'semesters'));
    }

    public function update(Request $request, CourseClass $class)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'lecturer_id' => 'required|exists:lecturers,id',
            'semester_id' => 'required|exists:semesters,id',
            'name' => 'required|string|max:100',
        ]);

        $class->update($request->all());

        return redirect()->route('admin.classes.index')->with('success', 'Kelas berhasil diperbarui.');
    }

    public function destroy(CourseClass $class)
    {
        $class->delete();
        return redirect()->route('admin.classes.index')->with('success', 'Kelas berhasil dihapus.');
    }
}
