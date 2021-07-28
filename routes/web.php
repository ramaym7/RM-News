<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
Route::get('/dashboard/show/{post}', [PostController::class, 'show'])->name('dashboard.show');
Route::get('/create', [PostController::class, 'create'])->name('dashboard.create');
Route::post('/dashboard/store', [PostController::class, 'store'])->name('dashboard.store');
Route::post('/uploadimage', [PostController::class, 'uploadImage'])->name('upload.image');
Route::get('/dashboard/edit/{post}', [PostController::class, 'edit'])->name('dashboard.edit');
Route::post('/dashboard/update/{post}', [PostController::class, 'update'])->name('dashboard.update');
Route::get('/dashboard/destroy/{post}', [PostController::class, 'destroy'])->name('dashboard.destroy');

Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::post('/category/update/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
