<?php

namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

class LanguageForm extends FormValidator
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
	        'slug'		=> 'required|unique:languages',
	    ];
		$this->rules = $create_rules;
    	return $this->validate($input);
	}

	public function validForUpdate($id, array $input)
	{
		$update_rules = [
	        'name'		=> 'required',
	        'slug'		=> 'required|unique:languages,slug,'.$id,
	    ];

		$this->rules = $update_rules;
    	return $this->validate($input);
	}

}