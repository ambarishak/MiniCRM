<?php

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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/companies',[App\Http\Controllers\CompanyController::class, 'index'])->name('companies');
Route::get('/company-create',[App\Http\Controllers\CompanyController::class, 'create'])->name('company.create');
Route::post('/company-store',[App\Http\Controllers\CompanyController::class, 'store'])->name('company.store');
Route::get('/company-edit/{id}',[App\Http\Controllers\CompanyController::class, 'edit'])->name('company.edit');
Route::post('/company-update/{id}',[App\Http\Controllers\CompanyController::class, 'update'])->name('company.update');
Route::post('/company-distroy/{id}',[App\Http\Controllers\CompanyController::class, 'distroy'])->name('company.distroy');

Route::get('/employees',[App\Http\Controllers\EmployeeController::class, 'index'])->name('employees');
Route::get('/employee-create',[App\Http\Controllers\EmployeeController::class, 'create'])->name('employee.create');
Route::post('/employee-store',[App\Http\Controllers\EmployeeController::class, 'store'])->name('employee.store');
Route::get('/employee-edit/{id}',[App\Http\Controllers\EmployeeController::class, 'edit'])->name('employee.edit');
Route::post('/employee-update/{id}',[App\Http\Controllers\EmployeeController::class, 'update'])->name('employee.update');
Route::post('/employee-distroy/{id}',[App\Http\Controllers\EmployeeController::class, 'distroy'])->name('employee.distroy');