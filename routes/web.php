<?php

use App\Models\Category;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('homepage', [
        'title' => 'Dakabita — Butter Cookies and Bakery',
        "categories" => Category::all()
    ]);
});

Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{product:slug}', [ProductController::class, 'singleProduct']);

// ->middleware('guest') artinya hanya bisa diakses oleh user yang belum login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// ->middleware('auth') artinya hanya bisa diakses oleh user yang sudah login
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
