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


