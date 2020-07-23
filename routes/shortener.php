<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('manage')->as('admin.')->group(function () {
    Route::resource('shortener', 'UrlController')->except('show');
    Route::as('stats.')->group(function() {
        Route::get('stats', 'UrlStatsController')->name('index');
    });
});

Route::get('/{keyword}', 'UrlRedirectController');
