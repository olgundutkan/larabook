<?php

namespace Larabook\Registration;

class RegisterUserCommand
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
    public $groups;
    public $language_id;
    public $is_commercial;
    public $profile_picture;
    
    function __construct($username, $email, $password, $title, $first_name, $last_name, $gender, $dob, $country, $state, $city, $school_department, $groups, $language, $is_commercial = false, $profile_picture) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->title = $title;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->gender = $gender;
        $this->dob = $dob;
        $this->country_id = $country;
        $this->state_id = $state;
        $this->city_id = $city;
        $this->school_department = $school_department;
        $this->groups = $groups;
        $this->is_commercial = $is_commercial;
        $this->language_id = $language;
        $this->activated = false;
        $this->activation_code = get_random_string(42, true, 'users', 'activation_code');
        $this->profile_picture = $profile_picture;
    }
}
