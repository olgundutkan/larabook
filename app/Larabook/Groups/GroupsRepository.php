<?php

namespace Larabook\Groups;

class GroupsRepository
{
    
    /**
     * Save a new group for a user.
     *
     * @param Group $group
     * @param $userId
     * @return mixed
     */
    public function save(Group $group, $userId) {
        return User::findOrFail($userId)->groups()->save($group);
    }
}
