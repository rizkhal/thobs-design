<?php

use Illuminate\Support\Facades\Route;

/** Auth */
Auth::routes();

/** Laravel File Manager */
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

/** Dashboard */
Route::get('dashboard', 'HomeController@dashboard')->name('dashboard');

/** Admin Manage Group */
Route::prefix('manage')->as('admin.')->middleware('auth')->group(function () {
    /** Setting */
    Route::prefix('setting')->as('setting.')->group(function () {
        Route::resource('social', 'SocialMediaController');
    });

    /** Category */
    Route::resource('category', 'CategoryController');
    Route::prefix('select2')->as('select2.')->group(function () {
        Route::get('category', 'Service\Select2Controller@category')->name('category');
    });

    /** Upload facade */
    Route::prefix('uploads')->as('upload.')->group(function () {
        Route::post('project', 'Service\UploadController@project')->name('project');
    });

    /** Project */
    Route::resource('projects', 'ProjectController')->except('show');
    Route::prefix('projects')->as('projects.')->group(function () {
        Route::post('update-status', 'ProjectController@status')->name('status');
    });

    /** Blog */
    Route::resource('blog', 'BlogController');
    Route::prefix('blog')->as('blog.')->group(function () {
        Route::post('update-status', 'BlogController@status')->name('status');
    });
});

/** Application */
Route:: as ('application.')->group(function () {
    Route::get('/', 'ApplicationController@index')->name('index');
    Route::prefix('pages')->group(function () {
        Route::get('blog/{slug}', 'BlogController@frontShow')->name('blog.show');
    });
});
