<?php

namespace Controllers\Admin;

use Larabook\Groups\GroupRepository;

use Larabook\Groups\CreateGroupCommand;

use Larabook\Statuses\Status;

use Larabook\Forms\GroupForm;

use Larabook\Languages\LanguageRepository;

use View, Input, Auth, Flash, Redirect;

class GroupsController extends BaseController
{

	/**
     * @var GroupForm
     */
    private $groupForm;

    private $groupRepository;

    private $languageRepository;
    
    /**
     * Constructor
     *
     * @param GroupForm $groupForm
     */
    function __construct(GroupForm $groupForm, GroupRepository $groupRepository, LanguageRepository $languageRepository) {
        parent::__construct();
        
        $this->beforeFilter('auth');

        $this->groupForm = $groupForm;

        $this->groupRepository = $groupRepository;

        $this->languageRepository = $languageRepository;
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

        $languages = $this->languageRepository->getList('name', 'slug');
        
        return View::make('admin::pages.groups.create', compact('languages'));
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        
        $this->groupForm->validForCreate($input = Input::only('name', 'slug'));

        $group = $this->execute(CreateGroupCommand::class);

        $group->users()->attach([Auth::user()->id => ['is_owner' => true]]);

        Flash::success('Groups successfully created.');

        return Redirect::route('admin.groups.index');

    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug) {
        
        $group = $this->groupRepository->firstFindBySlug($slug);

        return View::make('admin::pages.groups.show', compact('group'));
        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        
        $group = $this->groupRepository->findById($id);

        $languages = $this->languageRepository->getList('name', 'slug');

        return View::make('admin::pages.groups.edit', compact('group', 'languages'));
        
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        
        $this->groupForm->validForUpdate($id, $input = Input::only('name', 'slug', 'translations'));

        $group = $this->groupRepository->findById($id);

        $group->name = $input['name'];
        $group->slug = $input['slug'];
        $group->translations = $input['translations'];

        $group->save();

        Flash::success('Groups successfully updated.');

        return Redirect::route('admin.groups.index');
        
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        
        $group = $this->groupRepository->findById($id);

        $user = Auth::user();

        if (!$user->isOwner($group->id)) {
            
            Flash::error('You are not authorized to delete this group.');

            return Redirect::back();
        }

        $group->delete();

        Flash::success('Groups successfully deleted.');
        
        return Redirect::route('admin.groups.index');
    }
}
