<?php

use Larabook\Groups\Group;

use Larabook\Statuses\Status;

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
        
        $this->beforeFilter('auth');
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

        return View::make('groups.show', compact('group'));
        
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

    public function joinTheGroup($id)
    {
        $group = Group::findOrFail($id);

        $user = Auth::user();

        $user->groups()->attach([$group->id]);

        $user->save();

        Flash::success('Join the group.');
        
        return Redirect::route('groups.index');
    }

    public function quitTheGroup($id)
    {
        $group = Group::findOrFail($id);

        $user = Auth::user();

        // TODO:: kullanıcının gruptaki yorumları ve postları silinecek
        
        $user->groups()->detach([$group->id]);

        $user->save();

        Flash::success('Quit the group.');
        
        return Redirect::route('groups.index');
    }

    public function postStatus($id)
    {
        $this->groupForm->validForPostStatus($input = Input::only('body'));

        $group = Group::findOrFail($id);

        $user = Auth::user();

        if (!$user->inGroup($group->id)) {
            
            Flash::error('Not included in this group.');

            return Redirect::back();
        }

        $status = new Status;

        $status->group_id = $group->id;

        $status->user_id = $user->id;

        $status->body = $input['body'];

        $status->save();

        Flash::success('Your status has been updated.');
        
        return Redirect::back();
    }
}
