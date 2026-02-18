<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    // 予定
    Route::get('/schedules', [ScheduleController::class, 'index']);
    Route::post('/schedules', [ScheduleController::class, 'store']);

    // TODO
    Route::get('/todos', [TodoController::class, 'index']);
    Route::patch('/todos/{todo}/toggle', [TodoController::class, 'toggle']);

    // プロフィール
    Route::get('/profile', [ProfileController::class, 'show']);

    Route::get('/family', [FamilyController::class, 'show']);
    Route::post('/family/join', [FamilyController::class, 'join']);
});