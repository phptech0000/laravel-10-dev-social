<?php

use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('principal');
});
Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store']);
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);
Route::post('/logout', [LogoutController::class,'store'])->name('logout');

Route::get('/{user:username}',[PostController::class,'index'])->name("post.index");
Route::get('/posts/create',[PostController::class,'create'])->name("post.create");
Route::post('/posts',[PostController::class,'store'])->name('post.store');
Route::get('/{user:username}/posts/{post}',[PostController::class,'show'])->name('post.show');

Route::post('/images', [ImagenController::class,'store'])->name('images.store');