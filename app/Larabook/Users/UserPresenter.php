<?php

namespace Larabook\Users;

use Laracasts\Presenter\Presenter;

use Theme;

class UserPresenter extends Presenter
{
    
    /**
     * Present a link to the user's gravatar
     *
     * @param int $size
     * @return string
     */
    public function gravatar($size = 30) {
        $email = md5($this->email);
        
        return "//www.gravatar.com/avatar/{$email}?s={$size}";
    }
    
    /**
     * @return string
     */
    public function followerCount() {
        $count = $this->entity->followers()->count() + $this->entity->followedUsers()->count();
        $plural = str_plural('Mate', $count);
        
        return "{$count} {$plural}";
    }
    
    /**
     * @return string
     */
    public function statusCount() {
        $count = $this->entity->statuses()->count();
        $plural = str_plural('Post', $count);
        
        return "{$count} {$plural}";
    }

    /**
     * @return string 
     */
    public function birthday()
    {
        return is_null($this->dob) ? null : $this->dob->format('d/m/Y');
    }

    public function profilePicture($size)
    {
        return $this->profile_picture_file_name ? $this->profile_picture->url($size) : Theme::asset('img/user-' . $size . '.png');
    }
}
