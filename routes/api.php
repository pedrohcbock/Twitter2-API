<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout']);
Route::post('refresh', [UserController::class, 'refresh']);

Route::prefix('/user')->group(function () {
    Route::put('update/{user}', [UserController::class, 'update']);
    Route::delete('delete/{user}', [UserController::class, 'delete']);
    Route::get("userData/{user}", [UserController::class, 'getUserData']);
});

Route::prefix('/post')->group(function () {
    Route::get('showAll', [PostController::class, 'showAll']);
    Route::get('showMy', [PostController::class, 'showMy']);
    Route::post('create', [PostController::class, 'create']);
    Route::put('update/{post}', [PostController::class, 'update']);
    Route::delete('delete/{post}', [PostController::class, 'delete']);
    Route::post('like/{post}', [PostController::class, 'like'])->name('like');
    Route::post('unlike/{post}', [PostController::class, 'unlike'])->name('unlike');
});
