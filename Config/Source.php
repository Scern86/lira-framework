<?php

namespace Lira\Framework\Config;

class Source
{
    public function __construct(protected readonly array $values)
    {
    }
}