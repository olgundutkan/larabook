<?php

namespace Controllers\Admin;

use Larabook\Groups\GroupsRepository;

use Larabook\Statuses\Status;

use Larabook\Forms\GroupForm;

use View;

class GroupsController extends BaseController
{

	/**
     * @var GroupForm
     */
    private $groupForm;

    private $groupRepository;
    
    /**
     * Constructor
     *
     * @param GroupForm $groupForm
     */
    function __construct(GroupForm $groupForm, GroupsRepository $groupRepository) {
        parent::__construct();
        
        $this->beforeFilter('auth');

        $this->groupForm = $groupForm;

        $this->groupRepository = $groupRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

    	$groups = $this->groupRepository->getAll();

    	return View::make('admin::pages.groups.index', compact('groups'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        
        return View::make('groups.create');
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        
        $this->groupForm->validForCreate($input = Input::only('name', 'slug'));
        
        $group = new Group;

        $group->name = $input['name'];
        $group->slug = $input['slug'];

        $group->save();

        $group->users()->attach([Auth::user()->id => ['is_owner' => true]]);

        Flash::success('Groups successfully created.');

        return Redirect::route('groups.index');

    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug) {
        
        $group = Group::whereSlug($slug)->firstOrFail();

        return View::make('admin::pages.groups.show', compact('group'));
        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        
        $group = Group::findOrFail($id);

        return View::make('groups.edit', compact('group'));
        
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        
        $this->groupForm->validForUpdate($id, $input = Input::only('name', 'slug'));

        $group = Group::findOrFail($id);

        $group->name = $input['name'];
        $group->slug = $input['slug'];

        $group->save();

        Flash::success('Groups successfully updated.');

        return Redirect::route('groups.index');
        
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        
        $group = Group::findOrFail($id);

        $user = Auth::user();

        if (!$user->isOwner($group->id)) {
            
            Flash::error('You are not authorized to delete this group.');

            return Redirect::back();
        }

        $group->delete();

        Flash::success('Groups successfully deleted.');
        
        return Redirect::route('groups.index');
    }
}
