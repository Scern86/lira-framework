<?php

namespace Lira\Framework;

use Lira\Framework\Traits\{Getter, Setter};

class View
{
    use Getter, Setter;

    public function __construct(
        public string $template = '',
        protected array $values = [],
        bool $appendOnly = false
    )
    {
        $this->appendOnly = $appendOnly;
    }

    public function render(): string
    {
        if (empty($this->template)) throw new \Exception('Template is undefined');
        if (!file_exists($this->template)) throw new \Exception('File not exists');
        ob_start();
        include $this->template;
        return ob_get_clean();
    }
}