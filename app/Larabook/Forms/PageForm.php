<?php

namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

class PageForm extends FormValidator
{
    public function validForCreate(array $input)
	{
		$create_rules = [
	        'title'		=> 'required',
	        'slug'		=> 'required|unique:pages',
	        'content'	=> 'required',
	        'status'	=> 'required'
	    ];

		$this->rules = $create_rules;

    	return $this->validate($input);
	}

	public function validForUpdate($id, array $input)
	{
		$update_rules = [
	        'title'		=> 'required',
	        'slug'		=> 'required|unique:pages,slug,'.$id,
	        'content'	=> 'required',
	        'status'	=> 'required'
	    ];

		$this->rules = $update_rules;

    	return $this->validate($input);
	}
}
