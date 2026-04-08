<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuestionnaireTemplate;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class QuestionnaireController extends Controller
{
    public function index()
    {
        $templates = QuestionnaireTemplate::withCount('questions')->latest()->get();
        return view('admin.questionnaires.index', compact('templates'));
    }

    public function create()
    {
        return view('admin.questionnaires.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'sometimes|boolean',
        ]);

        if ($request->is_active) {
            QuestionnaireTemplate::query()->update(['is_active' => false]);
        }

        QuestionnaireTemplate::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => $request->is_active ?? false,
        ]);

        return redirect()->route('admin.questionnaires.index')->with('success', 'Template Kuesioner berhasil dibuat.');
    }

    public function show(QuestionnaireTemplate $questionnaire)
    {
        $questionnaire->load('questions');
        return view('admin.questionnaires.show', compact('questionnaire'));
    }

    public function edit(QuestionnaireTemplate $questionnaire)
    {
        return view('admin.questionnaires.edit', ['template' => $questionnaire]);
    }

    public function update(Request $request, QuestionnaireTemplate $questionnaire)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'sometimes|boolean',
        ]);

        if ($request->is_active) {
            QuestionnaireTemplate::where('id', '!=', $questionnaire->id)->update(['is_active' => false]);
        }

        $questionnaire->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => $request->is_active ?? false,
        ]);

        return redirect()->route('admin.questionnaires.index')->with('success', 'Template Kuesioner berhasil diperbarui.');
    }

    public function destroy(QuestionnaireTemplate $questionnaire)
    {
        $questionnaire->delete();
        return redirect()->route('admin.questionnaires.index')->with('success', 'Template Kuesioner berhasil dihapus.');
    }

    // Question Management
    public function storeQuestion(Request $request, QuestionnaireTemplate $questionnaire)
    {
        $request->validate([
            'content' => 'required|string',
            'group' => 'required|string|max:100', // Pedagogik, Profesional, dll
            'type' => 'required|in:likert,essay',
        ]);

        $order = $questionnaire->questions()->max('order') + 1;

        $questionnaire->questions()->create([
            'content' => $request->content,
            'group' => $request->group,
            'type' => $request->type,
            'order' => $order,
        ]);

        return back()->with('success', 'Pertanyaan berhasil ditambahkan.');
    }

    public function destroyQuestion(Question $question)
    {
        $question->delete();
        return back()->with('success', 'Pertanyaan berhasil dihapus.');
    }
}
