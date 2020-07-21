<?php

use App\Http\Controllers\Url\UrlDashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('manage')->as('admin.')->group(function () {
    Route::prefix('shortener')->as('url.')->group(function () {
        Route::get('/', [UrlDashboardController::class, 'index'])->name('index');
    });
});
