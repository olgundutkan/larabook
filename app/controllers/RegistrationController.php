<?php

class RegistrationController extends \BaseController {


	/**
	 * Show the form for register user.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}


	/**
	 * Create new larabook user.
	 *
	 * @return string
	 */
	public function store()
	{
		return Redirect::home();
	}


}
