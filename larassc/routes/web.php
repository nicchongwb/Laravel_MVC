<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

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

// get(endpoint, [Fully Qualified name of class, method in RegisterController.php])
// Route will act as interface between Model and Controller, Controller will call
// specified functions in its definition and these functions will get the view

Route::get('/', function(){
    return view('home');
})->name('home');

// add middleware auth to deny unauthenticated access to dashboard
// middleware is in dashboard controller class
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');

// Logout should always be POST to avoid CSRF, we need to supply data to make the API call
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// ->name('register') is to chain a 'name' so that we can use it href tags {{ route('register') }}
// Even if get('/register') changes to 'auth/register', views that uses register href will still link here
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'post']);
Route::delete('/posts/{post}', [PostController::class, 'delete'])->name('posts.delete');

Route::post('/posts/{post}/likes', [PostLikeController::class, 'like'])->name('posts.likes');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'dislike'])->name('posts.likes');
