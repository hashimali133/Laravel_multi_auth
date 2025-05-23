<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\profileController;
use App\Http\Controllers\DashboardController;

Route::get('/www.geniuscode.com', function () {
    return view('welcome');
})->name('welcome');
Route::group(['prefix' => 'account'], function () {
    //Guest Middleware
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', [LoginController::class, 'index'])->name('account.login');
        Route::get('/register', [LoginController::class, 'register'])->name('account.register');
        Route::post('/registeration', [LoginController::class, 'registerData'])->name('account.registeration');
        Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
    });
    //Authenticated Middleware
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/profile', [DashboardController::class, 'index'])->name('account.profile');
        Route::resource('/products', ProductController::class);
        Route::get('/logout', [LoginController::class, 'logout'])->name('account.logout');
    });
});

//Admin-section
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });
    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('/dashboard', [profileController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    });
});
