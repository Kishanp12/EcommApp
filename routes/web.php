<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
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
    return view('login');
});



Route::get('/auth/login', [LoginController::class, 'login'])->name('auth.login');

    Route::post('/auth/check', [LoginController::class, 'check'])->name('auth.check');

    Route::get('/user/dashboard', [LoginController::class, 'dashboard'])->name('user.dashboard');

    Route::resource('/products', ProductController::class);

