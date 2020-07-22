<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('manage')->as('admin.')->group(function () {
    Route::resource('shortener', 'UrlController');
});

Route::get('/{keyword}', 'UrlRedirectController');
