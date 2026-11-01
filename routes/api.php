<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskTrackerController;

Route::post('/add', [TaskTrackerController::class, 'addTask']);

Route::get('/show', [TaskTrackerController::class, 'show']);

Route::put('/completed/{id}', [TaskTrackerController::class, 'toggleCompletion']);

Route::delete('/delete/{id}', [TaskTrackerController::class, 'remove']);
