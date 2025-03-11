<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('/users')->group(function() {
	Route::get("/", [ UserController::class, "index"]);
});
Route::prefix('/appointments')->group(function() {
	Route::get("/", [ AppointmentController::class, "index"]);
});
