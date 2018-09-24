<?php

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

Route::name('home.')->group(function() {
    Route::get('', 'HomeController@index')->name('index');
    Route::get('about/', 'HomeController@about')->name('about');
    Route::get('guideline/', 'HomeController@guideline')->name('guideline');
    Route::get('help/', 'HomeController@help')->name('help');
    Route::get('privacy/', 'HomeController@privacy')->name('privacy');
    Route::get('terms_of_service/', 'HomeController@termsOfService')->name('terms_of_service');
});

Auth::routes();

Route::resource('events', 'EventController');
Route::resource('users', 'UserController')->only(['index', 'show']);
Route::resource('events.event_participants', 'EventParticipantController')->only(['index', 'store', 'destroy']);
