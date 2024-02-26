<?php

namespace Lira\Framework\Events;

abstract readonly class Event
{
    public function __construct(public Level $level, public string $name, public array $data = [])
    {
    }
}