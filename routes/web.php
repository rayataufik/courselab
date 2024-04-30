<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\IsAdmin;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'postLogin'])->middleware('guest');

Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'registerPost'])->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/course', function () {
    return view('pages.course');
});

Route::middleware(IsAdmin::class)->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/categories', [AdminController::class, 'showCategories']);
    Route::get('/category/create', [AdminController::class, 'createCategory']);
    Route::post('/category/new', [AdminController::class, 'storeCategory']);
    Route::get('/category/{slug}/edit', [AdminController::class, 'editCategory']);
    Route::get('/category/update', [AdminController::class, 'updateCategory']);
    Route::get('/category/delete', [AdminController::class, 'destroyCategory']);
});

Route::post('ckeditor/upload', [AdminController::class, 'upload'])->name('ckeditor.upload');
