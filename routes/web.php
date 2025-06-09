<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('login');

Route::get('/forgot-password', function() {
    return back();
})->name('forgot-password');

Route::prefix('/dashboard')->group(function() {
    Route::get('/login', [\App\Http\Controllers\Dashboard\AuthController::class, 'showLoginForm'])->name('dashboard.loginForm');
    Route::post('/login', [\App\Http\Controllers\Dashboard\AuthController::class, 'login'])->name('dashboard.login');
});
Route::prefix('/entri-data')->group(function() {
    Route::get('/login', [\App\Http\Controllers\EntriData\AuthController::class, 'showLoginForm'])->name('entri-data.loginForm');
    Route::post('/login', [\App\Http\Controllers\EntriData\AuthController::class, 'login'])->name('entri-data.login');

    // Route::prefix('/sp')->group(function() {
    //     Route::get('/{bidang}', [])
    // });
    // /entri-data/sp/{$item->bidang}/
});
