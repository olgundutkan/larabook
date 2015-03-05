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
            
            'groups'               => '',
            'terms_and_conditions' => 'accepted'
        ];

        $this->rules = $registrationRules;

        return $this->validate($input);
    }

}