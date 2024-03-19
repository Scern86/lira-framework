<?php

namespace Lira\Framework\Config;

class PhpFile extends Source
{
    public function __construct(protected string $file)
    {
        $values = [];
        try{
            if (!file_exists($file)) throw new \Exception("Php File {$file} not exists");
            $values = include $file;
            if (!is_array($values)) throw new \Exception("Php File {$file} is invalid");
        }catch (\Throwable $e){
            trigger_error($e->getMessage());
        }
        parent::__construct($values);
    }
}