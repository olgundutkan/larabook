<?php

// TODO:: is it right?
if (!Auth::check()) {
	Route::get('/', ['as' => 'home', 'uses' => 'SessionsController@create']);
} else {

/**
 * Dashboard
 */
Route::get('/', ['as' => 'home', 'uses' => 'DashboardController@index']);

}

Route::post('/', ['as' => 'filter_group_path', 'uses' => 'DashboardController@filter']);

/**
* Register
*/
Route::get('register', ['as' => 'register_path', 'uses' => 'RegistrationController@create']);
Route::post('register', ['as' => 'register_path', 'uses' => 'RegistrationController@store']);

/**
 * Sessions
 */
Route::get('login', ['as' => 'login_path', 'uses' => 'SessionsController@create']);
Route::post('login', ['as' => 'login_path', 'uses' => 'SessionsController@store']);
Route::get('logout', ['as' => 'logout_path', 'uses' => 'SessionsController@destroy']);

Route::get('login-with-facebook', ['as' => 'login.with.facebook', 'uses' => 'SessionsController@loginWithFacebook']);
Route::get('login-with-google', ['as' => 'login.with.google', 'uses' => 'SessionsController@loginWithGoogle']);
Route::get('login-with-twitter', ['as' => 'login.with.twitter', 'uses' => 'SessionsController@loginWithTwitter']);

/**
 * Statuses
 */
Route::get('statuses', ['as' => 'statuses_path', 'uses' => 'StatusesController@index']);
Route::post('statuses', ['as' => 'statuses_path', 'uses' => 'StatusesController@store']);

/**
 * Comments
 */
Route::post('statuses/{id}/comments', ['as' => 'comment_path', 'uses' => 'CommentsController@store']);

/**
 * Users
 */
Route::get('users', ['as' => 'users_path', 'uses' => 'UsersController@index']);
Route::get('@{username}', ['as' => 'profile_path', 'uses' => 'UsersController@show']);
Route::get('@{username}/edit', ['as' => 'profile_path.edit', 'uses' => 'UsersController@edit']);
Route::put('@{username}/edit', ['as' => 'profile_path.update', 'uses' => 'UsersController@update']);
Route::get('close-alert', ['as' => 'incomplete_information.close_alert']);
Route::get('close-alert', function()
{
    Session::forget('incomplete_information');
    return Redirect::back();
});

/**
 * Groups
 */
Route::resource('groups', 'GroupsController');
Route::post('groups/{id}/join', ['as' => 'join_the_group_path', 'uses' => 'GroupsController@joinTheGroup']);
Route::post('groups/{id}/quit', ['as' => 'quit_the_group_path', 'uses' => 'GroupsController@quitTheGroup']);
Route::post('groups/{id}/statuses', ['as' => 'group_statuses_path', 'uses' => 'GroupsController@postStatus']);

/*
* Location
 */
Route::post('locations/children', ['as' => 'locations.get_child_list', 'uses' => 'LocationsController@getChildList']);

/**
 * Follows
 */
Route::post('follows', ['as' => 'follows_path', 'uses' => 'FollowsController@store']);
Route::delete('follows/{id}', ['as' => 'follow_path', 'uses' => 'FollowsController@destroy']);

/**
 * Password
 */
Route::controller('password', 'RemindersController');

/**
 * Larabook Ads
 */
Route::resource('groups-sponsorship', 'GroupsSponsorshipController');

/**
 * Get Activate
 */
Route::get('activate/{activationCode}',['as' => 'activation_path', 'uses' => 'UsersController@getActivate']);

// Admin routes
Route::group(['prefix' => 'admin', 'namespace' => 'Controllers\Admin', 'before' => 'hasRole:Admin'], function()
{
	//Dashboard
	Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@index']);
	// Users
	Route::resource('users', 'UsersController');
	// Groups
	Route::resource('groups', 'GroupsController');
	// Roles
	Route::resource('roles', 'RolesController', ['except' => 'show']);
	// Locations
	Route::resource('locations', 'LocationsController');
	// Languages
	Route::resource('languages', 'LanguagesController');
	// Settings
	Route::resource('settings', 'SettingsController',['only' =>['index', 'edit', 'update']]);

	Route::resource('pages', 'PagesController');
});

Route::get('{slug}', 'PagesController@getPage');