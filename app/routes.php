<?php

Event::listen('Larabook.Registration.Events.UserRegistered', function($user){
	dd('send a notification email');
});

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

/**
* Register
*/
Route::get('register', ['as' => 'register_path', 'uses' => 'RegistrationController@create']);
Route::post('register', ['as' => 'register_path', 'uses' => 'RegistrationController@store']);
