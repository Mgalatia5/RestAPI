<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('signup', [HomeController::class, 'signUpUser']);
Route::post('login', [LoginController::class, 'login'])->middleware('login');
Route::post('/v1/product', [ProductController::class, 'store']);
Route::get('/v1/product', [ProductController::class, 'index']);
Route::put('/v1/product/{id}', [ProductController::class, 'update']);
Route::delete('/v1/product/{id}', [ProductController::class, 'destroy']);
Route::get('/v1/product/{id}', [ProductController::class, 'show']);
