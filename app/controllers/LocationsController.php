<?php

use Larabook\Locations\LocationRepository;

class LocationsController extends \BaseController
{

	/**
	 * @param LocationRepository $locationRepository  
	 */
	public function __construct(LocationRepository $locationRepository)
	{
		parent::__construct();

		$this->locationRepository = $locationRepository;
	}
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function getChildList() {
        
        if (Request::ajax()) {

        	return json_encode($this->locationRepository->getChildrenList(Input::get('id')));
        }
        
    }
}
