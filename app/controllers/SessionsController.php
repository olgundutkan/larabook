<?php

use Larabook\Forms\SignInForm;

use Larabook\SocialNetworks\SocialNetwork;

use Larabook\Users\User;

use Larabook\Roles\Role;

use Larabook\Privacies\Privacy;

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
        
        if(empty(Auth::user()->first_name) || empty(Auth::user()->last_name) || empty(Auth::user()->dob) || empty(Auth::user()->country_id) || empty(Auth::user()->state_id) || empty(Auth::user()->city_id) || empty(Auth::user()->school_department)) {
            
            Session::put('incomplete_information', 'Missing information in your profile!');
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

    public function loginWithFacebook() {

        // get data from input
        $code = Input::get( 'code' );

        // get fb service
        $fb = OAuth::consumer( 'Facebook' );

        // check if code is valid

        // if code is provided get user data and sign in
        if ( !empty( $code ) ) {

            // This was a callback request from facebook, get the token
            try {

                $token = $fb->requestAccessToken( $code );
                
            } catch (OAuth\Common\Http\Exception\TokenResponseException $e) {

                Auth::logout();
                
            }
            

            // Send a request with it
            $result = json_decode( $fb->request( '/me' ), true );

            try {
                $facebook = SocialNetwork::where('facebook_id', $result['id'])->firstOrFail();

                Auth::loginUsingId($facebook->user_id);
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                $user = new User;

                $user->first_name = $result['first_name'];
                $user->gender =  $result['gender'];
                $user->last_name =  $result['last_name'];

                $user->activated = true;

                $user->save();

                $userRole = Role::where('name', 'User')->firstOrFail();

                $user->roles = $userRole->id;

                $privacy = new Privacy;

                $privacy->user_id = $user->id;

                $privacy->first_name = false;
                $privacy->last_name = false;
                $privacy->gender = false;
                $privacy->email = false;
                $privacy->title = false;
                $privacy->dob = false;

                $privacy->save();

                $social_network = new SocialNetwork;

                $social_network->user_id = $user->id;

                $social_network->facebook_id = $result['id'];

                $social_network->facebook_link = $result['link'];                

                $social_network->save();

                Auth::loginUsingId($user->id);
            }

            if(empty(Auth::user()->first_name) || empty(Auth::user()->last_name) || empty(Auth::user()->dob) || empty(Auth::user()->country_id) || empty(Auth::user()->state_id) || empty(Auth::user()->city_id) || empty(Auth::user()->school_department)) {
            
                Session::put('incomplete_information', 'Missing information in your profile!');
            }

            return Redirect::intended('/');
        }
        // if not ask for permission first
        else {
            // get fb authorization
            $url = $fb->getAuthorizationUri();

            // return to facebook login url
             return Redirect::to( (string)$url );
        }

    }

    public function loginWithGoogle() {

        // get data from input
        $code = Input::get( 'code' );

        // get google service
        $googleService = OAuth::consumer( 'Google' );

        // check if code is valid

        // if code is provided get user data and sign in
        if ( !empty( $code ) ) {

            // This was a callback request from google, get the token
            $token = $googleService->requestAccessToken( $code );

            // Send a request with it
            $result = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );

            try {
                $twitter = SocialNetwork::where('twitter_id', $result['id'])->firstOrFail();

                Auth::loginUsingId($twitter->user_id);
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                $user = new User;

                $user->first_name = $result['name'];
                $user->gender =  $result['gender'];
                $user->last_name =  $result['name'];

                $user->activated = true;

                $user->save();

                $user->username = 'user' . $user->id;

                $userRole = Role::where('name', 'User')->firstOrFail();

                $user->roles = $userRole->id;

                $privacy = new Privacy;

                $privacy->user_id = $user->id;

                $privacy->first_name = false;
                $privacy->last_name = false;
                $privacy->gender = false;
                $privacy->email = false;
                $privacy->title = false;
                $privacy->dob = false;

                $privacy->save();

                $social_network = new SocialNetwork;

                $social_network->user_id = $user->id;

                $social_network->facebook_id = $result['id'];

                $social_network->facebook_link = $result['link'];                

                $social_network->save();

                Auth::loginUsingId($user->id);
            }

            if(empty(Auth::user()->first_name) || empty(Auth::user()->last_name) || empty(Auth::user()->dob) || empty(Auth::user()->country_id) || empty(Auth::user()->state_id) || empty(Auth::user()->city_id) || empty(Auth::user()->school_department)) {
            
                Session::put('incomplete_information', 'Missing information in your profile!');
            }

            return Redirect::intended('/');

        }
        // if not ask for permission first
        else {
            // get googleService authorization
            $url = $googleService->getAuthorizationUri();

            // return to google login url
            return Redirect::to( (string)$url );
        }
    }

    public function loginWithTwitter() {

        // get data from input
        $token = Input::get( 'oauth_token' );
        $verify = Input::get( 'oauth_verifier' );

        // get twitter service
        $tw = OAuth::consumer( 'Twitter' );

        // check if code is valid

        // if code is provided get user data and sign in
        if ( !empty( $token ) && !empty( $verify ) ) {

            // This was a callback request from twitter, get the token
            $token = $tw->requestAccessToken( $token, $verify );

            // Send a request with it
            $result = json_decode( $tw->request( 'account/verify_credentials.json' ), true );

            try {
                $twitter = SocialNetwork::where('twitter_id', $result['id'])->firstOrFail();

                Auth::loginUsingId($twitter->user_id);
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                $user = new User;

                $user->username = $result['name'];
                $user->first_name = $result['name'];
                $user->last_name =  $result['name'];

                $user->activated = true;

                $user->save();

                $userRole = Role::where('name', 'User')->firstOrFail();

                $user->roles = $userRole->id;

                $privacy = new Privacy;

                $privacy->user_id = $user->id;

                $privacy->first_name = false;
                $privacy->last_name = false;
                $privacy->gender = false;
                $privacy->email = false;
                $privacy->title = false;
                $privacy->dob = false;

                $privacy->save();

                $social_network = new SocialNetwork;

                $social_network->user_id = $user->id;

                $social_network->twitter_id = $result['id'];

                $social_network->twitter_screen_name = $result['screen_name'];                

                $social_network->save();

                Auth::loginUsingId($user->id);
            }

            if(empty(Auth::user()->first_name) || empty(Auth::user()->last_name) || empty(Auth::user()->dob) || empty(Auth::user()->country_id) || empty(Auth::user()->state_id) || empty(Auth::user()->city_id) || empty(Auth::user()->school_department)) {
            
                Session::put('incomplete_information', 'Missing information in your profile!');
            }

            return Redirect::intended('/');

        }
        // if not ask for permission first
        else {
            // get request token
            $reqToken = $tw->requestRequestToken();

            // get Authorization Uri sending the request token
            $url = $tw->getAuthorizationUri(array('oauth_token' => $reqToken->getRequestToken()));

            // return to twitter login url
            return Redirect::to( (string)$url );
        }
    }
}
