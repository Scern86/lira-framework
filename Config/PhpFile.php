<?php

namespace Lira\Framework\Config;

use Lira\Framework\Events\{Event,EventType};

class PhpFile extends Source
{
    public function __construct(protected string $file)
    {
        try {
            if (!file_exists($file)) throw new \Exception("File {$file} not exists");
            $values = include $file;
            if(!is_array($values)) throw new \Exception("File {$file} is invalid");
        } catch (\Throwable $e) {
            $event = new Event(EventType::ERROR,'invalid_file',[$e]);
            $this?->eventDispatcher->dispatch($event);
            $values = [];
        }
        parent::__construct($values);
    }
}