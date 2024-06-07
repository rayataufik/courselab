<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware(Authenticate::using('sanctum'));

//posts
Route::apiResource('/course', App\Http\Controllers\Api\CourseController::class);
Route::apiResource('/category', App\Http\Controllers\Api\CategoryController::class);
Route::apiResource('/forum', App\Http\Controllers\Api\ForumController::class);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
