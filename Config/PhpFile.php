<?php

namespace Lira\Framework\Config;

class PhpFile extends Source
{
    public function __construct(protected string $file)
    {
        if (!file_exists($file)) throw new \Lira\Framework\Exceptions\FileNotFoundException("File {$file} not exists");
        try {
            $values = include $file;
        } catch (\Throwable $e) {
            // TODO log to common
            // hide error
            $values = [];
        }
        parent::__construct($values);
    }
}