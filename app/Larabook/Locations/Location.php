<?php

namespace Larabook\Locations;

class Location extends \Eloquent
{
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'locations';
    
    /**
     * Fillable fields for a new status.
     *
     * @var array
     */
    protected $fillable = ['name', 'parent_id'];
    
    /**
     * Register a new location
     *
     * @param $name
     * @param $parent_id
     * @return Role
     */
    public static function register($name, $parent_id) {
        $location = new static (compact('name', 'parent_id'));
        return $location;
    }

    /**
     * A location has one parent
     * @return mixed 
     */
    public function parent() {
        return $this->hasOne('Larabook\Locations\Location', 'id', 'parent_id');
    }

    /**
     * A location has many children
     * @return mixed 
     */
    public function children() {
        return $this->hasMany('Larabook\Locations\Location', 'parent_id', 'id');
    }

    public function setParentIdAttribute($value) {
        
        $this->attributes['parent_id'] = isset($value) ? $value : false;
    }
}
