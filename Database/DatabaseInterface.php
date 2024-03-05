<?php

namespace Lira\Framework\Database;

interface DatabaseInterface
{
    public function init(): void;

    public function connect();
}