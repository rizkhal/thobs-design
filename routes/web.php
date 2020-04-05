<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::middleware('auth')->as('admin.')->group(function() {
	Route::get('home', 'HomeController@index')->name('index');
	Route::prefix('subscribers')->as('subscriber.')->group(function() {
		Route::get('/', 'SubscriberController@index')->name('index');
	});
	Route::prefix('appointments')->as('appointment.')->group(function() {
		Route::get('/', 'AppointmentController@index')->name('index');
		Route::get('/{id}', 'AppointmentController@show')->name('show');
	});
	Route::prefix('projects')->as('project.')->group(function() {
		Route::get('/', 'ProjectController@index')->name('index');
		Route::get('create', 'ProjectController@create')->name('create');
	});
});

Route::as('application.')->group(function() {
	Route::post('subscribe', 'SubscriberController@subscribe')->name('subscribe');
	Route::post('appointment', 'AppointmentController@store')->name('appointment');

	Route::get('/', 'ApplicationController@index')->name('index');
	Route::get('about', 'ApplicationController@about')->name('about');
	Route::get('contact', 'ApplicationController@contact')->name('contact');
});