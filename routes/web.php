<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource("/student", StudentController::class);
//Route::get('/student','StudentController@index');

//class RouteServiceProvider extends
