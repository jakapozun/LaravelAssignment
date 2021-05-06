<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

Route::middleware('auth')->group(function() {

Route::get('/', function () {
    return redirect()->route('todos');
});

//admin
Route::prefix('admin')->middleware('isAdmin')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

    Route::get('/add-task', [\App\Http\Controllers\TaskController::class, 'createTask'])->name('add.tasks');
    Route::get('/all-tasks', [\App\Http\Controllers\TaskController::class, 'viewTasks'])->name('view.tasks');
    Route::get('/edit-task/{task}', [\App\Http\Controllers\TaskController::class, 'edit'])->name('edit.task');

    Route::post('/store-task', [\App\Http\Controllers\TaskController::class, 'store'])->name('store.task');
    Route::delete('/delete-task/{task}', [\App\Http\Controllers\TaskController::class, 'destroy'])->name('destroy.task');
    Route::put('/update-task/{task}', [\App\Http\Controllers\TaskController::class, 'update'])->name('update.task');

    Route::get('/all-statuses', [\App\Http\Controllers\StatusController::class, 'index'])->name('view.statuses');
    Route::get('/add-status', [\App\Http\Controllers\StatusController::class, 'createStatus'])->name('add.status');
    Route::get('/edit-status/{status}', [\App\Http\Controllers\StatusController::class, 'edit'])->name('edit.status');


    Route::post('/store-status', [\App\Http\Controllers\StatusController::class, 'store'])->name('store.status');
    Route::delete('/delete-status/{status}', [\App\Http\Controllers\StatusController::class, 'destroy'])->name('destroy.status');
    Route::put('/update-status/{status}', [\App\Http\Controllers\StatusController::class, 'update'])->name('update.status');

});

//tasks - users
Route::prefix('tasks')->group(function () {
    Route::get('/todos', [App\Http\Controllers\TaskController::class, 'index'])->name('todos');
    Route::get('/working-on', [App\Http\Controllers\TaskController::class, 'wo'])->name('wo');
    Route::get('/done', [App\Http\Controllers\TaskController::class, 'done'])->name('done');
    Route::get('/{task}', [App\Http\Controllers\TaskController::class, 'show'])->name('show');
    Route::put('/change-status/{task}', [App\Http\Controllers\TaskController::class, 'changeStatus'])->name('change.status');
});

});

