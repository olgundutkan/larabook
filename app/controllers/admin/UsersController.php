<?php

namespace Controllers\Admin;

use Larabook\Users\UserRepository;

use Larabook\Roles\RoleRepository;

use Larabook\Groups\GroupRepository;

use Larabook\Users\Exceptions\UserAuthenticationException;

use Larabook\Locations\Location;

use Larabook\Forms\UserForm;

use Larabook\Users\UserCreateCommand;

use Larabook\Privacies\Privacy;

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
     * @var UserForm
     */
    private $userForm;

    /**
     * @var GroupRepository
     */
    private $groupRepository;

    /**
     * @param UserRepository $userRepository 
     * @param UserForm       $userForm
     * @param UserForm $userForm
     */
    public function __construct(UserRepository $userRepository, UserForm $userForm, RoleRepository $roleRepository, UserForm $userForm, GroupRepository $groupRepository) {
        parent::__construct();

        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->groupRepository = $groupRepository;
        $this->userProfileForm = $userForm;
        $this->userForm = $userForm;
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
        $roles = $this->roleRepository->getList('name', 'id');

        $groups = $this->groupRepository->getList('name', 'id');

        // TODO : refactoring  and must be modified
        $countries = Location::where('parent_id', 0)->lists('name', 'id');
        $states = Location::where('parent_id', key($countries))->lists('name', 'id');
        $cities = Location::where('parent_id', key($states))->lists('name', 'id');
        
        return View::make('admin.pages.users.create', compact('roles', 'countries', 'states', 'cities', 'groups'));
    }
    
    /**
     * Store a newly created resource in storage.
     * POST /users
     *
     * @return Response
     */
    public function store() {
        $this->userForm->validForAdminCreate($input = Input::all());
        
        $user = $this->execute(UserCreateCommand::class);

        $user->groups = isset($input['groups']) ? $input['groups'] : null;

        $privacy = new Privacy;

        $privacy->user_id = $user->id;

        $privacy->first_name = $input['is_visible_first_name'] ? true : false;
        $privacy->last_name = $input['is_visible_last_name'] ? true : false;
        $privacy->gender = $input['is_visible_gender'] ? true : false;
        $privacy->email = $input['is_visible_email'] ? true : false;
        $privacy->title = $input['is_visible_title'] ? true : false;
        $privacy->dob = $input['is_visible_dob'] ? true : false;

        $privacy->save();
        
        Flash::success('User Succesfully created.');
        
        return Redirect::route('admin.users.index');
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
    public function edit($id) {

        $user = $this->userRepository->findById($id);
        
        $roles = $this->roleRepository->getList('name', 'id');

        $groups = $this->groupRepository->getList('name', 'id');

        // TODO : refactoring  and must be modified
        $countries = Location::where('parent_id', 0)->lists('name', 'id');
        $states = Location::where('parent_id', key($countries))->lists('name', 'id');
        $cities = Location::where('parent_id', key($states))->lists('name', 'id');
        
        return View::make('admin.pages.users.edit', compact('user', 'roles', 'countries', 'states', 'cities', 'groups'));
    }
    
    /**
     * Update the specified resource in storage.
     * PUT /users/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        // TODO:: user check refactorign
        $user = $this->userRepository->findById($id);

        // TODO:: Validate
        $this->userForm->validForAdminUpdate($user->id, $input = Input::all());

        // TODO:: refactoring
        //$user = $this->execute(UserProfileUpdateCommand::class);
        
        $user->username          = $input['username'];
        $user->email             = $input['email'];
        $user->first_name        = $input['first_name'];
        $user->last_name         = $input['last_name'];
        $user->gender            = $input['gender'];
        $user->dob               = $input['dob'];
        $user->country_id        = isset($input['country']) ? $input['country'] : null;
        $user->state_id          = isset($input['state']) ? $input['state'] : null;
        $user->city_id           = isset($input['city']) ? $input['city'] : null;
        $user->school_department = $input['school_department'];
        $user->is_commercial     = isset($input['is_commercial']) ? true : false;
        $user->language_id       = $input['language'];
        $user->groups            = isset($input['groups']) ? $input['groups'] : null;

        $user->save();

        $privacy = $user->privacy()->first();

        $privacy->first_name = $input['is_visible_first_name'] ? true : false;
        $privacy->last_name = $input['is_visible_last_name'] ? true : false;
        $privacy->gender = $input['is_visible_gender'] ? true : false;
        $privacy->email = $input['is_visible_email'] ? true : false;
        $privacy->title = $input['is_visible_title'] ? true : false;
        $privacy->dob = $input['is_visible_dob'] ? true : false;

        $privacy->save();

        Flash::success('Your profile has been successfully updated!');
        
        return Redirect::route('admin.users.index');
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

        $user->privacy()->delete();

        $user->statuses()->delete();

        $user->delete();
        
        Flash::success('Your profile has been successfully deleted!');
        
        return Redirect::back();
    }
}
