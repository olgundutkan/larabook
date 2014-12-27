<?php

namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

class StatusForm extends FormValidator
{

	/**
     * Validation rules for registration
     *
     * @var array
     */
    protected $rules = [
        'user_id' 	=> 'required',
        'body' 	=> 'required'
    ];

}