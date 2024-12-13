<?php

use App\Http\Controllers\Login;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('todo', TodoController::class);
Route::resource('user', SignUpController::class);
Route::post('login', [Login::class, 'loginUser']);