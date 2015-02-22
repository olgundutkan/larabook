<?php

namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

use Larabook\Locations\Location;

class RegistrationForm extends FormValidator
{

	/**
     * Validation rules for registration
     *
     * @var array
     */
    protected $rules = [];

    public function validForRegistration(array $input)
    {
        $registrationRules = [
            'username'             => 'required|regex:/^([a-zA-Z0-9-_.ğĞçÇşŞüÜöÖıİ ])+$/i|unique:users',
            'email'                => 'required|email|unique:users',
            'password'             => 'required|min:6|confirmed',
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
            'terms_and_conditions' => 'accepted'
        ];

        $this->rules = $registrationRules;

        return $this->validate($input);
    }

}