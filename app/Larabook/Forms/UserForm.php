<?php

namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

use Larabook\Locations\Location;

class UserForm extends FormValidator
{
	/**
    * Validation rules for registration
    *
    * @var array
    */
    protected $rules = [];

    public function validForProfileUpdate($id, array $input)
    {
    	$profileUpdateRules = [
    		'username'             => 'required|regex:/^([a-zA-Z0-9-_.ğĞçÇşŞüÜöÖıİ ])+$/i|unique:users,username,' . $id,
            'email'                => 'required|email|unique:users,email,' . $id,
            'password'             => 'min:6|confirmed',
            'title'                => 'regex:/^([a-zA-Z0-9.ğĞçÇşŞüÜöÖıİ ])+$/i',
            'first_name'           => 'required|regex:/^([a-zA-Z0-9ğĞçÇşŞüÜöÖıİ ])+$/i',
            'last_name'            => 'required|regex:/^([a-zA-Z0-9ğĞçÇşŞüÜöÖıİ ])+$/i',
            'gender'               => 'required|in:not_specified,male,female',
            'dob'                  => 'required|date_format:d/m/Y', // TODO::
            'country'              => 'required|in:' . implode(',', Location::lists('id')), // TODO::
            'state'                => 'required|in:' . implode(',', Location::lists('id')), // TODO::
            'city'                 => 'required|in:' . implode(',', Location::lists('id')), // TODO::
            'school_department'    => 'required|regex:/^([a-zA-Z0-9-_.ğĞçÇşŞüÜöÖıİ ])+$/i',
            'language'             => 'required|in:1,2', // TODO::
            'groups'               => '',
            'profile_picture'      => 'mimes:jpeg,jpg,bmp,png', // TODO:: file size,
        ];

        $this->rules = $profileUpdateRules;

        return $this->validate($input);
    }

    public function validForAdminCreate(array $input)
    {
        $profileUpdateRules = [
            'username'             => 'required|regex:/^([a-zA-Z0-9-_.ğĞçÇşŞüÜöÖıİ ])+$/i|unique:users,username',
            'email'                => 'required|email|unique:users,email',
            'password'             => 'required|min:6|confirmed',
            'title'                => 'regex:/^([a-zA-Z0-9.ğĞçÇşŞüÜöÖıİ ])+$/i',
            'first_name'           => 'required|regex:/^([a-zA-Z0-9ğĞçÇşŞüÜöÖıİ ])+$/i',
            'last_name'            => 'required|regex:/^([a-zA-Z0-9ğĞçÇşŞüÜöÖıİ ])+$/i',
            'gender'               => 'in:not_specified,male,female',
            'dob'                  => 'date_format:d/m/Y', // TODO::
            'country'              => 'in:' . implode(',', Location::lists('id')), // TODO::
            'state'                => 'in:' . implode(',', Location::lists('id')), // TODO::
            'city'                 => 'in:' . implode(',', Location::lists('id')), // TODO::
            'school_department'    => 'regex:/^([a-zA-Z0-9-_.ğĞçÇşŞüÜöÖıİ ])+$/i',
            'language'             => 'in:1,2', // TODO::
            'groups'               => '',
            'profile_picture'      => 'mimes:jpeg,jpg,bmp,png', // TODO:: file size,
        ];

        $this->rules = $profileUpdateRules;

        return $this->validate($input);
    }

    public function validForAdminUpdate($id, array $input)
    {
        $profileUpdateRules = [
            'username'             => 'required|regex:/^([a-zA-Z0-9-_.ğĞçÇşŞüÜöÖıİ ])+$/i|unique:users,username,' . $id,
            'email'                => 'required|email|unique:users,email,' . $id,
            'password'             => 'min:6|confirmed',
            'title'                => 'regex:/^([a-zA-Z0-9.ğĞçÇşŞüÜöÖıİ ])+$/i',
            'first_name'           => 'required|regex:/^([a-zA-Z0-9ğĞçÇşŞüÜöÖıİ ])+$/i',
            'last_name'            => 'required|regex:/^([a-zA-Z0-9ğĞçÇşŞüÜöÖıİ ])+$/i',
            'gender'               => 'in:not_specified,male,female',
            'dob'                  => 'date_format:d/m/Y', // TODO::
            'country'              => 'in:' . implode(',', Location::lists('id')), // TODO::
            'state'                => 'in:' . implode(',', Location::lists('id')), // TODO::
            'city'                 => 'in:' . implode(',', Location::lists('id')), // TODO::
            'school_department'    => 'regex:/^([a-zA-Z0-9-_.ğĞçÇşŞüÜöÖıİ ])+$/i',
            'language'             => 'in:1,2', // TODO::
            'groups'               => '',
            'profile_picture'      => 'mimes:jpeg,jpg,bmp,png', // TODO:: file size,
        ];

        $this->rules = $profileUpdateRules;

        return $this->validate($input);
    }
}