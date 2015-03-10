<?php

namespace Controllers\Admin;

use Larabook\Locations\LocationRepository;
use Larabook\Locations\LocationCommand;
use Larabook\Forms\LocationForm;
use View, Redirect, Lang, Input, Flash;

class LocationsController extends BaseController
{
	/**
	 * @var LocationRepository
	 */
	protected $locationRepository;

	/**
	 * @var LocationForm
	 */
	protected $locationForm;

	/**
	 * @param LocationRepository $locationRepository 
	 * @param LocationForm       $locationForm       
	 */
	public function __construct(LocationRepository $locationRepository, LocationForm $locationForm)
	{
		parent::__construct();

		$this->locationRepository = $locationRepository;
		$this->locationForm       = $locationForm;
	}
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        
		$locations = $this->locationRepository->getAllLocations();

        return View::make('admin.pages.locations.index', compact('locations'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        $locations = withEmpty($this->locationRepository->getList('name', 'id'));

        return View::make('admin::pages.locations.create', compact('locations'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        
        $input = Input::only('new_location_name', 'parent_id');
        
        $this->locationForm->validForCreate($input);
        
        $location = $this->execute(LocationCommand::class);
        
        Flash::success('Location succesfully created.');
        
        return Redirect::route('admin.locations.index');
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        
        $location = $this->locationRepository->findById($id);

        return View::make('admin.pages.locations.show', compact('location'));        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        
        $location = $this->locationRepository->findById($id);

        $locations = withEmpty($this->locationRepository->getList('name', 'id'));
        
        return View::make('admin.pages.locations.edit', compact('location', 'locations')); 
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        
        $input = Input::only('location_name', 'parent_id');
        
        $this->locationForm->validForUpdate($id, $input);

        $location = $this->locationRepository->updateRecord($id, $input['location_name'], $input['parent_id']);

        Flash::success('Location succesfully Updated.');
        
        return Redirect::route('admin.locations.index');
        
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        
        $location = $this->locationRepository->findById($id);

        //$parent_id = $location->parent_id;

        // TODO: Check children

        $location->delete();

        Flash::success('Location succesfully deleted.');
        
        return Redirect::route('admin.locations.index');
        
    }
}
