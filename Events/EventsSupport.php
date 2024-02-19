<?php

namespace Lira\Framework\Events;

trait EventsSupport
{
    protected ?Dispatcher $eventDispatcher = null;

    public function initEventDispatcher(Dispatcher $dispatcher): void
    {
        if (is_null($this->eventDispatcher)) {
            $this->eventDispatcher = $dispatcher;
        }
    }
}