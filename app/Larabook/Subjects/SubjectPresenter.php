<?php

namespace Larabook\Subjects;

use Laracasts\Presenter\Presenter;

class SubjectPresenter extends Presenter
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
