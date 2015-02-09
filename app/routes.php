<?php

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

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

/**
 * Groups
 */
Route::resource('groups', 'GroupsController');
Route::post('groups/{id}/join', ['as' => 'join_the_group_path', 'uses' => 'GroupsController@joinTheGroup']);
Route::post('groups/{id}/quit', ['as' => 'quit_the_group_path', 'uses' => 'GroupsController@quitTheGroup']);

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
 * Get Activate
 */
Route::get('activate/{activationCode}',['as' => 'activation_path', 'uses' => 'UsersController@getActivate']);