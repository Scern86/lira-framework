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

    public static function createConfig($filepath,array $data): bool
    {
        try{
            $pathinfo = pathinfo($filepath);
            $directory = $pathinfo['dirname'];
            if(\Lira\Framework\Files::isWritableDir($directory)){
                $string = var_export($data,true);

                $conf = <<<EOT
<?php

return {$string};
EOT;
                $file = $pathinfo['basename'];
                file_put_contents($directory.DIRECTORY_SEPARATOR.$file,$conf);
                return true;
            }
        }catch (\Throwable $e){
            var_dump($e);
        }
        return false;
    }
}