<?php

namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

class LocationForm extends FormValidator
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
	        'new_location_name'		=> 'required|unique:locations,name', // TODO: according to parent id unique
	    ];
		$this->rules = $create_rules;
    	return $this->validate($input);
	}

	public function validForUpdate($id, array $input)
	{
		$update_rules = [
	        'location_name'		=> 'required|unique:locations,name,'.$id,
	    ];

		$this->rules = $update_rules;
    	return $this->validate($input);
	}

}