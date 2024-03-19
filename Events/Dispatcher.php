<?php

namespace Lira\Framework\Events;

class Dispatcher
{
    protected array $listeners = [];

    public function dispatch(Event $event): void
    {
        if (array_key_exists($event->name, $this->listeners)) {
            foreach ($this->listeners[$event->name] as $listener) {
                call_user_func($listener, $event);
            }
        }
    }

    public function listen(
        string $eventName,
        callable $listener
    ): void
    {
        $this->listeners[$eventName][] = $listener;
    }
}