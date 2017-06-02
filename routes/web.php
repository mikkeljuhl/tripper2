<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');


// Organization routes
Route::group(['namespace' => 'Organization'], function () {
    Route::get('/organizations', 'OrganizationController@index')->name('index_organization');
    Route::post('/organizations', 'OrganizationController@store')->name('store_organization');
    Route::get('/organizations/register', 'OrganizationController@register')->name('register_organization');
});


Route::group(['namespace' => 'Calendar'], function () {
    Route::get('/calendars', 'CalendarController@index')->name('index_calendar');
    Route::get('/calendars/{year}/{month}', 'CalendarController@show')->name('show_calendar');
    Route::post('/calendars', 'CalendarController@store')->name('store_calendar');




    Route::get('/calendars/countries', 'CountryController@index')->name('index_country');
    Route::post('/calendars/countries', 'CountryController@store')->name('store_country');

});