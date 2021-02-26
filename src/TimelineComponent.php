<?php

namespace Litstack\Timeline;

use Ignite\Contracts\Vue\Resizable;
use Ignite\Vue\Component;
use Ignite\Vue\Traits\CanBeResized;
use Ignite\Vue\Traits\StaticComponentName;
use Litstack\Timeline\Contracts\Timelineable;

class TimelineComponent extends Component implements Resizable
{
    use StaticComponentName,
        CanBeResized;

    /**
     * Vue component name.
     *
     * @var string
     */
    protected $name = 'lit-timeline';

    /**
     * Create new TimelineComponent instance.
     *
     * @param  Timelineable $model
     * @return void
     */
    public function __construct(Timelineable $model)
    {
        $this->beforeMount();

        $this->prop('model', $model);
        $this->prop('items', $model->timeline_items);
    }

    /**
     * Set title.
     *
     * @param  string $title
     * @return $this
     */
    public function title(string $title)
    {
        return $this->prop('title', $title);
    }
}
