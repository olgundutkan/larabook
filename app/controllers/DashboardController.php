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
        $states = Location::whereIn('parent_id', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10])->lists('name', 'id');
        $cities = Location::whereIn('parent_id', [11, 12, 13, 14, 15, 16, 17, 18, 19, 20])->lists('name', 'id');
        
        return View::make('frontend::pages.dashboard.index', compact('groups', 'countries', 'states', 'cities'));
    }
}
