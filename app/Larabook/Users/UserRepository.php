<?php

namespace Larabook\Users;

class UserRepository
{
    
    /**
     * Persist a user
     *
     * @param User $user
     * @return mixed
     */
    public function save(User $user) {
        $user->save();
    }
    
    /**
     * Get a paginated list of all users.
     *
     * @param int $howMany
     * @return mixed
     */
    public function getPaginated($howMany = 25) {
        return User::orderBy('username', 'asc')->paginate($howMany);
    }
    
    /**
     * Fetch a user by their username.
     *
     * @param $username
     * @return mixed
     */
    public function findByUsername($username) {
        return User::with('statuses')->whereUsername($username)->first();
    }
    
    /**
     * Find a user by their id.
     *
     * @param $id
     * @return mixed
     */
    public function findById($id) {
        return User::findOrFail($id);
    }

    /**
     * Find a user by activation code
     * 
     * @param  string $activation_code 
     * @return mixed                  
     */
    public function findByActivationCode($activation_code) {
        return User::whereActivationCode($activation_code)->firstOrFail();
    }
    
    /**
     * Follow a Larabook user.
     *
     * @param $userIdToFollow
     * @param User $user
     * @return mixed
     */
    public function follow($userIdToFollow, User $user) {
        return $user->followedUsers()->attach($userIdToFollow);
    }
    
    /**
     * Unfollow a Larabook user.
     *
     * @param $userIdToUnfollow
     * @param User $user
     * @return mixed
     */
    public function unfollow($userIdToUnfollow, User $user) {
        return $user->followedUsers()->detach($userIdToUnfollow);
    }

    /**
     * Add User role a larabook user
     * @param integer $roleId 
     * @param User   $user    
     */
    public function setUserRole($roleId, User $user) {
        return $user->roles = $roleId;
    }

    /**
     * Destroy a user
     *
     * @param User $user
     * @return mixed
     */
    public function delete(User $user) {
        $user->delete();
    }
}
