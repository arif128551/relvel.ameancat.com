<?php

use App\Http\Controllers\CareerRoleController;
use App\Http\Controllers\IndividualController;
use Illuminate\Support\Facades\Route;

Route::get('/career/roles', [CareerRoleController::class,'career_roles'])->name('career.roles');
Route::post('/career/roles/store', [CareerRoleController::class,'career_roles_store'])->name('career.roles.store');


Route::get('/individual', [IndividualController::class,'individual'])->name('individual');
Route::post('/individuals/store', [IndividualController::class,'individuals_store'])->name('individuals.store');
Route::get('/application/review', [IndividualController::class,'application_review'])->name('application.review');
Route::post('/application/remarks/store/{id}', [IndividualController::class,'application_remarks_store'])->name('application.remarks.store');
Route::get('/application/dispose/{id}', [IndividualController::class,'application_dispose'])->name('application.dispose');


Route::post('/application/review', [IndividualController::class,'application_review'])->name('application.review');
