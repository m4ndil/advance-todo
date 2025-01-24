<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('user', SignUpController::class);
Route::post('login', [LoginController::class, 'loginUser']);
Route::middleware('auth:api')->controller(LoginController::class)->group(function () {
    Route::get('login', 'userDetail');
    //todo all routes through resource
    Route::resource('todo', TodoController::class);
});
Route::middleware('auth:api')->post('logout', [LogoutController::class, 'logoutUser']);

