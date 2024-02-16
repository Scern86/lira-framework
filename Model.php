<?php

namespace Lira\Framework;

class Model
{
    protected function __construct(protected \Lira\Framework\Database\DatabaseInterface $database)
    {
    }
}