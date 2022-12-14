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
    return view('welcome');
});

Route::post('/tasks/priority', [\App\Http\Controllers\TaskController::class, 'priority']);
Route::resource('/tasks', \App\Http\Controllers\TaskController::class);

Route::resource('/projects', \App\Http\Controllers\ProjectController::class);
