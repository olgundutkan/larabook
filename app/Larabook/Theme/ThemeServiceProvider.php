<?php

namespace Larabook\Theme;

use Illuminate\Support\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider
{
    public function register() {
        $this->app['theme'] = $this->app->share(function ($app) {
            $theme = new Theme($app['view']);
            
            return $theme;
        });
    }
}
