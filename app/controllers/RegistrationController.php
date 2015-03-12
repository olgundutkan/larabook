<?php

use Larabook\Forms\RegistrationForm;

use Larabook\Registration\RegisterUserCommand;

use Larabook\Privacies\Privacy;

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
        parent::__construct();

        $this->beforeFilter('guest');
        
        $this->registrationForm = $registrationForm;
    }
    
    /**
     * Show the form for register user.
     *
     * @return Response
     */
    public function create() {

        return View::make('frontend::pages.registration.create', compact('groups'));
    }
    
    /**
     * Create new larabook user.
     *
     * @return string
     */
    public function store() {
        
        $this->registrationForm->validForRegistration(Input::all());
        
        $user = $this->execute(RegisterUserCommand::class);

        $privacy = new Privacy;

        $privacy->user_id = $user->id;

        $privacy->first_name = false;
        $privacy->last_name = false;
        $privacy->gender = false;
        $privacy->email = false;
        $privacy->title = false;
        $privacy->dob = false;

        $privacy->save();
        
        Flash::overlay('The activation e-mail has been sent. Please check your e-mail!');
        
        return Redirect::home();
    }
}
