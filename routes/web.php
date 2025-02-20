<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\EmailTemplateController;
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
    return view('index');
})->middleware(['auth'])->name('home');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'CheckUser')->name('login-user');
});


Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('sendEmail');
Route::get('/', [EmailController::class, 'index'])->name('emailIndex');
Route::get('/data', [EmailController::class, 'getData'])->name('emailData');
Route::post('/import-client', [ClientController::class, 'importFile'])->name('importClient');

Route::get('/data', 'App\Http\Controllers\EmailController@getData')->name('emailData');

Route::controller(EmailTemplateController::class)->group(function () {
    Route::get('/email-template', 'index')->name('email-template');
    Route::get('/email-template/data', 'getData')->name('email-template-data');
    Route::get('/email-template/create', 'create')->name('email-template-create');
    Route::post('/email-template/store', 'store')->name('email-template-store');
    Route::get('/email-template/edit/{id}', 'edit')->name('email-template-edit');
    Route::post('/email-template/update/{id}', 'update')->name('email-template-update');
    Route::get('/email-template/delete/{id}', 'destroy')->name('email-template-delete');
});
