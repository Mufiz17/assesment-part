<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pasController;
use App\Http\Controllers\patController;
use App\Http\Controllers\ptsController;
use App\Http\Controllers\rptsController;
use App\Http\Controllers\raporController;


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';

Route::controller(raporController::class)->group(function () {
    Route::get('/rapor', 'index')->name('rapor');
    Route::get('/rapor-create', 'create')->name('rapor.create');
    Route::post('/rapor-store', 'store')->name('rapor.perform');
    Route::get('/rapor-edit/{id}', 'edit')->name('rapor.edit');
    Route::put('/rapor-update/{id}', 'update')->name('rapor.update');
    Route::delete('/rapor-delete/{id}', 'destroy')->name('rapor.delete');
    Route::get('/rapor/pdf/{id}','pdf')->name('rapor.pdf');
    Route::get('/rapor/chart/{id}','chart')->name('rapor.chart');
});
Route::controller(rptsController::class)->group(function () {
    Route::get('/rpts', 'index')->name('rpts');
    Route::get('/rpts-create', 'create')->name('rpts.create');
    Route::post('/rpts-store', 'store')->name('rpts.perform');
    Route::get('/rpts-edit/{id}', 'edit')->name('rpts.edit');
    Route::put('/rpts-update/{id}', 'update')->name('rpts.update');
    Route::delete('/rpts-delete/{id}', 'destroy')->name('rpts.delete');
    Route::get('/rpts/pdf/{id}','pdf')->name('rpts.pdf');
});

Route::controller(pasController::class)->group(function () {
    Route::get('/pas', 'index')->name('pas');
    Route::get('/pas-create', 'create')->name('pas.create');
    Route::post('/pas-store', 'store')->name('pas.perform');
    Route::get('/pas-edit/{id}', 'edit')->name('pas.edit');
    Route::put('/pas-update/{id}', 'update')->name('pas.update');
    Route::delete('/pas-delete/{id}', 'destroy')->name('pas.delete');
    Route::get('/pas/download/{id}', 'download')->name('pas.download');
});

Route::controller(patController::class)->group(function () {
    Route::get('/pat', 'index')->name('pat');
    Route::get('/pat-create', 'create')->name('pat.create');
    Route::post('/pat-store', 'store')->name('pat.perform');
    Route::get('/pat-edit/{id}', 'edit')->name('pat.edit');
    Route::put('/pat-update/{id}', 'update')->name('pat.update');
    Route::delete('/pat-delete/{id}', 'destroy')->name('pat.delete');
    Route::get('/pat/download/{id}', 'download')->name('pat.download');
});

Route::controller(ptsController::class)->group(function () {
    Route::get('/pts', 'index')->name('pts');
    Route::get('/pts-create', 'create')->name('pts.create');
    Route::post('/pts-store', 'store')->name('pts.perform');
    Route::get('/pts-edit/{id}', 'edit')->name('pts.edit');
    Route::put('/pts-update/{id}', 'update')->name('pts.update');
    Route::delete('/pts-delete/{id}', 'destroy')->name('pts.delete');
    Route::get('/pts/download/{id}', 'download')->name('pts.download');
});
