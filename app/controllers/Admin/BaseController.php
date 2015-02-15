<?php

namespace Controllers\Admin;

use Laracasts\Commander\CommanderTrait;

use Theme, View, Auth;

class BaseController extends \Controller
{
    use CommanderTrait;

    public function __construct()
    {        
        $this->beforeFilter('csrf', ['on' => array('post', 'put', 'patch', 'delete')]);
    }
    
    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout() {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
        
        View::share('currentUser', Auth::user());
        
        View::share('signedIn', Auth::user());

    }
}
