<?php

namespace Larabook\Groups;

use Laracasts\Presenter\PresentableTrait;

class Group extends \Eloquent
{
    
    use PresentableTrait;
    
    /**
     * Fillable fields for a new status.
     *
     * @var array
     */
    protected $fillable = ['name'];
    
    /**
     * Path to the presenter for a status.
     *
     * @var string
     */
    protected $presenter = 'Larabook\Groups\GroupPresenter';
    
    /**
     * A status belongs to a user.
     */
    public function user() {
        return $this->belongsToMany('Larabook\Users\User', 'group_users');
    }
}