<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskTrackerController;
use App\Http\Controllers\AuthController;

Route::get('/check-session-config', function () {
    return response()->json([
        'env_value' => env('SESSION_SAME_SITE'),
        'config_value' => config('session.same_site'),
        'secure' => config('session.secure'),
    ]);
});

Route::post('/register', [AuthController::class, 'register'])->middleware('web');
Route::post('/login', [AuthController::class, 'login'])->middleware('web');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::post('/add', [TaskTrackerController::class, 'addTask'])->middleware('auth:sanctum');

Route::get('/show', [TaskTrackerController::class, 'show'])->middleware('auth:sanctum');

Route::put('/completed/{id}', [TaskTrackerController::class, 'toggleCompletion'])->middleware('auth:sanctum');

Route::delete('/delete/{id}', [TaskTrackerController::class, 'remove'])->middleware('auth:sanctum');
