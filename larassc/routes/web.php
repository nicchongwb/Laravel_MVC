<?php

use App\Http\Controllers\Auth\RegisterController;
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

// get(endpoint, Fully Qualified name of class, method in RegisterController.php)
Route::get('/register', [RegisterController::class, 'index']);

Route::get('/posts', function () {
    return view('posts.index');
});
