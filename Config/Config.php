<?php

namespace Lira\Framework\Config;

use Lira\Framework\Traits\Getter;

class Config
{
    protected array $values = [];

    use Getter;

    public function set(string $key, Source $source): void
    {
        if (!array_key_exists($key, $this->values)) $this->values[$key] = $source;
    }
}