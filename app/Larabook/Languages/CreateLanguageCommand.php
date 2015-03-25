<?php

namespace Larabook\Languages;

class CreateLanguageCommand
{
    
    public $name;
    public $slug;
    
    function __construct($name, $slug) {
        $this->name = $name;
        $this->slug = $slug;
    }
}