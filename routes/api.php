<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GameController;
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

    Route::post('refresh', 'refresh');
});

Route::group(['middleware' => 'jwt.auth'], function () {

    Route::apiResources([
        'games' => GameController::class,
        'users' => UserController::class,
    ]);

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
