<?php

use Larabook\Forms\RegistrationForm;

class RegistrationController extends \BaseController 
{
	/**
	 * @var RegistrationForm
	 */
	protected $registrationForm;

	function __construct(RegistrationForm $registrationForm)
	{
		$this->registrationForm = $registrationForm;
	}


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
		$this->registrationForm->validate(Input::all());
		
		$user = User::create(
			Input::only('username', 'email', 'password')
		);

		Auth::login($user);

		return Redirect::home();
	}


}
