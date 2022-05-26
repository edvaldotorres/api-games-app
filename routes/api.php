<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\ScoreController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api " middleware group. Enjoy building your API!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
});

Route::controller(GameController::class)->group(function () {
    Route::get('games', 'index');
    Route::get('games/{id}', 'show');
    Route::post('games', 'store')->middleware('jwt.auth');
    Route::put('games/{id}', 'update')->middleware('jwt.auth');
    Route::delete('games/{id}', 'destroy')->middleware('jwt.auth');
});

Route::controller(ScoreController::class)->group(function () {
    Route::get('scores/{id}', 'index');
    Route::post('scores', 'store')->middleware('jwt.auth');
});

Route::controller(UserController::class)->group(function () {
    Route::middleware('jwt.auth')->group(function () {
        Route::get('users', 'index');
        Route::get('users/me', 'me');
        Route::post('users', 'store');
        Route::get('users/{id}', 'show');
        Route::put('users/{id}', 'update');
        Route::delete('users/{id}', 'destroy');
    });
});
