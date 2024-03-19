<?php

namespace Lira\Framework\Events;

readonly class Event
{
    public function __construct(public string $name, public array $data = [])
    {
    }
}