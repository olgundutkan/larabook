<?php 

namespace Larabook\Statuses;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Status extends Eloquent
{

    /**
     * Which fields may be mass assigned?
     *
     * @var array
     */
    protected $fillable = ['body'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'statuses';

	/**
     * Publish a new status.
     *
     * @param $body
     * @return static
     */
    public static function publish($body)
    {
        $status = new static(compact('body'));

        $status->raise(new StatusWasPublished($body));

        return $status;
    }

}