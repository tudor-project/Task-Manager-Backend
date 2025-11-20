<?php

use App\Http\Controllers\Api\V1\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ProjectController;
use App\Http\Controllers\Api\V1\TaskController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\LoginController;


Route::group(['prefix' => 'v1'], function () {

    Route::post('login', [LoginController::class, 'authenticate']);
    Route::post('register', [UserController::class, 'store']);

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::apiResource('projects', ProjectController::class);
        Route::apiResource('tasks', TaskController::class);
        Route::apiResource('users', UserController::class);

        Route::post('logout', [LoginController::class, 'logout']);
    });

});



