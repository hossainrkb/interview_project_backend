<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TechDeptSubController;
use App\Http\Controllers\TechStudentController;
use App\Http\Controllers\TechSubjectController;
use App\Http\Controllers\TechMarkSheetController;
use App\Http\Controllers\TechProbidhanController;
use App\Http\Controllers\TechTechnologyController;

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::group(['prefix' => 'subjects', 'as' => 'subjects.'], function () {
        Route::get('/', [TechSubjectController::class, 'index'])->name('index');
        Route::get('/create', [TechSubjectController::class, 'create'])->name('create');
        Route::post('/store', [TechSubjectController::class, 'store'])->name('store');
        Route::get('{subject}/show', [TechSubjectController::class, 'show'])->name('show');
        Route::get('{subject}/edit', [TechSubjectController::class, 'edit'])->name('edit');
        Route::post('{subject}/update', [TechSubjectController::class, 'update'])->name('update');
    });
    Route::group(['prefix' => 'probidhan/technology', 'as' => 'probidhan.technology.'], function () {
        Route::get('/', [TechTechnologyController::class, 'probidhan']);
        Route::get('/{probidhan}', [TechTechnologyController::class, 'probidhan_technology'])->name('show');
        Route::get('/{probidhan}/{technology}', [TechTechnologyController::class, 'technology_subject'])->name('subject');
        Route::get('/{probidhan}/{technology}/semester', [TechTechnologyController::class, 'technology_subject_semester'])->name('subject.semester');
    });
    Route::group(['prefix' => 'students', 'as' => 'students.'], function () {
        Route::get('/create', [TechStudentController::class, 'create'])->name('create');
        Route::post('/store', [TechStudentController::class, 'store'])->name('store');;

        Route::group(['prefix' => 'results', 'as' => 'results.'], function () {
            Route::get('/create', [TechMarkSheetController::class, 'create'])->name('create');
        });
    });
});
