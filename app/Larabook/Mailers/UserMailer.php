<?php

namespace Larabook\Mailers;

use Larabook\Users\User;

class UserMailer extends Mailer
{
    
    /**
     * @param  User   $user
     */
    public function sendWelcomeMessage(User $user) {
        // TODO: translations
        $subject = 'Welcome to Larabook';
        
        $view = 'emails.registration.confirm';
        
        $data = ['activation_code' => $user->activation_code];
        
        return $this->sendTo($user, $subject, $view, $data);
    }
}
