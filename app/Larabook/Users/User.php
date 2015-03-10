<?php

namespace Larabook\Users;

use Eloquent;

use Illuminate\Auth\UserTrait;

use Illuminate\Auth\UserInterface;

use Illuminate\Auth\Reminders\RemindableTrait;

use Illuminate\Auth\Reminders\RemindableInterface;

use Larabook\Registration\Events\UserHasRegistered;

use Laracasts\Commander\Events\EventGenerator;

use Hash, \Carbon\Carbon;

use Laracasts\Presenter\PresentableTrait;

use Codesleeve\Stapler\ORM\StaplerableInterface;

use Codesleeve\Stapler\ORM\EloquentTrait;

class User extends Eloquent implements UserInterface, RemindableInterface, StaplerableInterface
{
    
    use UserTrait, RemindableTrait, EventGenerator, PresentableTrait, FollowableTrait, GroupableTrait, RoleTrait, EloquentTrait;
    
    /**
     * Which fields may be mass assigned?
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password', 'title', 'first_name', 'last_name', 'gender', 'dob', 'country_id', 'state_id', 'city_id', 'school_department', 'is_commercial', 'language_id', 'activated', 'activation_code', 'profile_picture'];
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    
    /**
     * Path to the presenter for a user.
     *
     * @var string
     */
    protected $presenter = 'Larabook\Users\UserPresenter';
    
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    /**
     * The attributes dates
     * @var array
     */
    protected $dates = ['dob'];

    /**
     * User profile photo update AWS S3 bucket
     * @param array $attributes
     */
    public function __construct(array $attributes = array()) {
        // TODO:: add the Queue ?
        $this->hasAttachedFile('profile_picture', [
            'styles' => [
                'x-large' => '256x256',
                'large'   => '128x128',
                'medium'  => '64x64',
                'small'   => '32x32',
                'x-small' => '16x16',
                'thumb'   => '100x100'
            ],
            'storage' => 's3',
        ]);

        parent::__construct($attributes);
    }
    
    /**
     * Passwords must always be hashed.
     *
     * @param $password
     */
    public function setPasswordAttribute($password) {
        if (!empty($password) AND !is_null($password)) {
            $this->attributes['password'] = Hash::make($password);
        }        
    }
    
    /**
     * A user has many statuses.
     *
     * @return mixed
     */
    public function statuses() {
        return $this->hasMany('Larabook\Statuses\Status')->latest();
    }

    public function privacy()
    {
        return $this->hasOne('Larabook\Privacies\Privacy', 'user_id', 'id');
    }
    
    /**
     * Register a new user
     *
     * @param $username
     * @param $email
     * @param $password
     * @return User
     */
    public static function register($username, $email, $password, $activated, $activation_code) {
        $user = new static (compact('username', 'email', 'password', 'activated', 'activation_code'));

        $user->raise(new UserHasRegistered($user));
        
        return $user;
    }
    
    /**
     * Determine if the given user is the same
     * as the current one.
     *
     * @param  $user
     * @return bool
     */
    public function is($user) {
        if (is_null($user)) return false;
        
        return $this->username == $user->username;
    }

    /**
     * @return mixed 
     */
    public function comments()
    {
        return $this->hasMany('Larabook\Statuses\Comment');
    }

    /**
     * Date Of Birth must always be date format.
     *
     * @param $dob
     */
    public function setDobAttribute($dob) {
        // TODO:: carbon format set to senttings
        $this->attributes['dob'] = Carbon::createFromFormat('d/m/Y', $dob);
    }

    /**
     * A user belongs to many group
     * @return mixed 
     */
    public function groups()
    {
        return $this->belongsToMany('Larabook\Groups\Group', 'groups_users')->withPivot('is_owner');
    }

    public function setGroupsAttribute($groups)
    {
        $this->groups()->sync((array) $groups);
    }
}
