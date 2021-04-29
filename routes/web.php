<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('/payment/{id}', 'HomeController@payemnt')->name('payemnt');
Route::post('/paid', 'HomeController@paid')->name('paid');

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('dashboard');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

});
