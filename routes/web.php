<?php

use App\Http\Controllers\DashboardSpController;
use App\Http\Middleware\NotLogin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/landing');
    }
    return redirect('/login');
});
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->middleware(NotLogin::class)->name('loginForm');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/landing', function () {
    return view('pages.landing');
})->middleware('auth');