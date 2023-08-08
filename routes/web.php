<?php

use Illuminate\Support\Facades\Route;

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

Route::controller(\App\Http\Controllers\HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/login', 'login')->name('login')->middleware(\App\Http\Middleware\CheckLogin::class);
    Route::post('/login', 'signing')->name('signing');
    Route::get('/signup', 'signup')->name('signup');
    Route::post('/signup', 'registering')->name('registering');
    Route::get('/logout', 'logout')->name('logout');
});

