<?php

use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\EmployeesController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');


Route::resource('/departaments', DepartmentsController::class)->names('departaments');
Route::resource('/employees', EmployeesController::class)->names('employees');

