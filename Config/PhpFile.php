<?php

namespace Lira\Framework\Config;

class PhpFile extends Source
{
    public function __construct(protected string $file)
    {
        try {
            if (!file_exists($file)) throw new \Exception("File {$file} not exists");
            $values = include $file;
            if(!is_array($values)) throw new \Exception("File {$file} is invalid");
        } catch (\Throwable $e) {
            // TODO create event
            $values = [];
        }
        parent::__construct($values);
    }
}