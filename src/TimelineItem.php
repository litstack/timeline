<?php

namespace Litstack\Timeline;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class TimelineItem extends Model
{
    /**
     * Database table name.
     *
     * @var string
     */
    public $table = 'lit_timeline';

    /**
     * Casts.
     *
     * @var array
     */
    protected $casts = [
        'payload' => 'json',
    ];

    protected $fillable = [
        'payload', 'type',
    ];

    protected $attributes = [
        'payload' => [],
    ];

    protected $appends = [
        'date',
        'time',
    ];

    public function getDateAttribute()
    {
        return $this->created_at->isoFormat('MM. MMM');
    }

    public function getTimeAttribute()
    {
        return $this->created_at->isoFormat('HH:mm');
    }

    /**
     * The associated model relationship.
     *
     * @return MorphTo
     */
    public function model(): MorphTo
    {
        return $this->morphTo('model');
    }

    public function getItem()
    {
        $type = $this->type;

        return new $type($this->model, $this);
    }

    /**
     * Set show time.
     *
     * @param  bool  $show
     * @return $this
     */
    public function showTime(bool $show)
    {
        $this->payload['show_time'] = $show;

        return $this;
    }

    public function title(string $title)
    {
        $this->payload['title'] = $title;

        return $this;
    }

    public function addProp($name, $value)
    {
        if (is_null($this->payload)) {
            $this->payload = [];
        }
        $payload = $this->payload;
        $payload[$name] = $value;
        $this->payload = $payload;

        return $this;
    }
}
