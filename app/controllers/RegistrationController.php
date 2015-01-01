<?php

use Larabook\Forms\RegistrationForm;

use Larabook\Registration\RegisterUserCommand;

class RegistrationController extends BaseController
{
    
    /**
     * @var RegistrationForm
     */
    private $registrationForm;
    
    /**
     * Constructor
     *
     * @param RegistrationForm $registrationForm
     */
    function __construct(RegistrationForm $registrationForm) {
        $this->registrationForm = $registrationForm;
        
        $this->beforeFilter('guest');
    }
    
    /**
     * Show the form for register user.
     *
     * @return Response
     */
    public function create() {
        return View::make('registration.create');
    }
    
    /**
     * Create new larabook user.
     *
     * @return string
     */
    public function store() {
        $this->registrationForm->validate(Input::all());
        
        $user = $this->execute(RegisterUserCommand::class);
        
        Auth::login($user);
        
        Flash::overlay('Glad to have you as a new Larabook member!');
        
        return Redirect::home();
    }
}
