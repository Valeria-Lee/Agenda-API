<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\RolController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\ReminderController;

// Es necesario definir para poder trabajar con sus valores dinamicoss

// Definicion de rutas con Api Resource
Route::apiResource('contact', ContactController::class);
Route::apiResource('rol', RolController::class);
Route::apiResource('event', EventController::class);
Route::apiResource('reminder', ReminderController::class);