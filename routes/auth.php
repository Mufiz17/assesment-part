<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Rute yang dapat diakses tanpa login (middleware 'guest')
Route::middleware('guest')->group(function () {
    // Halaman publik
    Route::get('/homepage', function () {
        return view('homepage'); // Sesuaikan dengan view atau controller yang digunakan
    })->name('homepage');

    // Rute registrasi dan login
    Volt::route('register', 'pages.auth.register')->name('register');
    Volt::route('login', 'pages.auth.login')->name('login');
    Volt::route('forgot-password', 'pages.auth.forgot-password')->name('password.request');
    Volt::route('reset-password/{token}', 'pages.auth.reset-password')->name('password.reset');
});

// Rute yang memerlukan autentikasi (middleware 'auth')
Route::middleware('auth')->group(function () {
    // Halaman yang memerlukan login
    Route::get('/homepage', function () {
        return view('homepage'); // Sesuaikan dengan view atau controller yang digunakan
    })->name('homepage');

    Volt::route('verify-email', 'pages.auth.verify-email')->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    Volt::route('confirm-password', 'pages.auth.confirm-password')->name('password.confirm');
});
