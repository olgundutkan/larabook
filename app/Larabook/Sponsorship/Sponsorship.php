<?php

namespace Larabook\Sponsorships;

class Sponsorship extends \Eloquent
{
	/**
     * The database table used by the model.
     *
     * @var string
     */    
    protected $table = 'sponsorships';
    
    /**
     * Which fields may be mass assigned?
     *
     * @var array
     */
    protected $fillable = ['user_id', 'group_id', 'starting_date', 'ending_date'];

    protected $dates = ['starting_date', 'ending_date'];
    
    /**
     * A group belongs to many users
     * @return mixed
     */
    public function statuses() {
        $this->hasMany('Larabook\Statuses\Status');
    }
}