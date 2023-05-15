<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

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
    return view('welcome');});

Route::get('/home', [HomeController::class, 'index'])
    ->middleware(['auth'])
    ->name('home');

Route::resource('posts', PostController::class)->middleware(['auth']);

Route::post('/comments/{post}', [CommentController::class, 'store'])->name('comments.store')->middleware(['auth']) ;

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy')->middleware(['auth']);

Route::resource('users', UserController::class)->middleware(['can:access admin']);

Route::get('/', [PostController::class, 'showAndIndexInWelcomePage']);

Route::get('/search', [PostController::class, 'search'])->name('search');
