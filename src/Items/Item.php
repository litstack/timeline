<?php

namespace Litstack\Timeline\Items;

use Ignite\Support\HasAttributes;
use Ignite\Support\VueProp;
use Ignite\Vue\Traits\HasVueComponents;
use Illuminate\Database\Eloquent\Model;
use Litstack\Timeline\Contracts\Timelineable;
use Litstack\Timeline\TimelineEntry;
use Litstack\Timeline\TimelineItem;

abstract class Item extends VueProp
{
    use HasVueComponents, HasAttributes;

    /**
     * The timeline item.
     *
     * @var TimelineItem
     */
    protected $item;

    /**
     * Model instance.
     *
     * @var Model|Timelineable
     */
    protected $model;

    /**
     * Get the message to be shown.
     *
     * @return string
     */
    abstract public function getMessage();

    /**
     * Create new MessageType instance.
     *
     * @param  TimelineEntry $entry
     * @return void
     */
    public function __construct(Timelineable $model, TimelineItem $item)
    {
        $this->model = $model;
        $this->item = $item;

        $this->mount();
    }

    /**
     * Mount the item.
     *
     * @return void
     */
    public function mount()
    {
        //
    }

    /**
     * Get item variant.
     *
     * @return string
     */
    public function variant($variant)
    {
        // success / danger

        $this->setAttribute('variant', $variant);
    }

    /**
     * Get item title.
     *
     * @return string
     */
    public function title($title)
    {
        $this->setAttribute('title', $title);
    }

    /**
     * Should time be shown.
     *
     * @param  bool  $show
     * @return $this
     */
    public function showTime(bool $show = true)
    {
        $this->setAttribute('show_time', $show);

        return $this;
    }

    /**
     * Render item.
     *
     * @return array
     */
    public function render(): array
    {
        return array_merge(
            $this->item->payload,
            $this->attributes,
            [
                'message' => $this->getMessage(),
                'date'    => $this->item->date,
                'time'    => $this->item->time,
            ]
        );
    }
}
