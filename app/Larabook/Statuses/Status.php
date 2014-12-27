<?php 

namespace Larabook\Statuses;

use Larabook\Statuses\Events\StatusWasPublished;

use Laracasts\Commander\Events\EventGenerator;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Status extends Eloquent
{

    use EventGenerator;

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
     * A status belongs to a user
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('Larabook\Statuses\Status');
    }

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