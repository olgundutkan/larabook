<?php

namespace Larabook\Roles;

class RoleCommand
{
    public $id;
    public $name;    
    public $description;
    
    function __construct($name, $description, $id = null) {
    	$this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }
}
