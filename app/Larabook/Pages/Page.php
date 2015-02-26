<?php

namespace Larabook\Pages;

class Page extends \Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pages';

	/**
	 *  Which fields may be mass assigned?
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'slug', 'content', 'is_home', 'status'];

	/**
     * Create a new page
     *
     * @param $title
     * @param $slug
     * @param $content
     * @param $is_home
     * @param $status
     * @return Page
     */
    public static function register($title, $slug, $content, $is_home, $status) {
        $page = new static (compact('title', 'slug', 'content', 'is_home', 'status'));

        $page->save();
        
        return $page;
    }

}