<?php

namespace Larabook\Roles;

class RoleRepository
{
    
    /**
     * Persist a role
     *
     * @param Role $role
     * @return mixed
     */
    public function save(Role $role) {
        $user->save();
    }
    
    /**
     * Get a array list of all roles.
     *
     * @param int $howMany
     * @return mixed
     */
    public function getToArrayList() {
        return Role::lists('name', 'id');
    }

    /**
     * Find a user by their id.
     *
     * @param $id
     * @return mixed
     */
    public function findById($id) {
        return User::findOrFail($id);
    }
}
