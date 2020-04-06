<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth')->as('admin.')->group(function() {
	Route::get('home', 'HomeController@index')->name('index');

	Route::prefix('select2')->as('select2.')->group(function() {
		Route::get('category', 'Service\Select2Controller@category')->name('category');
	});

	Route::prefix('uploads')->as('upload.')->group(function() {
		Route::post('project', 'Service\UploadController@project')->name('project');
	});

	Route::prefix('subscribers')->as('subscriber.')->group(function() {
		Route::get('/', 'SubscriberController@index')->name('index');
	});

	Route::prefix('appointments')->as('appointment.')->group(function() {
		Route::get('/', 'AppointmentController@index')->name('index');
		Route::get('/{id}', 'AppointmentController@show')->name('show');
	});

	Route::resource('projects', 'ProjectController');
	Route::prefix('projects')->as('projects.')->group(function() {
		Route::post('update-status', 'ProjectController@status')->name('status');
	});

	Route::prefix('category')->as('category.')->group(function() {
		Route::get('/', 'CategoryController@index')->name('index');
		Route::post('store', 'CategoryController@store')->name('store');
	});

});

Route::as('application.')->group(function() {
	Route::post('subscribe', 'SubscriberController@subscribe')->name('subscribe');
	Route::post('appointment', 'AppointmentController@store')->name('appointment');

	Route::get('/', 'ApplicationController@index')->name('index');
	Route::get('about', 'ApplicationController@about')->name('about');
	Route::get('contact', 'ApplicationController@contact')->name('contact');
});