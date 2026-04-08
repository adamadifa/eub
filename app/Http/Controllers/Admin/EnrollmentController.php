<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\User;
use App\Models\CourseClass;
use App\Models\Semester;

class EnrollmentController extends Controller
{
    public function index(Request $request)
    {
        $activeSemester = Semester::where('is_active', true)->first();
        $selectedSemesterId = $request->get('semester_id', $activeSemester->id ?? null);
        $selectedClassId = $request->get('class_id');
        
        $semesters = Semester::all();
        $classes = CourseClass::with(['course', 'semester'])
            ->where('semester_id', $selectedSemesterId)
            ->get();
            
        $enrolledUserIds = [];
        $students = [];
        $selectedClass = null;

        if ($selectedClassId) {
            $selectedClass = CourseClass::with('course')->find($selectedClassId);
            $enrolledUserIds = Enrollment::where('course_class_id', $selectedClassId)
                ->pluck('user_id')
                ->toArray();
            
            $students = User::role('Mahasiswa')->get();
        }

        return view('admin.enrollments.index', compact(
            'semesters', 
            'selectedSemesterId', 
            'classes', 
            'selectedClassId',
            'students', 
            'enrolledUserIds',
            'selectedClass'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_class_id' => 'required|exists:course_classes,id',
            'user_ids' => 'nullable|array',
            'user_ids.*' => 'exists:users,id',
        ]);

        $classId = $request->course_class_id;
        $newUserIds = $request->user_ids ?? [];

        \DB::transaction(function () use ($classId, $newUserIds) {
            // Remove students no longer selected
            Enrollment::where('course_class_id', $classId)
                ->whereNotIn('user_id', $newUserIds)
                ->delete();

            // Add new students
            foreach ($newUserIds as $userId) {
                Enrollment::updateOrCreate([
                    'course_class_id' => $classId,
                    'user_id' => $userId
                ]);
            }
        });

        return redirect()->route('admin.enrollments.index', ['class_id' => $classId])
            ->with('success', 'Plotting mahasiswa berhasil diperbarui.');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return redirect()->route('admin.enrollments.index')->with('success', 'Plotting mahasiswa berhasil dihapus.');
    }
}
