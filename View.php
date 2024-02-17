<?php

namespace Lira\Framework;

use Lira\Framework\Traits\{Getter, Setter};
use Lira\Framework\Exceptions\FileNotFoundException;

class View
{
    use Getter, Setter;

    public function __construct(protected ?string $template = null, protected array $values = [], bool $appendOnly = false)
    {
        $this->appendOnly = $appendOnly;
    }

    public function setTemplate(string $template): void
    {
        try{
            if (!file_exists($template)) throw new \Exception('File not exists');
            $this->template = $template;
        }catch (\Throwable $e){
            // TODO create event
        }
    }

    public function render(): string
    {
        try{
            if (is_null($this->template)) throw new \Exception('Template is undefined');
            ob_start();
            include $this->template;
            $result = ob_get_clean();
            return $result;
        }catch (\Throwable $e){
            // TODO create event
        }
    }
}