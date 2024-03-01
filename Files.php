<?php

namespace Lira\Framework;

class Files
{
    public static function isWritableDir(string $directory): bool
    {
        return (file_exists($directory) && is_writable($directory));
    }
}