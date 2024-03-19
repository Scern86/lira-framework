<?php

namespace Lira\Framework\Config;

class PhpFile extends Source
{
    public function __construct(protected string $file)
    {
        $values = [];
        try{
            if (!file_exists($file)) trigger_error("Php File {$file} not exists");
            $values = include $file;
            if (!is_array($values)) trigger_error("Php File {$file} is invalid");
        }catch (\Throwable $e){
            trigger_error("Php File. Exception {$e->getMessage()}");
        }
        parent::__construct($values);
    }
}