<?php

use Larabook\Groups\Group;

use Larabook\Forms\GroupForm;

class GroupsController extends \BaseController
{

	/**
     * @var GroupForm
     */
    private $groupForm;
    
    /**
     * Constructor
     *
     * @param GroupForm $groupForm
     */
    function __construct(GroupForm $groupForm) {
        $this->groupForm = $groupForm;
        
        //$this->beforeFilter('guest');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

    	$groups = Group::all();

    	return View::make('groups.index', compact('groups'));
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
        
        $this->groupForm->validate($input = Input::only('name'));
        
        $group = new Group;

        $group->name = $input['name'];

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
    public function show($id) {
        
        //
        
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
        
        $this->groupForm->validate($input = Input::only('name'));

        $group = Group::findOrFail($id);

        $group->name = $input['name'];

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

    public function joinTheGroup($id)
    {
        $group = Group::findOrFail($id);

        $user = Auth::user();

        $user->groups()->attach([$group->id]);

        $user->save();
        
        return Redirect::route('groups.index');
    }

    public function quitTheGroup($id)
    {
        $group = Group::findOrFail($id);

        $user = Auth::user();
        
        $user->groups()->detach([$group->id]);

        $user->save();
        
        return Redirect::route('groups.index');
    }
}
