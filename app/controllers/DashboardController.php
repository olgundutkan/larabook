<?php

use Larabook\Groups\Group;
use Larabook\Users\User;
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
        $countries = withEmpty(Location::where('parent_id', 0)->lists('name', 'id'));
        $states = withEmpty(Location::where('parent_id', key($countries))->lists('name', 'id'));
        $cities = withEmpty(Location::where('parent_id', key($states))->lists('name', 'id'));
        
        return View::make('frontend::pages.dashboard.index', compact('groups', 'countries', 'states', 'cities'));
    }

    public function filter()
    {
        $input = Input::all();

        if (Input::has('populations')) {
            
            $groupsByPopulations = Group::whereHas('users', function($p) use ($input)
            {
                if (isset($input['country']) AND !empty($input['country'])) {
                    $p = $p->where('users.country_id', $input['country']);
                }

                if (isset($input['state']) AND !empty($input['state'])) {
                    $p = $p->where('users.state_id', $input['state']);
                }

                if (isset($input['city']) AND !empty($input['city'])) {
                    $p = $p->where('users.city_id', $input['city']);
                }

            })->get();
        }

        if (Input::has('active')) {
            
            $groupsByActive = Group::whereHas('users', function($p) use ($input)
            {
                if (isset($input['country']) AND !empty($input['country'])) {
                    $p = $p->where('users.country_id', $input['country']);
                }

                if (isset($input['state']) AND !empty($input['state'])) {
                    $p = $p->where('users.state_id', $input['state']);
                }

                if (isset($input['city']) AND !empty($input['city'])) {
                    $p = $p->where('users.city_id', $input['city']);
                }

            })->get();
        }

        if (Input::has('alphabetical')) {
            
            $groupsByAlphabetical = Group::whereHas('users', function($p) use ($input)
            {
                if (isset($input['country']) AND !empty($input['country'])) {
                    $p = $p->where('users.country_id', $input['country']);
                }

                if (isset($input['state']) AND !empty($input['state'])) {
                    $p = $p->where('users.state_id', $input['state']);
                }

                if (isset($input['city']) AND !empty($input['city'])) {
                    $p = $p->where('users.city_id', $input['city']);
                }

            })->get();
        }

        $groups = Group::all();

        // TODO : refactoring  and must be modified
        $countries = withEmpty(Location::where('parent_id', 0)->lists('name', 'id'));
        $states = withEmpty(Location::where('parent_id', key($countries))->lists('name', 'id'));
        $cities = withEmpty(Location::where('parent_id', key($states))->lists('name', 'id'));
        
        return View::make('frontend::pages.dashboard.index', compact('groups', 'countries', 'states', 'cities', 'groupsByPopulations', 'groupsByActive', 'groupsByAlphabetical', 'input'));
    }
}
