<?php

namespace Lira\Framework\Events;

readonly class Event
{
    public function __construct(public Type $type, public Level $level, public string $name, public array $data = [])
    {
    }
}