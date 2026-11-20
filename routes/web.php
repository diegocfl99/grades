<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ActivityController;

Route::get('/', function () {
    return redirect()->route('subjects.index');
});

// Rutas de materias
Route::resource('subjects', SubjectController::class);

// Rutas de actividades
Route::get('/subjects/{subject_id}/activities/create', [ActivityController::class, 'create'])
    ->name('activities.create');

Route::post('/subjects/{subject_id}/activities', [ActivityController::class, 'store'])
    ->name('activities.store');

Route::get('/activities/{id}/edit', [ActivityController::class, 'edit'])
    ->name('activities.edit');

Route::put('/activities/{id}', [ActivityController::class, 'update'])
    ->name('activities.update');

Route::delete('/activities/{id}', [ActivityController::class, 'destroy'])
    ->name('activities.destroy');
