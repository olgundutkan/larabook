<?php

namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

class SignInForm extends FormValidator
{

	/**
     * Validation rules for registration
     *
     * @var array
     */
    protected $rules = [
        'email' 	=> 'required|email',
        'password' 	=> 'required'
    ];

}