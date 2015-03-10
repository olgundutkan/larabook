<?php

namespace Larabook\Users;

class UserCreateCommand
{
    
    public $username;
	public $email;
	public $password;
	public $title;
	public $first_name;
	public $last_name;
	public $gender;
	public $dob;
	public $country_id;
	public $state_id;
	public $city_id;
	public $school_department;
	public $is_commercial;
	public $language_id;
	public $activated;
	public $activation_code;
	public $profile_picture;

	public $is_visible_first_name;
	public $is_visible_last_name;
	public $is_visible_gender;
	public $is_visible_email;
	public $is_visible_title;
	public $is_visible_dob;
    
    function __construct($username, $email, $title, $password, $first_name, $last_name, $gender, $dob, $country_id = null, $state_id = null, $city_id = null, $school_department = null, $is_commercial = false, $language_id = null, $profile_picture = null, $activated = false, $is_visible_first_name = false, $is_visible_last_name = false, $is_visible_gender = false, $is_visible_email = false, $is_visible_title = false, $is_visible_dob = false) {
        $this->username = $username;
		$this->email = $email;
		$this->password = $password;
		$this->title = $title;
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->gender = $gender;
		$this->dob = $dob;
		$this->country_id = $country_id;
		$this->state_id = $state_id;
		$this->city_id = $city_id;
		$this->school_department = $school_department;
		$this->is_commercial = $is_commercial;
		$this->language_id = $language_id;
		$this->activated = $activated;
		$this->activation_code = get_random_string(42, true, 'users', 'activation_code');
		$this->profile_picture = $profile_picture;

		//TODO:: One input array
		$this->is_visible_first_name = $is_visible_first_name;
		$this->is_visible_last_name = $is_visible_last_name;
		$this->is_visible_gender = $is_visible_gender;
		$this->is_visible_email = $is_visible_email;
		$this->is_visible_title = $is_visible_title;
		$this->is_visible_dob = $is_visible_dob;
    }
}