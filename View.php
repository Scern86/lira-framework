<?php

namespace Lira\Framework;

use Lira\Framework\Traits\{Getter, Setter};

class View
{
    use Getter, Setter;

    public function __construct(protected ?string $template = null, protected array $values = [], bool $appendOnly = false)
    {
        $this->appendOnly = $appendOnly;
    }

    public function setTemplate(string $template): void
    {
        if (!file_exists($template)) throw new \Exception('File not exists');
        $this->template = $template;
    }

    public function render(): string
    {
        $result = '';
        if (is_null($this->template)) throw new \Exception('Template is undefined');
        ob_start();
        include $this->template;
        $result = ob_get_clean();
        return $result;
    }
}