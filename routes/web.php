<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('manage-users', function () {
        return view('admin.manage-users.index');
    })->name('admin.manage-users.index');
    // lanjutkan nanti dengan route yang di middleware admin
    // Route::resource('portfolio', PortfolioController::class);
});
