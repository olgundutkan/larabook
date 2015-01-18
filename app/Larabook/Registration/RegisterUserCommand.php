<?php

namespace Larabook\Registration;

class RegisterUserCommand
{
    
    public $username;
    
    public $email;
    
    public $password;
    
    function __construct($username, $email, $password) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->activated = false;
        $this->activation_code = get_random_string(42, true, 'users', 'activation_code');
    }
}
