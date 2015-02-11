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
    protected $rules = [];

    public function validForCreate(array $input)
	{
		$create_rules = [
	        'name'		=> 'required',
	        'slug'		=> 'required|unique:groups',
	    ];
		$this->rules = $create_rules;
    	return $this->validate($input);
	}

	public function validForUpdate($id, array $input)
	{
		$update_rules = [
	        'name'		=> 'required',
	        'slug'		=> 'required|unique:groups,slug,'.$id,
	    ];

		$this->rules = $update_rules;
    	return $this->validate($input);
	}

}