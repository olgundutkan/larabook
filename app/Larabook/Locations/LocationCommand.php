<?php

namespace Larabook\Locations;

class LocationCommand
{
    public $id;
    public $name;    
    public $parent_id;
    
    function __construct($name, $parent_id, $id = null) {
    	$this->id = $id;
        $this->name = $name;
        $this->parent_id = $parent_id;
    }
}