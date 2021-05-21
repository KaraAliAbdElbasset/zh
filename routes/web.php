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


Auth::routes();

Route::middleware('auth')->group(function (){
    Route::redirect('/home', '/')->name('home');
    Route::get('/', [App\Http\Controllers\HomeController::class,'index'])->name('welcome');

    Route::resource('users',App\Http\Controllers\UserController::class);
    Route::resource('sewing-clients',App\Http\Controllers\SewingClientController::class);
    Route::resource('sewing-workers',App\Http\Controllers\SewingWorkerController::class);
    Route::resource('general-statistics',App\Http\Controllers\GeneralStatisticController::class);
    Route::resource('funerals',App\Http\Controllers\FuneralController::class);
    Route::resource('orders',App\Http\Controllers\OrderController::class);
    Route::resource('clubs',App\Http\Controllers\ClubController::class);
    Route::resource('teachers',App\Http\Controllers\TeacherController::class);
    Route::resource('students',App\Http\Controllers\StudentController::class);
    Route::get('groups/{id}/add-students',[App\Http\Controllers\GroupController::class,'addStudents'])->name('groups.add.students');
    Route::post('groups/{id}/add-students',[App\Http\Controllers\GroupController::class,'studentsAttach'])->name('groups.add.students.post');
    Route::delete('groups/{id}/delete-student/{student_id}',[App\Http\Controllers\GroupController::class,'detachStudent'])->name('groups.delete.students');
    Route::resource('groups',App\Http\Controllers\GroupController::class);
});

Route::get('test',function (){
    \Illuminate\Support\Facades\Artisan::call('migrate:fresh --seed');
});
