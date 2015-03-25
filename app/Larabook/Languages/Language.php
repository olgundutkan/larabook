<?php

namespace Larabook\Languages;

use Laracasts\Presenter\PresentableTrait;

class Language extends \Eloquent
{
    
    use PresentableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'languages';
    
    /**
     * Fillable fields for a new status.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug'];
    
    /**
     * Path to the presenter for a status.
     *
     * @var string
     */
    protected $presenter = 'Larabook\Languages\LanguagePresenter';

}
