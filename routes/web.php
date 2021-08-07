<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Models\Task;
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


Route::resource('/projects', ProjectController::class)->middleware('auth');
 Route::post('/projects/{project}/tasks',[TaskController::class,'store'])->name('tasks.store');
 Route::put('/projects/{project}/tasks/{task}',[TaskController::class,'update']);
 Route::delete('/projects/{project}/tasks/{task}',[TaskController::class,'destroy']);

 Route::get('/profile',[ProfileController::class,'index'])->name('profile');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
