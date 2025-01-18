<?php

use App\Models\Category;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('homepage', [
        'title' => 'Dakabita — Butter Cookies and Bakery',
        "categories" => Category::all()
    ]);
});

Route::get('/product', [ProductController::class, 'index']);

Route::get('/product/{product:slug}', [ProductController::class, 'singleProduct']);

Route::get('/login', [LoginController::class, 'index']);

Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index']);

Route::post('/register', [RegisterController::class, 'store']);
