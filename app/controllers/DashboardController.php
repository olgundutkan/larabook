<?php

use Larabook\Groups\Group;
use Larabook\Locations\Location;

class DashboardController extends \BaseController
{
    function __construct() {
        
        parent::__construct();
        
        $this->beforeFilter('auth');

        $this->beforeFilter('activated');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        
        $groups = Group::all();
        
        // TODO : refactoring  and must be modified
        $countries = Location::where('parent_id', 0)->lists('name', 'id');
        $states = Location::where('parent_id', key($countries))->lists('name', 'id');
        $cities = Location::where('parent_id', key($states))->lists('name', 'id');
        
        return View::make('frontend::pages.dashboard.index', compact('groups', 'countries', 'states', 'cities'));
    }
}
