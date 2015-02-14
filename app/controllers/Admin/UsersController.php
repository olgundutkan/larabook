<?php

namespace Controllers\Admin;

use Larabook\Users\UserRepository;

use Larabook\Users\Exceptions\UserAuthenticationException;

use Larabook\Locations\Location;

use Larabook\Forms\UserForm;

use Larabook\Forms\RegistrationForm;

use Larabook\Registration\RegisterUserCommand;

use View;

class UsersController extends BaseController
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
     * @var RegistrationForm
     */
    private $registrationForm;

    /**
     * @param UserRepository $userRepository 
     * @param UserForm       $userForm
     * @param RegistrationForm $registrationForm
     */
    function __construct(UserRepository $userRepository, UserForm $userForm, RegistrationForm $registrationForm) {
        parent::__construct();

        $this->userRepository = $userRepository;
        $this->userProfileForm = $userForm;
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
        //$roles = Role::lists('name', 'id');
        
        return View::make('admin::pages.users.create', compact('roles', 'categories'));
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
        
        return Redirect::route('admin.users.index')->withSuccess(Lang::get('user.informations.user_created'));
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
        
        return View::make('admin::pages.users.show', compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     * GET /users/{id}/edit
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //$user = User::findOrFail($id);
        //$roles = Role::lists('name', 'id');
        //$assignedRoles = array_pluck($user->roles->toArray(), 'id');
        
        return View::make('admin::pages.users.edit', compact('user', 'roles', 'assignedRoles', 'categories', 'assignedCategories'));
    }
    
    /**
     * Update the specified resource in storage.
     * PUT /users/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        
        return Redirect::route('admin.users.index')->withSuccess(Lang::get('user.informations.user_updated'));
    }
    
    /**
     * Remove the specified resource from storage.
     * DELETE /users/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //$user = User::destroy($id);
        
        return Redirect::route('admin.users.index')->withSuccess(Lang::get('user.informations.user_destroyed'));
    }
}
