<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\ServiceOptionController;
use App\Http\Controllers\Api\ServiceTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/check-otp', [AuthController::class, 'checkOtp']);
Route::post('/auth/resend-otp', [AuthController::class, 'resendOtp'])->middleware('throttle:1,2');//1 request per 2 minutes
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::post('/auth/me', [AuthController::class, 'me']);
});

Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/{id}', [ArticleController::class, 'show']);

Route::get('/services/{slug}', [ServiceController::class, 'findBySlug']);

Route::get('/service_type/{service_id}', [ServiceTypeController::class, 'findByServiceId']);

Route::get('/service_options/{service_id}', [ServiceOptionController::class, 'findByServiceId']);
