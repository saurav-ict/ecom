<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PropertyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin Auth
// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::get('login', [AuthController::class, 'showLogin'])->name('login');
//     Route::post('login', [AuthController::class, 'login'])->name('login.post');
//     Route::post('logout', [AuthController::class, 'logout'])->name('logout');
// });

// Admin Protected
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('dashboard', fn() => view('admin.dashboard'))->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('properties', PropertyController::class);
    Route::resource('products', ProductController::class);
});
