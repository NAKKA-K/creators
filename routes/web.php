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

    Route::get('inquiries/create', 'HomeController@inquiry')->name('inquiry');
    Route::post('inquiries/', 'HomeController@storeInquiry')->name('store_inquiry');

    Route::get('opinions/create', 'HomeController@opinion')->name('opinion');
    Route::post('opinions/', 'HomeController@storeOpinion')->name('store_opinion');
});

Auth::routes();

// OAuth routes
Route::get('login/{provider}/', 'SocialAccountController@redirectToProvider')
    ->where('provider', '(github|twitter|facebook)');
Route::get('login/{provider}/callback/', 'SocialAccountController@handleProviderCallback')
    ->where('provider', '(github|twitter|facebook)');

Route::resource('events', 'EventController');
Route::resource('users', 'UserController')->only(['index', 'show']);
Route::resource('events.event_participants', 'EventParticipantController')->only(['index', 'store', 'destroy']);
