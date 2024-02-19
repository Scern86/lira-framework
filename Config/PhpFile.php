<?php

namespace Lira\Framework\Config;

use Lira\Framework\Events\{Event, Level, Type};

class PhpFile extends Source
{
    public function __construct(protected string $file)
    {
        try {
            if (!file_exists($file)) throw new \Exception("File {$file} not exists");
            $values = include $file;
            if (!is_array($values)) throw new \Exception("File {$file} is invalid");
        } catch (\Throwable $e) {
            $event = new Event(Type::ERROR, Level::CRITICAL, 'invalid_file', [$e]);
            $this?->eventDispatcher->dispatch($event);
            $values = [];
        }
        parent::__construct($values);
    }
}