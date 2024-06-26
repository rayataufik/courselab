<?php

use App\Http\Middleware\IsAuth;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsGuest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ForumController;

Route::get('/', [CourseController::class, 'index']);
Route::get('/category/{slug}', [CourseController::class, 'show']);
Route::get('/course/{slug}', [CourseController::class, 'showCourse']);

Route::get('/forum', [ForumController::class, 'index']);
Route::get('/forum/create', [ForumController::class, 'create'])->middleware('auth');
Route::post('/forum/store', [ForumController::class, 'store'])->middleware('auth');
Route::get('/forum/{slug}', [ForumController::class, 'show']);
Route::post('/forum/reply/{threadId}', [ForumController::class, 'storeReply'])->middleware('auth');


Route::get('/login', [AuthController::class, 'login'])->name('login');;
Route::post('/login', [AuthController::class, 'postLogin']);

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerPost']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');


Route::middleware('IsAdmin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/categories', [AdminController::class, 'showCategories']);
    Route::get('/category/create', [AdminController::class, 'createCategory']);
    Route::post('/category/new', [AdminController::class, 'storeCategory']);
    Route::get('/category/{slug}/edit', [AdminController::class, 'editCategory']);
    Route::post('/category/{slug}', [AdminController::class, 'updateCategory']);
    Route::get('/category/delete/{slug}', [AdminController::class, 'deleteCategory']);
    Route::get('/subcategory', [AdminController::class, 'showSubCategories']);
    Route::get('/subcategory/create', [AdminController::class, 'createSubCategory']);
    Route::post('/subcategory/new', [AdminController::class, 'storeSubCategory']);
    Route::get('/subcategory/{slug}/edit', [AdminController::class, 'editSubCategory']);
    Route::post('/subcategory/{slug}', [AdminController::class, 'updateSubCategory']);
    Route::get('/subcategory/delete/{slug}', [AdminController::class, 'deleteSubCategory']);
    Route::get('/content', [AdminController::class, 'showContent']);
    Route::get('/content/create', [AdminController::class, 'createContent']);
    Route::post('/content/new', [AdminController::class, 'storeContent']);
    Route::get('/content/{slug}/edit', [AdminController::class, 'editContent']);
    Route::post('/content/{slug}', [AdminController::class, 'updateContent']);
    Route::get('/content/subcategories', [AdminController::class, 'getSubCategories']);
    Route::get('/content/delete/{slug}', [AdminController::class, 'deleteContent']);
});

Route::post('ckeditor/upload', [AdminController::class, 'upload'])->name('ckeditor.upload');
