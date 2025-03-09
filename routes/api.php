<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\RolController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\ReminderController;

Route::middleware([Cors::class])->group(function () {
    // Definicion de rutas con Api Resource
    Route::apiResource('contact', ContactController::class);
    Route::apiResource('event', EventController::class);
    Route::apiResource('reminder', ReminderController::class);

    // Definicion de rutas de solo lectura para rol.
    Route::get('/rol', [RolController::class, 'index']);
    Route::get('/rol/{id}', [RolController::class, 'show']);

    // Route::post('/register', [AuthController::class, 'register']);
    // Route::post('/login', [AuthController::class, 'login']);
});