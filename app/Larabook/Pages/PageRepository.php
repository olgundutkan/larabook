<?php

namespace Larabook\Pages;

class PageRepository
{
    
    /**
     * Persist a page
     *
     * @param Pages $page
     * @return mixed
     */
    public function save(Page $page) {
        $location->save();
    }
    
    /**
     * Get all page.
     *
     * @return mixed
     */
    public function getAllPage() {
        return Page::all();
    }
    
    /**
     * Find a location by their id.
     *
     * @param $id
     * @return mixed
     */
    public function findById($id) {
        return Page::findOrFail($id);
    }
}
