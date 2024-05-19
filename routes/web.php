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

Route::post('/product', [ProductController::class, 'store']);
Route::get('/product', [ProductController::class, 'index']);
Route::put('/product/{id}', [ProductController::class, 'update']);
Route::delete('/product/{id}', [ProductController::class, 'destroy']);
Route::get('/product/{id}', [ProductController::class, 'show']);
