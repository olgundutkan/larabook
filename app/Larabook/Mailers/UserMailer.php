<?php

namespace Larabook\Mailers;

use Larabook\Users\User;

class UserMailer extends Mailer
{
    
    /**
     * @param  User   $user
     */
    public function sendWelcomeMessage(User $user) {
        $subject = 'Welcome to Larabook';
        
        $view = 'emails.registration.confirm';
        
        $data = [];
        
        return $this->sendTo($user, $subject, $view);
    }
}
