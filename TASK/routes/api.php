<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'auth:jwt'], function () {
    Route::group(['prefix' => 'tasks'], function () {
        Route::get('/user/{id}', [TaskController::class, 'userTasks'])->name('tasks.userTasks');
        Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
        Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
        Route::get('/{id}', [TaskController::class, 'getById'])->name('tasks.getById');
        Route::put('/{id}', [TaskController::class, 'update'])->name('tasks.update');
        Route::patch('/{id}', [TaskController::class, 'assign'])->name('tasks.assign');
        Route::delete('/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    });
});
