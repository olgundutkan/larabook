<?php

use Larabook\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;
use Larabook\Core\CommandBus;

class RegistrationController extends BaseController 
{
	use CommandBus;

	/**
     * @var RegistrationForm
     */
    private $registrationForm;

    /**
     * Constructor
     *
     * @param RegistrationForm $registrationForm
     */
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

		extract(Input::only('username', 'email', 'password'));

		$user = $this->execute(
				new RegisterUserCommand($username, $email, $password)
			);

		Auth::login($user);

		Flash::overlay('Glad to have you as a new Larabook member!');

		return Redirect::home();
	}


}
