<?php

namespace Larabook\Locations;

class LocationCommand
{
    public $name;    
    public $parent_id;
    
    function __construct($new_location_name, $parent_id = null) {
        $this->name = $new_location_name;
        $this->parent_id = $parent_id;
    }
}