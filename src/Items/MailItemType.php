<?php

namespace Litstack\Timeline\EntryTypes;

use Ignite\Vue\Component;
use Litstack\Timeline\ResendMail;

class MailItemType extends BaseEntryType
{
    protected $component = 'lit-timeline-item-mail';

    public static function make($message)
    {
        return self::newModel()
            ->addProp('message', $message);
    }

    public function mount(Component $component)
    {
        $component->prop('resend_button',
            component('b-button')
                ->prop('variant', 'primary')
                ->child('Resend Mail')
                ->prop('size', 'sm')
                ->on('click', ResendMail::class)
        );
    }
}
