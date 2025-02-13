<?php

use App\Http\Controllers\AuthenController;
use App\Http\Controllers\emailController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthenController::class)->group(function () {
    Route::get('/login', 'login');
    Route::post('/login', 'CheckUser')->name('login-user');
});

Route::get('/send-email', [EmailController::class, 'sendEmail']);
