<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;



Route::apiResource("/projet",ProjectController::class);
