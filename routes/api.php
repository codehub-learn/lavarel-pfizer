<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\API\UsersController;
use \App\Http\Controllers\API\SkillsController;
use \App\Http\Controllers\API\UsersSkillsController;
use \App\Http\Controllers\API\UsersVacationsController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('/users', UsersController::class);
Route::apiResource('/skills', SkillsController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
Route::apiResource('users.skills', UsersSkillsController::class, ['only' => ['index', 'store']]);
Route::apiResource('users.vacations', UsersVacationsController::class);
