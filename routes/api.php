<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('check/email', [ApiController::class, 'checkEmail']);
Route::post('check/phone', [ApiController::class, 'checkPhone']);
Route::post('check/email-phone', [ApiController::class, 'checkEmailPhone']);
Route::get('countries', [ApiController::class, 'countries']);

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('me', [AuthController::class, 'me']);
});
