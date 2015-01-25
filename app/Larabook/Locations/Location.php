<?php

namespace Larabook\Locations;

use Laracasts\Presenter\PresentableTrait;

class Location extends \Eloquent
{
    
    use PresentableTrait;
    
    /**
     * Fillable fields for a new status.
     *
     * @var array
     */
    protected $fillable = ['locations'];
    
    /**
     * Path to the presenter for a status.
     *
     * @var string
     */
    protected $presenter = 'Larabook\Locations\LocationPresenter';
}