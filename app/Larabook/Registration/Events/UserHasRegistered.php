<?php

namespace Larabook\Registration\Events;

use Larabook\Users\User;

class UserHasRegistered
{
    /**
     * @var User
     */
    public $user;
    
    /**
     * @param User $user 
     */
    function __construct(User $user) {
        $this->user = $user;
    }
}
