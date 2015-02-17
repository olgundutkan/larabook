<?php

namespace Larabook\Privacies;

class Privacy extends \Eloquent
{
	/**
     * The database table used by the model.
     *
     * @var string
     */    
    protected $table = 'user_privacy_settings';
    
    /**
     * Which fields may be mass assigned?
     *
     * @var array
     */
    protected $fillable = ['user_id', 'first_name', 'last_name', 'gender', 'email', 'title', 'dob'];
    
    /**
     * A group belongs to one user
     * @return mixed
     */
    public function users() {
        $this->belongsTo('Larabook\Users\User');
    }
}
