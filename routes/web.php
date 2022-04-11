<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PhotoController;



Route::get('/', function () {
    return view('welcome');
});
Route::resource("/student", StudentController::class);
//Route::get('/student','StudentController@index');
//Route::get('/student/{id}','StudentController@index');

Route::controller(PhotoController::class)->group(function(){
    Route::get('image-upload', 'index');
    Route::post('image-upload', 'store')->name('image.store');
});
//class RouteServiceProvider extends
