<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
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
    Route::group(['prefix' => 'notify'], function () {
        Route::post('/assigned', [NotificationController::class, 'sendTaskAssignmentNotification'])->name('notify.assign');
        Route::post('/re-assigned', [NotificationController::class, 'sendTaskAssignmentNotification'])->name('notify.reassign');
    });
});
