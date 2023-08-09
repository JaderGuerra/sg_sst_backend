<?php

use App\Http\Controllers\Api\Person\PersonController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);

Route::group(['middleware' => ["auth:sanctum"]], function(){
    Route::get('profile',[UserController::class,'userProfile']);
    Route::get('logout',[UserController::class,'logout']);

    // Person
    Route::apiResource('person', PersonController::class)
        ->missing(fn() => response()->json([
            'data' => null,
            'error' => 'Not Found.'
        ], 404));
});

