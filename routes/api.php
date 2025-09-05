<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ProjectController;
use App\Http\Controllers\Api\V1\TaskController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\LoginController;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::group(['prefix' => 'v1'], function () {
    Route::apiResource('projects', ProjectController::class);
});

Route::group(['prefix' => 'v1'], function () {
    Route::apiResource('tasks', TaskController::class);
});

Route::group(['prefix' => 'v1'], function (){
   Route::apiResource('users', UserController::class);
});


Route::post('/v1/login', [LoginController::class, 'authenticate']);



