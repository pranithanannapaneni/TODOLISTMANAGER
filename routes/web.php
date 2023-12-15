<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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


Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::post('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
Route::post('/tasks/undo', [TaskController::class, 'undo'])->name('tasks.undo');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');









