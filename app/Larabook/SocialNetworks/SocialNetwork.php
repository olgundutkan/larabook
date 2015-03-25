<?php

namespace Larabook\SocialNetworks;

class SocialNetwork extends \Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'social_networks';

	/**
	 *  Which fields may be mass assigned?
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'facebook_id', 'facebook_link'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('facebook_id');
}