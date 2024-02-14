<?php

namespace Lira\Framework\Config;

use Lira\Framework\Traits\Getter;

class Source
{
    use Getter;

    public function __construct(protected readonly array $values)
    {
    }
}