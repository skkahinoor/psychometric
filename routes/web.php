<?php

use App\Http\Controllers\CareerCategoryController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CareerPathController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\institute\InstituteStudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\student\AssessmentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Role-based middleware examples
    // Admin only routes
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/admin/users', function () {
            return view('admin.users');
        })->name('admin.users');

        // Admin-only resource routes
        Route::resource('domain', DomainController::class);
        Route::resource('section', SectionController::class);
        Route::resource('question', QuestionController::class);
        Route::resource('careerpath', CareerPathController::class);
        Route::resource('careercategory', CareerCategoryController::class);
        Route::resource('career', CareerController::class);
        Route::resource('students', UserController::class);

        // Admin-only additional routes
        Route::get('domain/{id}/sections', [QuestionController::class, 'getSections'])->name('domain.sections');
        Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');
        Route::post('/questions/bulk-action', [QuestionController::class, 'bulkAction'])->name('question.bulk-action');

        // Admin-only institute management
        Route::get('/institute', [InstituteController::class, 'index'])->name('institute.index');
        Route::get('/institute/create', [InstituteController::class, 'create'])->name('institute.create');
        Route::post('/institute/store', [InstituteController::class, 'store'])->name('institute.store');
        Route::get('/institute/{id}/edit', [InstituteController::class, 'edit'])->name('institute.edit');
        Route::post('/institute/{id}/update', [InstituteController::class, 'update'])->name('institute.update');
        Route::delete('/admin/institute/{id}', [InstituteController::class, 'delete'])->name('institute.destroy');

        // Admin can view student report (same as institute)
        Route::get('admin/student/{id}/report', [\App\Http\Controllers\institute\InstituteStudentController::class, 'report'])->name('admin.student.report');
        Route::get('admin/student/{id}/report/pdf', [\App\Http\Controllers\institute\InstituteStudentController::class, 'reportPdf'])->name('admin.student.report.pdf');
    });

    // Student only routes
    Route::middleware(['student'])->group(function () {
        // Route::get('/student/dashboard', function () {
        //     return view('student.dashboard');
        // })->name('student.dashboard');

        // Route::get('/student/profile', function () {
        //     return view('student.profile');
        // })->name('student.profile');
        // Route::resource('students', UserController::class);

        Route::get('/assessment', [AssessmentController::class, 'index'])->name('assessment.index');
        Route::get('/assessment/domain/{id}', [AssessmentController::class, 'index'])->name('assessment.domain.view');
        Route::post('assessment/store', [AssessmentController::class, 'store'])->name('assessment.store');

        Route::get('/assessment/result', [AssessmentController::class, 'result'])->name('assessment.result');
        Route::get('/assessment/report', [AssessmentController::class, 'report'])->name('assessment.report');
        Route::get('/assessment/report/pdf', [AssessmentController::class, 'reportPdf'])->name('assessment.report.pdf');
    });

    // Institute only routes
    Route::middleware(['institute'])->group(function () {
        Route::resource('institutestudent', InstituteStudentController::class);
        Route::get('institutestudent/{id}/report', [InstituteStudentController::class, 'report'])->name('institutestudent.report');
        Route::get('institutestudent/{id}/report/pdf', [InstituteStudentController::class, 'reportPdf'])->name('institutestudent.report.pdf');
    });

});

require __DIR__ . '/auth.php';
