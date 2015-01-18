<?php

use Larabook\Users\UserRepository;

class UsersController extends \BaseController
{
    
    /**
     * @var UserRepository
     */
    protected $userRepository;
    
    /**
     * @param UserRepository $userRepository
     */
    function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
        $this->beforeFilter('auth', ['except' => ['getActivate']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $users = $this->userRepository->getPaginated();
        
        return View::make('users.index')->withUsers($users);
    }
    
    /**
     * Display a user's profile.
     *
     * @param $username
     * @return mixed
     */
    public function show($username) {
        $user = $this->userRepository->findByUsername($username);
        
        return View::make('users.show')->withUser($user);
    }
    
    /**
     * User activation
     * @param  string $activation_code 
     * @return mixed                  
     */
    public function getActivate($activation_code) {
        $user = $this->userRepository->findByActivationCode($activation_code);
        //TODO: refactor
        $user->activated = true;
        $user->activation_code = null;
       
        $user->save();

        Flash::message('Account activated! You can now login with credential.');
        // TODO: Translation ->with('success', Lang::get('user.informations.user_activated'))
        return Redirect::route('login_path');
    }
}
