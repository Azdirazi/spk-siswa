<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use Illuminate\Routing\Route as RoutingRoute;
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

Route::controller(DashboardController::class)->name('dashboard.')->group(function () {
    Route::get('/', 'view')->name('view');
    Route::get('/user/add-user', 'viewAdd')->name('viewAdd');
    Route::post('/user/add', 'add')->name('add');
    Route::get('/user/edit-user/{user}', 'viewEdit')->name('viewEdit');
    Route::patch('/user/edit-user/{user}', 'edit')->name('edit');
    Route::delete('/user/{user}', 'delete')->name('delete');
});
Route::controller(StudentController::class)->name('student.')->group(function () {
    Route::get('/student', 'view')->name('view');
    Route::get('/student/add-student', 'viewAdd')->name('viewAdd');
    Route::post('/student/add', 'add')->name('add');
    Route::get('/student/edit-student/{student}', 'viewEdit')->name('viewEdit');
    Route::patch('/student/edit-student/{student}', 'edit')->name('edit');
    Route::delete('/student/{student}', 'delete')->name('delete');
});
Route::controller(GroupController::class)->name('group.')->group(function () {
    Route::get('/group', 'view')->name('view');
    Route::get('/group/add-grade', 'viewAddGrade')->name('viewAddGrade');
    Route::post('/group/addG', 'addG')->name('addG');
    Route::get('/group/edit-grade/{grade}', 'viewEditGrade')->name('viewEditGrade');
});
