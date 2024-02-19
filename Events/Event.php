<?php

namespace Lira\Framework\Events;

readonly class Event{
    public function __construct(public EventType $type, public string $name, public array $data=[])
    {
    }
}