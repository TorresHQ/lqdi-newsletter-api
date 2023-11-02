<?php

use App\Http\Controllers\Api\v1\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function (){
    Route::prefix('users')->group(function () {
        Route::post('/', [UserController::class, 'store']);
    });

});

Route::middleware('auth:sanctum')->group(function () {
});
