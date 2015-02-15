<?php

namespace Larabook\Roles;

class Role extends \Eloquent
{
	/**
     * The database table used by the model.
     *
     * @var string
     */    
    protected $table = 'roles';
    
    /**
     * Which fields may be mass assigned?
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];
    
    /**
     * A group belongs to many users
     * @return mixed
     */
    public function users() {
        $this->belongsToMany('User', 'users_roles');
    }
    
    /**
     * Register a new role
     *
     * @param $name
     * @param $description
     * @return Role
     */
    public static function register($name, $description) {
        $role = new static (compact('name', 'description'));
        return $role;
    }
}
