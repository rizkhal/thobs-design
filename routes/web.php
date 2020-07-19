<?php

use App\Repository\Setting\SettingRepo;
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
        /** Setting Pages */
        Route::get('/pages', 'SettingController@pages')->name('pages');
        Route::put('about', 'SettingController@about')->name('about');
        Route::put('contact', 'SettingController@contact')->name('contact');

        /** Social Media */
        Route::resource('social', 'SocialMediaController')->except('update');
        Route::put('social/update', 'SocialMediaController@update')->name('social.update');

        /** Profile */
        Route::prefix('profile')->as('profile.')->group(function () {
            Route::get('/', 'ProfileController@profile')->name('index');
            Route::post('update', 'ProfileController@update')->name('update');
        });
    });

    /** Category */
    Route::resource('category', 'CategoryController')->except('update');
    Route::put('category/update', 'CategoryController@update')->name('category.update');
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
    /** Root */
    Route::get('/', 'ApplicationController@index')->name('index');

    /** Pages */
    Route::prefix('pages')->group(function () {
        Route::get('blog', 'BlogController@frontIndex')->name('blog.index');
        Route::get('blog/{slug}', 'BlogController@frontShow')->name('blog.show');
        Route::get('projects', 'ProjectController@frontIndex')->name('project.index');
        Route::get('contact', 'ApplicationController@contact')->name('contact');
    });
});

$setting = resolve(SettingRepo::class)->all();

Route::get("/{$setting['about']->route}", 'ApplicationController@about');
