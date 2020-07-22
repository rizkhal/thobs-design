<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('manage')->as('admin.')->group(function () {
    Route::prefix('shortener')->as('url.')->group(function () {
        Route::resource('/', 'UrlController');
    });
});

Route::get('/{keyword}', 'UrlRedirectController');
