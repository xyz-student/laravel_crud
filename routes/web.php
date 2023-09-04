<?php

use Illuminate\Support\Facades\Route;
use App\Models\UserController;
use App\Http\Controllers\StudentController;

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

// Route::post('/update/{id}','StudentController@updatefun');
Route::get('/', function () {
    return view('welcome');
});
// Route::get('edit-records','StudentController@index');
// Route::get('edit/{id}','StudentController@show');
// Route::post('edit/{id}','StudUpdateController@edit');

Route::resource('student', StudentController::class);
Route::get('edit-student/{id}' , [StudentController::class , 'edit']);
Route::put('update-student' , [StudentController::class , 'update']);
// MVC