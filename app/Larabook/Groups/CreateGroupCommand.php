<?php

namespace Larabook\Groups;

class CreateGroupCommand
{
    
    public $name;
    public $slug;
    public $translations;
    
    function __construct($name, $slug, $translations) {
        $this->name = $name;
        $this->slug = $slug;
        $this->translations = $translations;
    }
}