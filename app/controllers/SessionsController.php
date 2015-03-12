<?php

use Larabook\Forms\SignInForm;

class SessionsController extends \BaseController
{
    private $signInForm;
    
    /**
     * @param SignInForm $signInForm
     */
    public function __construct(SignInForm $signInForm) {
        
        parent::__construct();

        $this->beforeFilter('guest', ['except' => 'destroy']);
        
        $this->signInForm = $signInForm;
    }
    
    /**
     * Show the form for signin in.
     *
     * @return Response
     */
    public function create() {
        return View::make('frontend::pages.sessions.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        
        $this->signInForm->validate($input = Input::all());
        
        if (!Auth::attempt(['email' => $input['email'], 'password' => $input['password'], 'activated' => 1], isset($input['remember_me']))) {
            Flash::message('We were unable to sign you in. Please check your credentials and try again!');

            return Redirect::back()->withInput();
        }
        
        if(empty(Auth::user()->first_name) || empty(Auth::user()->last_name) || empty(Auth::user()->dob) || empty(Auth::user()->country_id) || empty(Auth::user()->state_id) || empty(Auth::user()->$user->city_id) || empty(Auth::user()->school_department)) {
            
            Session::put('incomplete_information', 'Do you have incomplete information.');
        }

        Flash::message('Welcome back!');
        
        return Redirect::intended('/');
    }
    
    /**
     * Log a user out of Larabook
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id = null) {
        Auth::logout();

        Session::forget('incomplete_information');
        
        Flash::message('You have now been logged out.');
        
        return Redirect::home();
    }
}
