<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);

Route::group(['middleware' => ["auth:sanctum"]], function(){
    Route::get('profile',[UserController::class,'userProfile']);
    Route::get('logout',[UserController::class,'logout']);
});

