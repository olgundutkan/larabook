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
        $role->save();
    }
    
    /**
     * Get all roles.
     *
     * @param int $howMany
     * @return mixed
     */
    public function getAll() {
        return Role::all();
    }

    /**
     * Find a role by their id.
     *
     * @param $id
     * @return mixed
     */
    public function findById($id) {
        return Role::findOrFail($id);
    }

    public function getList($col1, $col2)
    {
        return Role::lists($col1, $col2);
    }
}
