<?php

use Larabook\Users\UserRepository;

use Larabook\Users\Exceptions\UserAuthenticationException;

use Larabook\Locations\Location;

use Larabook\Groups\GroupRepository;

use Larabook\Forms\UserForm;

class UsersController extends \BaseController
{
    
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @var UserForm
     */
    protected $userProfileForm;

    /**
     * @var GroupRepository
     */
    private $groupRepository;
    
    /**
     * @param UserRepository $userRepository 
     * @param UserForm       $userForm       
     */
    function __construct(UserRepository $userRepository, UserForm $userForm, GroupRepository $groupRepository) {
        
        parent::__construct();
        
        $this->beforeFilter('auth', ['except' => ['getActivate']]);
        $this->userRepository = $userRepository;
        $this->groupRepository = $groupRepository;
        $this->userProfileForm = $userForm;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $users = $this->userRepository->getPaginated();
        
        return View::make('frontend::pages.users.index')->withUsers($users);
    }
    
    /**
     * Display a user's profile.
     *
     * @param $username
     * @return mixed
     */
    public function show($username) {
        $user = $this->userRepository->findByUsername($username);
        
        return View::make('frontend::pages.users.show')->withUser($user);
    }

    /**
     * Edit profile the current user
     * @param  string $username 
     * @return mixed           
     */
    public function edit($username)
    {
        // TODO:: user check refactorign
        $user = $this->userRepository->findByUsername($username);

        if ($user->username !== Auth::user()->username) {
            throw new UserAuthenticationException("User Not Found!", 1);
        }
        $groups = $this->groupRepository->getList('name', 'id');

        // TODO : refactoring  and must be modified
        $countries = Location::where('parent_id', 0)->lists('name', 'id');
        $states = Location::where('parent_id', key($countries))->lists('name', 'id');
        $cities = Location::where('parent_id', key($states))->lists('name', 'id');

        return View::make('frontend::pages.users.edit', compact('countries', 'states', 'cities', 'groups'))->withUser($user);
    }

    public function update($username)
    {
        // TODO:: user check refactorign
        $user = $this->userRepository->findByUsername($username);

        if ($user->username !== Auth::user()->username) {
            throw new UserAuthenticationException("User Not Found!", 1);            
        }

        // TODO:: Validate
        $this->userProfileForm->validForProfileUpdate($user->id, $input = Input::all());

        // TODO:: refactoring
        //$user = $this->execute(UserProfileUpdateCommand::class);
        
        
        $user->username          = $input['username'];
        $user->email             = $input['email'];
        $user->title             = $input['title'];
        $user->first_name        = $input['first_name'];
        $user->last_name         = $input['last_name'];
        $user->gender            = $input['gender'];
        $user->dob               = $input['dob'];
        $user->country_id        = $input['country'];
        $user->state_id          = $input['state'];
        $user->city_id           = $input['city'];
        $user->school_department = $input['school_department'];
        $user->is_commercial     = isset($input['is_commercial']) ? true : false;
        $user->language_id       = $input['language'];
        $user->profile_picture   = Input::file('profile_picture');
        //$user->groups            = $input['groups'];

        $user->save();
        /*
        // TODO:: başka bir methoda taşı
        $user->privacy->email      = $input['is_visible_email'] ? true : false;
        $user->privacy->title      = $input['is_visible_title'] ? true : false;
        $user->privacy->first_name = $input['is_visible_first_name'] ? true : false;
        $user->privacy->last_name  = $input['is_visible_last_name'] ? true : false;
        $user->privacy->gender     = $input['is_visible_gender'] ? true : false;
        $user->privacy->dob        = $input['is_visible_dob'] ? true : false;
        $user->privacy->save();
        */
        Flash::success('Your profile has been successfully updated!');
        
        return Redirect::route('profile_path', $user->username);
    }
    
    /**
     * User activation
     * @param  string $activation_code 
     * @return mixed                  
     */
    public function getActivate($activation_code) {
        $user = $this->userRepository->findByActivationCode($activation_code);
        //TODO: refactor
        $user->activated = true;
        $user->activation_code = null;
       
        $user->save();

        Flash::message('Account activated! You can now login with credential.');
        // TODO: Translation ->with('success', Lang::get('user.informations.user_activated'))
        return Redirect::route('login_path');
    }
}
