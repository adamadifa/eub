<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;
use App\Models\Enrollment;
use App\Models\QuestionnaireTemplate;
use App\Models\Question;
use App\Models\Response;
use App\Models\CourseClass;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function dashboard()
    {
        $activeSemester = Semester::where('is_active', true)->first();
        
        if (!$activeSemester) {
            return view('student.dashboard', ['enrollments' => [], 'activeSemester' => null]);
        }

        $enrollments = Enrollment::with(['courseClass.course', 'courseClass.lecturer.user'])
            ->where('user_id', auth()->id())
            ->whereHas('courseClass', function($query) use ($activeSemester) {
                $query->where('semester_id', $activeSemester->id);
            })
            ->get();

        // Check completion status for each enrollment
        foreach ($enrollments as $enrollment) {
            $enrollment->is_completed = Response::where('user_id', auth()->id())
                ->where('course_class_id', $enrollment->course_class_id)
                ->exists();
        }

        return view('student.dashboard', compact('enrollments', 'activeSemester'));
    }

    public function showQuestionnaire(CourseClass $courseClass)
    {
        $activeTemplate = QuestionnaireTemplate::where('is_active', true)->with('questions')->first();
        
        if (!$activeTemplate) {
            return redirect()->route('dashboard')->with('error', 'Tidak ada kuesioner aktif saat ini.');
        }

        // Check if already filled
        $alreadyFilled = Response::where('user_id', auth()->id())
            ->where('course_class_id', $courseClass->id)
            ->exists();

        if ($alreadyFilled) {
            return redirect()->route('dashboard')->with('error', 'Anda sudah mengisi kuesioner untuk mata kuliah ini.');
        }

        return view('student.questionnaire', compact('courseClass', 'activeTemplate'));
    }

    public function storeResponse(Request $request, CourseClass $courseClass)
    {
        $activeTemplate = QuestionnaireTemplate::where('is_active', true)->first();
        
        $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required', // For likert it's 1-5, for essay it's string
        ]);

        try {
            DB::beginTransaction();

            foreach ($request->answers as $questionId => $answer) {
                $question = Question::find($questionId);
                
                Response::create([
                    'user_id' => auth()->id(),
                    'course_class_id' => $courseClass->id,
                    'question_id' => $questionId,
                    'value' => $question->type === 'likert' ? $answer : null,
                    'comments' => $question->type === 'essay' ? $answer : null,
                ]);
            }

            DB::commit();
            return redirect()->route('dashboard')->with('success', 'Terima kasih! Kuesioner berhasil dikirim.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat menyimpan jawaban.');
        }
    }
}
