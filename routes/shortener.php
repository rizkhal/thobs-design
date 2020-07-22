<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('manage')->as('admin.')->group(function () {
    Route::resource('shortener', 'UrlController')->except('show');
    Route::prefix('shortener')->as('shortener.')->group(function () {
        Route::get('stats', 'UrlStatsController')->name('stats');
    });
});

Route::get('/{keyword}', 'UrlRedirectController');
