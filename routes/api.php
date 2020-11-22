<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\API\UsersController;
use \App\Http\Controllers\API\SkillsController;
use \App\Http\Controllers\API\UsersSkillsController;

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
Route::apiResource('/users', UsersController::class, ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
Route::apiResource('/skills', SkillsController::class, ['only' => ['index']]);
Route::apiResource('/users/{id}/skills', UsersSkillsController::class, ['only' => ['index']]);
