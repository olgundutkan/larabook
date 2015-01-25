<?php

namespace Larabook\Subjects;

use Laracasts\Presenter\PresentableTrait;

class Subject extends \Eloquent
{
    
    use PresentableTrait;

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'subjects';
    
    /**
     * Fillable fields for a new status.
     *
     * @var array
     */
    protected $fillable = ['title'];
    
    /**
     * Path to the presenter for a status.
     *
     * @var string
     */
    protected $presenter = 'Larabook\Subjects\SubjectPresenter';

    /**
     * A subject belongs to a user.
     */
    public function user() {
        return $this->belongsTo('Larabook\Users\User');
    }

}