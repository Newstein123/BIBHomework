<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyPostController;

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

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create'])->middleware('myauth');
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::get('/posts/{id}/edit', [PostController::class, 'edit']);
Route::put('/posts/{id}', [PostController::class, 'update']);
Route::delete('/posts/{id}', [PostController::class, 'destroy']);

// Route::resource('posts', PostController::class);

// Category 

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/create', [CategoryController::class, 'create']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);


// Login 

Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);

Route::get('login', [LoginController::class, 'create']);
Route::post('login', [LoginController::class, 'store']);
Route::get ('logout', [LoginController::class, 'destroy']);

Route::get('my-posts', [MyPostController::class, 'index']);


