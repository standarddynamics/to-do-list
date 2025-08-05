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

Route::get('/', [TaskController::class, 'index']);

Route::post('/tasks', [TaskController::class, 'store'])->name('tasks');

Route::patch('/tasks/{id}/complete', [TaskController::class, 'update'])->name('tasks.complete');
Route::patch('/tasks/{id}/delete', [TaskController::class, 'destroy'])->name('tasks.delete');
