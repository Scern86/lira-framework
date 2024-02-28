<?php

namespace Lira\Framework\Config;

class PhpFile extends Source
{
    public function __construct(protected string $file)
    {
        if (!file_exists($file)) throw new \Exception("File {$file} not exists");
        $values = include $file;
        if (!is_array($values)) throw new \Exception("File {$file} is invalid");
        parent::__construct($values);
    }
}