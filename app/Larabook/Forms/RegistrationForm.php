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
            'username'          => 'required|unique:users',
            'email'             => 'required|email|unique:users',
            'password'          => 'required|confirmed',
            'first_name'        => 'required',
            'last_name'         => 'required',
            'gender'            => 'required',
            'dob'               => 'required|date_format:d/m/Y',
            'country'           => 'required|in:' . implode(',', Location::lists('id')), // TODO::
            'state'             => 'required|in:' . implode(',', Location::lists('id')), // TODO::
            'city'              => 'required|in:' . implode(',', Location::lists('id')), // TODO::
            'school_department' => 'required',
            'language'          => 'required|in:1,2', // TODO::
        ];

        $this->rules = $registrationRules;

        return $this->validate($input);
    }

}