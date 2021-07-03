<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ExamController;

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
   
    return redirect('/students');
});
Route::post('/students/{id}',[StudentController::class,'update']);
Route::resource('/students', StudentController::class)->except([
    'show','destroy','create','update'
]);
Route::get('/exams',[ExamController::class,'index']);
Route::post('/exams',[ExamController::class,'store']);
Route::post('/exams/{id}/delete',[ExamController::class,'delete']);