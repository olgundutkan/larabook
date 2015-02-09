<?php

namespace Larabook\Groups;

use Larabook\Users\UserRepository;

class GroupsRepository
{
    
    /**
     * Persist a group
     *
     * @param Group $group
     * @return mixed
     */
    public function save(Group $group) {
        $group->save();
    }

    /**
     * Find a group by their id.
     *
     * @param $id
     * @return mixed
     */
    public function findById($id) {
        return Group::findOrFail($id);
    }
}
