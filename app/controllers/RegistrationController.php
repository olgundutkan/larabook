<?php

use Larabook\Forms\RegistrationForm;

use Larabook\Registration\RegisterUserCommand;

use Larabook\Groups\GroupsRepository;

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
     * @param GroupsRepository $groupsRepository
     */
    function __construct(RegistrationForm $registrationForm, GroupsRepository $groupsRepository) {
        parent::__construct();

        $this->beforeFilter('guest');
        
        $this->registrationForm = $registrationForm;
        $this->groupsRepository = $groupsRepository;
    }
    
    /**
     * Show the form for register user.
     *
     * @return Response
     */
    public function create() {

        $groups = $this->groupsRepository->getList('name', 'id');

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

        $user->groups = Input::get('groups');
        
        Flash::overlay('The activation e-mail has been sent. Please check your e-mail!');
        
        return Redirect::home();
    }
}
