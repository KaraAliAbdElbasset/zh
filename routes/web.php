<?php

use Illuminate\Support\Facades\Auth;
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
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users',App\Http\Controllers\UserController::class);
Route::resource('sewing-clients',App\Http\Controllers\SewingClientController::class);
Route::resource('sewing-workers',App\Http\Controllers\SewingWorkerController::class);
Route::resource('general-statistics',App\Http\Controllers\GeneralStatisticController::class);
Route::resource('funerals',App\Http\Controllers\FuneralController::class);
Route::resource('orders',App\Http\Controllers\OrderController::class);
Route::resource('clubs',App\Http\Controllers\ClubController::class);

