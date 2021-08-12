<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
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
Route::group(['middleware'=>'auth'],function (){

    Route::get('/', [HomeController::class, 'index']);

    Route::resource('company',CompanyController::class);
    Route::resource('employee',EmployeeController::class);

    Route::get('image-upload', [ CompanyController::class, 'imageUpload' ])->name('image.upload');
    Route::post('image-upload', [ CompanyController::class, 'imageUploadPost' ])->name('image.upload.post');
});


//Route::resource('home',HomeController::class,'home');


//Route::resource('/search', CompanyController::class);
//Route::resource('/search', EmployeeController::class);

//Route::put('/company',[CompanyController::class,'edit'])->name('company.edit');
//Route::get('/company',[CompanyController::class,'show'])->name('company.show');
//Route::post('company',[CompanyController::class,'store'])->name('company.store');
//Route::get('/companies/index',[CompanyController::class,'index'])->name('company.index');


