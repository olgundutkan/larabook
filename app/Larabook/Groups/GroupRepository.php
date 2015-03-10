<?php

namespace Larabook\Groups;

use Larabook\Users\UserRepository;

class GroupRepository
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

    public function firstFindBySlug($slug) {
        return Group::whereSlug($slug)->firstOrFail();
    }

    public function getList($col1, $col2)
    {
        return Group::lists($col1, $col2);
    }

    public function getAll()
    {
        return Group::all();
    }
}
