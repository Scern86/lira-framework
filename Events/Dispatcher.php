<?php

namespace Lira\Framework\Events;

class Dispatcher
{
    protected array $listenersByName = [];
    protected array $listenersByType = [];

    public function dispatch(Event $event): void
    {
        $eventName = $event->name;
        if (!empty($this->listenersByName[$eventName])) {
            foreach ($this->listenersByName[$eventName] as $listener) {
                call_user_func($listener, $event);
            }
        }
        unset($listener);
        $eventType = $event->type->name;
        if (!empty($this->listenersByType[$eventType])) {
            foreach ($this->listenersByType[$eventType] as $listener) {
                call_user_func($listener, $event);
            }
        }
        unset($listener);
    }

    public function listenByName(string $eventName, callable $listener)
    {
        $this->listenersByName[$eventName][] = $listener;
    }

    public function listenByType(Type $type, callable $listener)
    {
        $this->listenersByType[$type->name][] = $listener;
    }
}