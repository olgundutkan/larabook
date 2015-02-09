<?php

namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

class GroupForm extends FormValidator
{

	/**
     * Validation rules for registration
     *
     * @var array
     */
    protected $rules = [
        'name' 	=> 'required',
    ];

}