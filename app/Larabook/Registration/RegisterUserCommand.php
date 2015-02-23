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
    public $is_visible_email;
    public $is_visible_title;
    public $is_visible_first_name;
    public $is_visible_last_name;
    public $is_visible_gender;
    public $is_visible_dob;
    
    function __construct($username, $email, $password, $title, $first_name, $last_name, $gender, $dob, $country, $state, $city, $school_department, $groups, $language, $is_commercial = false, $profile_picture, $is_visible_email = false, $is_visible_title = false, $is_visible_first_name = false, $is_visible_last_name = false, $is_visible_gender = false, $is_visible_dob = false) {
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
        $this->is_visible_email = $is_visible_email;
        $this->is_visible_title = $is_visible_title;
        $this->is_visible_first_name = $is_visible_first_name;
        $this->is_visible_last_name = $is_visible_last_name;
        $this->is_visible_gender = $is_visible_gender;
        $this->is_visible_dob = $is_visible_dob;
    }
}
