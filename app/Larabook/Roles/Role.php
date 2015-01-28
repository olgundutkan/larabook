<?php

namespace Larabook\Roles;

class Role extends \Eloquent
{
    
    protected $table = 'roles';
    
    protected $fillable = ['name', 'description'];
    
    public function users() {
        $this->belongsToMany('User', 'users_roles');
    }
}
