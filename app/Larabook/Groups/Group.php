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
    protected $fillable = ['name', 'slug'];
    
    /**
     * Path to the presenter for a status.
     *
     * @var string
     */
    protected $presenter = 'Larabook\Groups\GroupPresenter';

    /**
     * @var array
     */
    protected $appends = ['users_count'];
    
    /**
     * A status belongs to a user.
     */
    public function users() {
        return $this->belongsToMany('Larabook\Users\User', 'groups_users')->withPivot('is_owner');
    }
    
    /**
     * A group has many statuses.
     *
     * @return mixed
     */
    public function statuses() {
        return $this->hasMany('Larabook\Statuses\Status')->latest();
    }
    
    public function usersCount() {
        return $this->belongsToMany('Larabook\Users\User', 'groups_users')->selectRaw('count(users.id) as aggregate')->groupBy('pivot_group_id');
    }
    
    public function getUsersCountAttribute() {        
        return $this->users->count();
    }
}
