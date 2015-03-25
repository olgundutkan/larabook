<?php
namespace Controllers\Admin;

use Larabook\Roles\RoleRepository;
use Larabook\Roles\RoleCommand;
use Larabook\Forms\RoleForm;
use View, Redirect, Lang, Input, Flash;

class RolesController extends BaseController
{
    
    /**
     * @var RoleRepository
     */
    protected $roleRepository;
    
    /**
     * @var RoleForm
     */
    protected $roleForm;
    
    /**
     * @param RoleRepository $roleRepository
     * @param RoleForm       $roleForm
     */
    public function __construct(RoleRepository $roleRepository, RoleForm $roleForm) {
        parent::__construct();
        
        $this->roleRepository = $roleRepository;
        $this->roleForm = $roleForm;
    }
    
    /**
     * Display a listing of the resource.
     * GET /admin/roles
     *
     * @return Response
     */
    public function index() {
        $roles = $this->roleRepository->getAll();
        
        return View::make('admin.pages.roles.index', compact('roles'));
    }
    
    /**
     * Show the form for creating a new resource.
     * GET /admin/roles/create
     *
     * @return Response
     */
    public function create() {
        return View::make('admin.pages.roles.create');
    }
    
    /**
     * Store a newly created resource in storage.
     * POST /admin/roles
     *
     * @return Response
     */
    public function store() {
        $input = Input::only('name', 'description');
        
        $this->roleForm->validForCreate($input);
        
        $role = $this->execute(RoleCommand::class);
        
        Flash::success('Role succesfully created.');
        
        return Redirect::route('manage.roles.index');
    }
    
    /**
     * Show the form for editing the specified resource.
     * GET /admin/roles/{id}/edit
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $role = $this->roleRepository->findById($id);
        
        return View::make('admin.pages.roles.edit', compact('role'));
    }
    
    /**
     * Update the specified resource in storage.
     * PUT /admin/roles/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {

        $input = Input::only('name', 'description');
        
        $this->roleForm->validForUpdate($id, $input);
        
        $this->execute(RoleCommand::class, [
        	'id' => $id,
        	'name' => $input['name'],
        	'description' => $input['description']
        ]);
        
        Flash::success('Role succesfully updated.');
        
        return Redirect::route('manage.roles.index');
    }
    
    /**
     * Remove the specified resource from storage.
     * DELETE /admin/roles/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {

        $role = $this->roleRepository->findById($id);

        $role->delete();

        Flash::success('Role succesfully deleted.');
        
        return Redirect::route('manage.roles.index');
    }
}
