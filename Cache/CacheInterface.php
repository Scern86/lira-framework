<?php

namespace Lira\Framework\Cache;

interface CacheInterface
{
    public function init(): void;
    public function connect();
}