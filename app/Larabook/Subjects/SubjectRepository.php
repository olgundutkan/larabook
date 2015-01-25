<?php

namespace Larabook\Subjects;

class SubjectRepository
{
    
    /**
     * Persist a subject
     *
     * @param Subject $subject
     * @return mixed
     */
    public function save(Subject $subject) {
        $subject->save();
    }

    /**
     * Get a paginated list of all subjects.
     *
     * @param int $howMany
     * @return mixed
     */
    public function getPaginated($howMany = 25) {
        return Subject::latest()->paginate($howMany);
    }
    
    /**
     * Find a subject by their id.
     *
     * @param $id
     * @return mixed
     */
    public function findById($id) {
        return Subject::findOrFail($id);
    }
    
    /**
     * Follow a Larabook subject.
     *
     * @param $subjectIdToFollow
     * @param Subject $subject
     * @return mixed
     */
    public function follow($subjectIdToFollow, Subject $subject) {
        return $subject->followedSubjects()->attach($subjectIdToFollow);
    }
    
    /**
     * Unfollow a Larabook subject.
     *
     * @param $subjectIdToUnfollow
     * @param Subject $subject
     * @return mixed
     */
    public function unfollow($subjectIdToUnfollow, Subject $subject) {
        return $subject->followedSubjects()->detach($subjectIdToUnfollow);
    }
}
