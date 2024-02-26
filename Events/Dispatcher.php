<?php

namespace Lira\Framework\Events;

class Dispatcher
{
    protected array $listeners = [];

    public function triggerEvent(Event $event): void
    {
        foreach ($this->listeners as ['name'=>$name,'listener'=>$listener,'class'=>$class,'level'=>$level]) {
            if (
                $level->value <= $event->level->value
                && in_array($class,['all',$event::class])
                && in_array($name,['all',$event->name])
            ) {
                call_user_func($listener, $event);
            }
        }
    }

    public function addEventListener(
        callable $listener,
        Level $eventLevel,
        string $eventName = 'all',
        string $eventClass='all'
    ): void
    {
        $this->listeners[] = [
            'name'=>$eventName,
            'listener'=>$listener,
            'class'=>$eventClass,
            'level'=>$eventLevel,
        ];
    }
}