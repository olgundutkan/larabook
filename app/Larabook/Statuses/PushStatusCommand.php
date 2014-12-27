<?php 

namespace Larabook\Statuses;

class PushStatusCommand {

    public $user_id;

    public $body;

    function __construct($user_id, $body)
    {
        $this->user_id = $user_id;
        $this->body = $body;
    }

}