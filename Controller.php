<?php

namespace Lira\Framework;

use Lira\Framework\Results\Result;

abstract class Controller
{
    abstract public function execute(string $uri): Result;
}