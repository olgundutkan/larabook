<?php

namespace Larabook\Theme;

class Theme
{
    protected $theme = 'default';
    
    protected $view;
    
    //TODO: Move options to config file
    protected $options = ['theme_path' => 'themes', 'views_path' => 'views'];
    
    public function __construct($view) {
        $this->view = $view;
    }
    
    public function set($theme, $options = []) {
        if ($theme != false) {
            $this->theme = $theme;
        }
        
        if (!$this->exists($theme)) {
            throw new ThemeNotFoundException("Theme [$theme] not found.");
        }
        
        $this->options = array_merge($this->options, $options);
        
        $this->addPathLocation();
    }
    
    public function getThemeName() {
        return $this->theme;
    }
    
    public function exists($theme) {
        $path = public_path() . '/' . $this->options['theme_path'] . '/' . $theme;
        
        return is_dir($path);
    }
    
    protected function addPathLocation() {
        $hints[] = app_path() . '/' . $this->options['views_path'] . '/' . $this->getThemeName();
        
        $this->view->addNamespace($this->getThemeName(), $hints);
    }
    
    public function asset($path = '') {
        return asset($this->options['theme_path'] . '/' . $this->getThemeName() . '/' . trim($path, '/'));
    }
}
