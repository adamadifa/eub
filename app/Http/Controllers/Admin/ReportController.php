<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use App\Models\Semester;
use App\Models\Response;
use App\Models\Question;
use App\Models\QuestionnaireTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $semesters = Semester::orderBy('created_at', 'desc')->get();
        $lecturers = Lecturer::with('user')->get();
        
        $selectedSemesterId = $request->get('semester_id', Semester::where('is_active', true)->first()?->id);
        
        return view('admin.reports.index', compact('semesters', 'lecturers', 'selectedSemesterId'));
    }

    public function show(Lecturer $lecturer, Semester $semester)
    {
        // 1. Get all classes for this lecturer in this semester
        $classIds = $lecturer->courseClasses()
            ->where('semester_id', $semester->id)
            ->pluck('id');

        // 2. Count unique respondents
        $respondentCount = Response::whereIn('course_class_id', $classIds)
            ->distinct('user_id')
            ->count('user_id');

        // 3. Get the active questionnaire template questions
        // We'll use the questions from the most recent active template that has responses for these classes
        // Or just the currently active template.
        $template = QuestionnaireTemplate::where('is_active', true)->first();
        
        if (!$template) {
            return back()->with('error', 'Tidak ada template kuesioner aktif.');
        }

        $questions = $template->questions()->orderBy('order')->get();

        // 4. Calculate averages per question
        $reportData = [];
        $totalSum = 0;
        $likertQuestionCount = 0;

        foreach ($questions as $question) {
            if ($question->type === 'likert') {
                $avg = Response::whereIn('course_class_id', $classIds)
                    ->where('question_id', $question->id)
                    ->avg('value') ?: 0;
                
                $reportData[] = [
                    'question' => $question->content,
                    'average' => $avg,
                ];
                
                $totalSum += $avg;
                $likertQuestionCount++;
            }
        }

        $totalAverage = $likertQuestionCount > 0 ? $totalSum / $likertQuestionCount : 0;
        $conversion100 = ($totalAverage / 5) * 100;

        return view('admin.reports.show', compact(
            'lecturer', 
            'semester', 
            'respondentCount', 
            'reportData', 
            'totalAverage', 
            'conversion100'
        ));
    }
}
