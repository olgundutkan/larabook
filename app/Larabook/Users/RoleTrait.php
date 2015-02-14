<?php 

namespace Larabook\Users;

use Larabook\Roles\Role, InvalidRoleException;

trait RoleTrait
{
    /**
     * A user belongs to many roles
     * @return mixed 
     */
    public function roles()
    {
        return $this->belongsToMany('Larabook\Roles\Role', 'roles_users');
    }

    public function setRolesAttribute($roles)
    {
        $this->roles()->sync((array) $roles);
    }

    public function getRoles()
    {
        return $this->roles;
    }
    public function hasRoles($roleNames = [])
    {
        $roleList = Role::lists('name', 'id');
        foreach ((array) $roleNames as $allowedRole) {
            // validate that the role exists
            if ( ! in_array($allowedRole, $roleList)) {
                throw new InvalidRoleException("Unidentified role: {$allowedRole}");
            }
            // validate that the user has the role
            if ( ! $this->roleCollectionHasRole($allowedRole)) {
                return false;
            }
        }
        return true;
    }
    private function roleCollectionHasRole($allowedRole)
    {
        $roles = $this->getRoles();
        if (! $roles) {
            return false;
        }
        foreach ($roles as $role) {
            if (strtolower($role->name) == strtolower($allowedRole)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($allowedRole)
    {
        $roles = $this->getRoles();
        if (! $roles) {
            return false;
        }
        foreach ($roles as $role) {
            if (strtolower($role->name) == strtolower($allowedRole)) {
                return true;
            }
        }
        return false;
    }
}