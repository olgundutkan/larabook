<?php

use Larabook\Forms\SignInForm;

class SessionsController extends \BaseController
{
    private $signInForm;
    
    /**
     * @param SignInForm $signInForm
     */
    public function __construct(SignInForm $signInForm) {
        $this->beforeFilter('guest', ['except' => 'destroy']);
        
        $this->signInForm = $signInForm;
    }
    
    /**
     * Show the form for signin in.
     *
     * @return Response
     */
    public function create() {
        return View::make('sessions.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $formData = Input::only('email', 'password');
        
        $this->signInForm->validate($formData);
        
        if (!Auth::attempt($formData)) {
            Flash::message('We were unable to sign you in. Please check your credentials and try again!');
            
            return Redirect::back()->withInput();
        }
        
        Flash::message('Welcome back!');
        
        return Redirect::intended('statuses');
    }
    
    /**
     * Log a user out of Larabook
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id = null) {
        Auth::logout();
        
        Flash::message('You have now been logged out.');
        
        return Redirect::home();
    }
}
