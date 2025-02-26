<?php

use App\Http\Controllers\AllCourseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Models\AllCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource("courses", CourseController::class)->middleware('auth:sanctum');
Route::apiResource("allcourses", AllCourseController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
