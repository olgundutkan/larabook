<?php

use Larabook\Forms\RegistrationForm;

use Larabook\Registration\RegisterUserCommand;

use Larabook\Locations\Location;

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
        // TODO : refactoring  and must be modified
        $countries = Location::where('parent_id', 0)->lists('name', 'id');
        $states = Location::whereIn('parent_id', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10])->lists('name', 'id');
        $cities = Location::whereIn('parent_id', [11, 12, 13, 14, 15, 16, 17, 18, 19, 20])->lists('name', 'id');

        return View::make('registration.create', compact('countries', 'states', 'cities'));
    }
    
    /**
     * Create new larabook user.
     *
     * @return string
     */
    public function store() {
        $this->registrationForm->validForRegistration(Input::all());
        
        $user = $this->execute(RegisterUserCommand::class);
        
        Flash::overlay('The activation e-mail has been sent. Please check your e-mail!');
        
        return Redirect::home();
    }
}
