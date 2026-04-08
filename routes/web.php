<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\QuestionnaireController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    if (auth()->user()->hasRole('Admin')) {
        return app(\App\Http\Controllers\Admin\DashboardController::class)->index();
    }
    if (auth()->user()->hasRole('Mahasiswa')) {
        return app(\App\Http\Controllers\StudentController::class)->dashboard();
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:Mahasiswa'])->group(function () {
    Route::get('/questionnaire/{courseClass}', [\App\Http\Controllers\StudentController::class, 'showQuestionnaire'])->name('student.questionnaire');
    Route::post('/questionnaire/{courseClass}', [\App\Http\Controllers\StudentController::class, 'storeResponse'])->name('student.questionnaire.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Routes
    Route::middleware('role:Admin')->prefix('admin')->name('admin.')->group(function () {
        Route::resource('lecturers', \App\Http\Controllers\Admin\LecturerController::class);
        Route::resource('courses', \App\Http\Controllers\Admin\CourseController::class);
        Route::resource('semesters', \App\Http\Controllers\Admin\SemesterController::class);
        Route::resource('questionnaires', QuestionnaireController::class);
        Route::post('questionnaires/{questionnaire}/questions', [QuestionnaireController::class, 'storeQuestion'])->name('questionnaires.questions.store');
        Route::delete('questions/{question}', [QuestionnaireController::class, 'destroyQuestion'])->name('questionnaires.questions.destroy');

        // Academic Management
        Route::resource('students', \App\Http\Controllers\Admin\StudentManagementController::class);
        Route::post('students/import', [\App\Http\Controllers\Admin\StudentManagementController::class, 'import'])->name('students.import');
        Route::resource('classes', \App\Http\Controllers\Admin\ClassController::class);
        Route::get('enrollments', [\App\Http\Controllers\Admin\EnrollmentController::class, 'index'])->name('enrollments.index');
        Route::post('enrollments', [\App\Http\Controllers\Admin\EnrollmentController::class, 'store'])->name('enrollments.store');
        Route::delete('enrollments/{enrollment}', [\App\Http\Controllers\Admin\EnrollmentController::class, 'destroy'])->name('enrollments.destroy');

        // Reports
        Route::get('reports', [\App\Http\Controllers\Admin\ReportController::class, 'index'])->name('reports.index');
        Route::get('reports/{lecturer}/{semester}', [\App\Http\Controllers\Admin\ReportController::class, 'show'])->name('reports.show');
    });
});

require __DIR__ . '/auth.php';
