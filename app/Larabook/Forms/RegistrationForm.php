<?php

namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

class RegistrationForm extends FormValidator
{

	/**
     * Validation rules for registration
     *
     * @var array
     */
    protected $rules = [
        'username' 	=> 'required|unique:user',
        'email' 	=> 'required|email|unique:user',
        'password' 	=> 'required|confirmed'
    ];

}