<?php

namespace Litstack\Timeline\Items;

class MessageItem extends Item
{
    /**
     * Get the message.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->item->payload['message'];
    }
}
