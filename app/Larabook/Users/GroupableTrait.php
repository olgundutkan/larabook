<?php

namespace Larabook\Users;

trait GroupableTrait
{
    
    /**
     * See if the user is in the given group.
     *
     * @param  $groupId
     * @return bool
     */
    public function inGroup($groupId)
    {
        foreach ($this->groups as $group)
        {
            if ($group->id == $groupId)
            {
                return true;
            }
        }
        return false;
    }

    public function isOwner($groupId)
    {
        foreach ($this->groups()->wherePivot('is_owner', 1)->get() as $group)
        {
            if ($group->id == $groupId)
            {
                return true;
            }
        }
        return false;
    }
}
