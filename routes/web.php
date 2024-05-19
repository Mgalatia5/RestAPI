<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/v1/product', [ProductController::class, 'store']);
Route::get('/v1/product', [ProductController::class, 'index']);
Route::put('/v1/product/{id}', [ProductController::class, 'update']);
Route::delete('/v1/product/{id}', [ProductController::class, 'destroy']);
Route::get('/v1/product/{id}', [ProductController::class, 'show']);
