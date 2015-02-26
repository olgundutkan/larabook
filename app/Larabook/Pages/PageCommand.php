<?php

namespace Larabook\Pages;

class PageCommand
{
    public $title;
    public $slug;
    public $content;
    public $is_home;
    public $status;
    
    function __construct($title, $slug, $content, $is_home, $status) {
		$this->title   = $title;
		$this->slug    = $slug;
		$this->content = $content;
		$this->is_home = $is_home;
		$this->status  = $status;
    }
}