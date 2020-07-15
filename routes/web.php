<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth')->as('admin.')->group(function() {
	Route::get('home', 'HomeController@index')->name('index');

	/** Setting */
	Route::prefix('setting')->as('setting.')->group(function() {
		Route::resource('social', 'SocialMediaController');
	});

	/** Category */
	Route::resource('category', 'CategoryController');
	Route::prefix('select2')->as('select2.')->group(function() {
		Route::get('category', 'Service\Select2Controller@category')->name('category');
	});

	/** Upload facade */
	Route::prefix('uploads')->as('upload.')->group(function() {
		Route::post('project', 'Service\UploadController@project')->name('project');
	});

	/** projects */
	Route::resource('projects', 'ProjectController')->except('show');
	Route::prefix('projects')->as('projects.')->group(function() {
		Route::post('update-status', 'ProjectController@status')->name('status');
		Route::post('slick-corausel', 'ProjectController@slick')->name('slick');
	});

	/** blog */
	Route::resource('blog', 'BlogController');
});

Route::as('application.')->group(function() {
	Route::get('/', 'ApplicationController@index')->name('index');
	Route::get('about', 'ApplicationController@about')->name('about');
	Route::get('galery', 'ApplicationController@galery')->name('galery');
	Route::get('contact', 'ApplicationController@contact')->name('contact');
});
