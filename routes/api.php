<?php

use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResources([
    'games' => GameController::class,
    'users' => UserController::class,
]);

// Route::group(['prefix' => 'games',], function () {
//     Route::get('/', [GameController::class, 'index']);
//     Route::post('/', [GameController::class, 'store']);
//     Route::get('/{id}', [GameController::class, 'show']);
//     Route::put('/{id}', [GameController::class, 'update']);
//     Route::delete('/{id}', [GameController::class, 'destroy']);
// });
