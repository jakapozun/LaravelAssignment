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
   return redirect()->route('todos');
});

Auth::routes();

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

//admin
Route::prefix('admin')->group(function () {
    Route::get('/add-task', [\App\Http\Controllers\TaskController::class, 'createTask'])->name('add.tasks');
    Route::get('/all-tasks', [\App\Http\Controllers\TaskController::class, 'viewTasks'])->name('view.tasks');
});

//tasks
Route::prefix('tasks')->group(function () {
    Route::get('/todos', [App\Http\Controllers\TaskController::class, 'index'])->name('todos');
    Route::get('/working-on', [App\Http\Controllers\TaskController::class, 'wo'])->name('wo');
    Route::get('/done', [App\Http\Controllers\TaskController::class, 'done'])->name('done');
    Route::get('/{task}', [App\Http\Controllers\TaskController::class, 'show'])->name('show');
});

