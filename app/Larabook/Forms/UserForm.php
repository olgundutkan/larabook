<?php

namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

use Larabook\Locations\Location;

class UserForm extends FormValidator
{
	/**
    * Validation rules for registration
    *
    * @var array
    */
    protected $rules = [];

    public function validForProfileUpdate($id, array $input)
    {
    	$profileUpdateRules = [
			'username'          => 'required|unique:users,username,' . $id,
			'email'             => 'required|email|unique:users,email,' . $id,
			'first_name'        => 'required',
			'last_name'         => 'required',
			'gender'            => 'required|in:not_specified,male,female',
			'dob'               => 'required|date_format:d/m/Y',
			'country'           => 'required|in:' . implode(',', Location::where('parent_id', 0)->lists('id')), // TODO::
			'state'             => 'required|in:' . implode(',', Location::whereIn('parent_id', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10])->lists('id')), // TODO::
			'city'              => 'required|in:' . implode(',', Location::whereIn('parent_id', [11, 12, 13, 14, 15, 16, 17, 18, 19, 20])->lists('id')), // TODO::
			'school_department' => 'required',
			'is_commercial'     => '',
			'language'          => 'required|in:1,2',
        ];

        $this->rules = $profileUpdateRules;

        return $this->validate($input);
    }
}