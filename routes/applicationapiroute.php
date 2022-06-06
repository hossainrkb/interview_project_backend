<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TechDeptSubApiController;
use App\Http\Controllers\Api\TechStudentApiController;
use App\Http\Controllers\Api\TechSubjectApiController;
use App\Http\Controllers\Api\TechSemesterApiController;

Route::group(['middleware' => ['web','auth'],'prefix' => 'api'], function () {
Route::post('/get-technology-by-probidhan-id/{probidhan}', [TechSubjectApiController::class, 'get_technology_by_probidhan']);
Route::post('/get-technology-by-session/{session}', [TechStudentApiController::class, 'get_technology_by_session']);
Route::post('/get-subject-by-technology/{technology}', [TechSubjectApiController::class, 'get_subject_by_technology']);
Route::post('/get-technology-by-subject/{subject}', [TechDeptSubApiController::class, 'get_technology_by_subject']);
Route::post('/get-technology-by-semester/{semester}', [TechSemesterApiController::class, 'get_technology_by_semester']);
Route::post('/remove-technology-subject/{techsubject}', [TechDeptSubApiController::class, 'delete']);
Route::post('/assign-sub-to-technology/{subject}', [TechDeptSubApiController::class, 'store']);
Route::post('/sub-structure-technology/{technology}', [TechDeptSubApiController::class, 'subject_structure_by_technology']);
});