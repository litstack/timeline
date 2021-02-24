<?php

namespace Litstack\Timeline;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Litstack\Timeline\Items\Item;

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

    /**
     * Fillable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'payload', 'type', 'model_type', 'model_id',
    ];

    /**
     * Default attributes.
     *
     * @var array
     */
    protected $attributes = [
        'payload' => [],
    ];

    /**
     * Attribute to be appended.
     *
     * @var array
     */
    protected $appends = [
        'date', 'time',
    ];

    /**
     * "date" attribute getter.
     *
     * @return string
     */
    public function getDateAttribute()
    {
        return $this->created_at->isoFormat('MM. MMM');
    }

    /**
     * "item" attribute getter.
     *
     * @return string
     */
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

    /**
     * Get item instance.
     *
     * @return Item|mixed
     */
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

    /**
     * Set title.
     *
     * @param  string $title
     * @return $this
     */
    public function title(string $title)
    {
        $this->payload['title'] = $title;

        return $this;
    }
}
