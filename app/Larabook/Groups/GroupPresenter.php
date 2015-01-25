<?php

namespace Larabook\Groups;

use Laracasts\Presenter\Presenter;

class GroupPresenter extends Presenter
{
    
    /**
     * Display how long has been since th publish date
     *
     * @return mixed
     */
    public function timeSincePublished() {
        return $this->created_at->diffForHumans();
    }
}