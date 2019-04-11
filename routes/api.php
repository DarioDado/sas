<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group.
|
*/


Route::group(['middleware' => []], function() {

    Route::get('/home-page', 'HomePageController@homePage');

    Route::get('/about-page', 'AboutPageController@aboutPage');

    Route::get('/calendar-page', 'CalendarPageController@calendarPage');

    Route::get('/donate-page', 'DonatePageController@donatePage');

    Route::get('/news', 'NewsController@news');

    Route::get('/contact', 'ContactController@contact');

    Route::post('/send-message',  'ContactController@sendMessage');
  });