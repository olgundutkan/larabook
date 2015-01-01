<?php

namespace Larabook\Registration\Events;

use Larabook\Users\User;

class UserRegistered
{	
	/**
	 * @var User
	 */
    public $user;
    
    /**
     * @param User $user 
     */
    public function __construct(User $user) {
        $this->user = $user;
    }
}
