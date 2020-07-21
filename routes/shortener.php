<?php

use App\Http\Controllers\Url\UrlController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('manage')->as('admin.')->group(function () {
    Route::prefix('shortener')->as('url.')->group(function () {
        Route::get('/', [UrlController::class, 'index'])->name('index');
        Route::get('/create', [UrlController::class, 'create'])->name('create');
        Route::post('/create/store', [UrlController::class, 'store'])->name('store');
    });
});
