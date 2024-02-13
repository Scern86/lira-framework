<?php

namespace Lira\Framework\Config;

class PhpFile extends Source
{
    public function __construct(protected string $file)
    {
        try {
            if (!file_exists($file)) throw new \Lira\Framework\Exceptions\FileNotFoundException("File {$file} not exists");
            $values = include $file;
            if(!is_array($values)) throw new \Exception("File {$file} is invalid");
        } catch (\Throwable $e) {
            // TODO log to common
            // hide error
            $values = [];
        }
        parent::__construct($values);
    }
}