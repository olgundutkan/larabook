<?php

namespace Larabook\Groups;

class CreateGroupCommand
{
    
    public $name;
    public $slug;
    
    function __construct($name, $slug) {
        $this->name = $name;
        $this->slug = $slug;
    }
}