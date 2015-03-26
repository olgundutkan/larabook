<?php

namespace Larabook\Languages;

use Larabook\Users\UserRepository;

class LanguageRepository
{
    
    /**
     * Persist a Language
     *
     * @param Language $language
     * @return mixed
     */
    public function save(Language $language) {
        $language->save();
    }

    /**
     * Find a Language by their id.
     *
     * @param $id
     * @return mixed
     */
    public function findById($id) {
        return Language::findOrFail($id);
    }

    public function firstFindBySlug($slug) {
        return Language::whereSlug($slug)->firstOrFail();
    }

    public function getList($col1, $col2)
    {
        return Language::lists($col1, $col2);
    }

    public function getAll()
    {
        return Language::all();
    }
}
