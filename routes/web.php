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

//    invoices
    Route::get('clubs/{id}/invoices/create',[App\Http\Controllers\ClubController::class,'createInvoice'])->name('clubs.invoices.create');
    Route::post('clubs/{id}/invoices',[App\Http\Controllers\ClubController::class,'storeInvoice'])->name('clubs.invoices.store');
    Route::get('clubs/{id}/invoices/{invoice_id}',[App\Http\Controllers\ClubController::class,'editInvoice'])->name('clubs.invoices.edit');
    Route::put('clubs/{id}/invoices/{invoice_id}',[App\Http\Controllers\ClubController::class,'updateInvoice'])->name('clubs.invoices.update');
    Route::delete('clubs/{id}/invoices/{invoice_id}',[App\Http\Controllers\ClubController::class,'destroyInvoice'])->name('clubs.invoices.destroy');

//    projects
    Route::get('clubs/{id}/projects/create',[App\Http\Controllers\ClubController::class,'createProject'])->name('clubs.projects.create');
    Route::post('clubs/{id}/projects',[App\Http\Controllers\ClubController::class,'storeProject'])->name('clubs.projects.store');
    Route::get('clubs/{id}/projects/{project_id}',[App\Http\Controllers\ClubController::class,'editProject'])->name('clubs.projects.edit');
    Route::put('clubs/{id}/projects/{project_id}',[App\Http\Controllers\ClubController::class,'updateProject'])->name('clubs.projects.update');
    Route::delete('clubs/{id}/projects/{project_id}',[App\Http\Controllers\ClubController::class,'destroyProject'])->name('clubs.projects.destroy');

//    subscriptions
    Route::get('clubs/{id}/subs/create',[App\Http\Controllers\ClubController::class,'createSubscription'])->name('clubs.subs.create');
    Route::post('clubs/{id}/subs',[App\Http\Controllers\ClubController::class,'storeSubscription'])->name('clubs.subs.store');
    Route::get('clubs/{id}/subs/{sub_id}',[App\Http\Controllers\ClubController::class,'editSubscription'])->name('clubs.subs.edit');
    Route::put('clubs/{id}/subs/{sub_id}',[App\Http\Controllers\ClubController::class,'updateSubscription'])->name('clubs.subs.update');
    Route::delete('clubs/{id}/subs/{sub_id}',[App\Http\Controllers\ClubController::class,'destroySubscription'])->name('clubs.subs.destroy');


    Route::resource('clubs',App\Http\Controllers\ClubController::class);
    Route::resource('teachers',App\Http\Controllers\TeacherController::class);
    Route::resource('students',App\Http\Controllers\StudentController::class);


    Route::get('absences/{id}',[App\Http\Controllers\AbsenceController::class,'show'])->name('absences.show');
    Route::get('absences/{id}/edit',[App\Http\Controllers\AbsenceController::class,'edit'])->name('absences.edit');
    Route::put('absences/{id}',[App\Http\Controllers\AbsenceController::class,'update'])->name('absences.update');
    Route::delete('absences/{id}',[App\Http\Controllers\AbsenceController::class,'destroy'])->name('absences.destroy');


    Route::get('groups/{id}/students/{student_id}/absences/create',[App\Http\Controllers\GroupController::class,'studentAbsenceCreate'])->name('groups.students.absences.create');
    Route::post('groups/{id}/students/{student_id}/absences',[App\Http\Controllers\GroupController::class,'storeAbsenceForStudent'])->name('groups.students.absences.store');
    Route::get('groups/{id}/teachers/absences/create',[App\Http\Controllers\GroupController::class,'teacherAbsenceCreate'])->name('groups.teachers.absences.create');
    Route::post('groups/{id}/teachers/absences',[App\Http\Controllers\GroupController::class,'storeAbsenceForTeacher'])->name('groups.teachers.absences.store');
    Route::get('groups/{id}/add-students',[App\Http\Controllers\GroupController::class,'addStudents'])->name('groups.add.students');
    Route::get('groups/{id}/add-students',[App\Http\Controllers\GroupController::class,'addStudents'])->name('groups.add.students');
    Route::post('groups/{id}/add-students',[App\Http\Controllers\GroupController::class,'studentsAttach'])->name('groups.add.students.post');
    Route::delete('groups/{id}/delete-student/{student_id}',[App\Http\Controllers\GroupController::class,'detachStudent'])->name('groups.delete.students');
    Route::resource('groups',App\Http\Controllers\GroupController::class);
});

Route::get('test',function (){
    \Illuminate\Support\Facades\Artisan::call('migrate:fresh --seed');
});
