<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function (){
    Route::prefix('users')->group(function () {
        Route::post('/', [UserController::class, 'store']);
    });

    Route::prefix('auth')->group(function () {
        Route::post('/login', [AuthController::class, 'login']);
    });

    Route::prefix('subscribers')->group(function () {
        Route::post('/', [SubscriberController::class, 'store']);
    });
});

Route::middleware('auth:sanctum')->group(function () {
});
