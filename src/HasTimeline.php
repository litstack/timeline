<?php

namespace Litstack\Timeline;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasTimeline
{
    public function getTimelineItemsAttribute()
    {
        return $this->timeline()
            ->orderByDesc('id')
            ->get()
            ->map(function (TimelineItem $item) {
                $item->setRelation('model', $this);

                return $item->getItem();
            });
    }

    /**
     * Add item to timeline.
     *
     * @param  string       $type
     * @param  array        $payload
     * @return TimelineItem
     */
    public function addToTimeline(string $type, array $payload = [])
    {
        if (! class_exists($type)) {
            $payload['message'] = $type;
            $item = MessageItem::class;
        }

        return $this->timeline()->make([
            'type'    => $type,
            'payload' => $payload,
        ]);
    }

    /**
     * The associated timeline entries.
     *
     * @return MorphMany
     */
    public function timeline(): MorphMany
    {
        return $this->morphMany(TimelineItem::class, 'model');
    }
}
