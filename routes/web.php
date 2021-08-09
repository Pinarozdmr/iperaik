<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->middleware('auth');


Route::resource('company',CompanyController::class);

Route::resource('employee',EmployeeController::class);

Route::get('image-upload', [ CompanyController::class, 'imageUpload' ])->name('image.upload');

Route::post('image-upload', [ CompanyController::class, 'imageUploadPost' ])->name('image.upload.post');
