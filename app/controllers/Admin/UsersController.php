<?php

namespace Controllers\Admin;

use Larabook\Users\UserRepository;

use Larabook\Roles\RoleRepository;

use Larabook\Users\Exceptions\UserAuthenticationException;

use Larabook\Locations\Location;

use Larabook\Forms\UserForm;

use Larabook\Forms\RegistrationForm;

use Larabook\Registration\RegisterUserCommand;

use View, Auth, Input, Flash, Redirect;

class UsersController extends BaseController
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @var RoleRepository
     */
    protected $roleRepository;

    /**
     * @var UserForm
     */
    protected $userProfileForm;

    /**
     * @var RegistrationForm
     */
    private $registrationForm;

    /**
     * @param UserRepository $userRepository 
     * @param UserForm       $userForm
     * @param RegistrationForm $registrationForm
     */
    function __construct(UserRepository $userRepository, UserForm $userForm, RoleRepository $roleRepository, RegistrationForm $registrationForm) {
        parent::__construct();

        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->userProfileForm = $userForm;
        $this->registrationForm = $registrationForm;
    }
    
    /**
     * Display a listing of the resource.
     * GET /users
     *
     * @return Response
     */
    public function index() {
        $users = $this->userRepository->getPaginated(10);
        
        return View::make('admin.pages.users.index', compact('users'));
    }
    
    /**
     * Show the form for creating a new resource.
     * GET /users/create
     *
     * @return Response
     */
    public function create() {
        $roles = $this->roleRepository->getToArrayList();

        // TODO : refactoring  and must be modified
        $countries = Location::where('parent_id', 0)->lists('name', 'id');
        $states = Location::whereIn('parent_id', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10])->lists('name', 'id');
        $cities = Location::whereIn('parent_id', [11, 12, 13, 14, 15, 16, 17, 18, 19, 20])->lists('name', 'id');
        
        return View::make('admin.pages.users.create', compact('roles', 'countries', 'states', 'cities'));
    }
    
    /**
     * Store a newly created resource in storage.
     * POST /users
     *
     * @return Response
     */
    public function store() {
        $this->registrationForm->validate(Input::all());
        
        $user = $this->execute(RegisterUserCommand::class);
        
        Flash::success('User Succesfully created.');
        
        return Redirect::route('manage.users.index');
    }
    
    /**
     * Display the specified resource.
     * GET /users/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //$user = User::findOrFail($id);
        
        return View::make('admin.pages.users.show', compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     * GET /users/{id}/edit
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($username) {
        
        $user = $this->userRepository->findByUsername($username);
        // TODO : refactoring  and must be modified
        $countries = Location::where('parent_id', 0)->lists('name', 'id');
        $states = Location::whereIn('parent_id', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10])->lists('name', 'id');
        $cities = Location::whereIn('parent_id', [11, 12, 13, 14, 15, 16, 17, 18, 19, 20])->lists('name', 'id');
        
        return View::make('admin.pages.users.edit', compact('user', 'countries', 'states', 'cities'));
    }
    
    /**
     * Update the specified resource in storage.
     * PUT /users/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function update($username)
    {
        // TODO:: user check refactorign
        $user = $this->userRepository->findByUsername($username);

        // TODO:: Validate
        $this->userProfileForm->validForProfileUpdate($user->id, $input = Input::all());

        // TODO:: refactoring
        //$user = $this->execute(UserProfileUpdateCommand::class);
        
        $user->username          = $input['username'];
        $user->email             = $input['email'];
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

        $user->save();

        Flash::success('Your profile has been successfully updated!');
        
        return Redirect::route('profile_path', $user->username);
    }
    
    /**
     * Remove the specified resource from storage.
     * DELETE /users/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {

        $user = $this->userRepository->findById($id);

        $user->delete();
        
        Flash::success('Your profile has been successfully deleted!');
        
        return Redirect::back();
    }
}
