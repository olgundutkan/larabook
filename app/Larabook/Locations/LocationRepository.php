<?php

namespace Larabook\Locations;

class LocationRepository
{
    
    /**
     * Persist a location
     *
     * @param Locations $location
     * @return mixed
     */
    public function save(Location $location) {
        $location->save();
    }
    
    /**
     * Get all countries.
     *
     * @param int $howMany
     * @return mixed
     */
    public function getAllCountries() {
        return Location::where('parent_id', 0)->get();
    }
    
    /**
     * Get locations by id
     * @param  integer $parent_id [description]
     * @return [type]             [description]
     */
    public function getByParentId($parent_id = 0) {
        return Location::where('parent_id', $parent_id)->get();        
    }

    public function getParentId($id = 0) {
        $location = Location::where('id', $id)->first();

        if ($location) {
            return $location->parent_id;
        }

        return false;
    }
    
    /**
     * Find a location by their id.
     *
     * @param $id
     * @return mixed
     */
    public function findById($id) {
        return Location::findOrFail($id);
    }
}
