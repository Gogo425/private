<?php

use App\Http\Controllers\TableAbilitiesController;
use App\Http\Controllers\TableStudentController;
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
    return view('welcome');
});

Route::get('/tableAbilities', [TableAbilitiesController::class,'TableAbilitiesPage']);
Route::get('/tableStudent', [TableStudentController::class,'TableStudentPage']);
Route::post('/tableStudent',[TableStudentController::class,'TableStudentPage']);
