<?php

namespace Controllers\Admin;

use Larabook\Groups\Group;
use Larabook\Locations\Location;

use View;

class DashboardController extends BaseController
{
    function __construct() {
        
        parent::__construct();
        
        $this->beforeFilter('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        
        return View::make('admin::pages.dashboard.index');
    }
}
