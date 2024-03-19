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
        try{
            if (empty($this->template)) throw new \Exception('Render View. Template is undefined');
            if (!file_exists($this->template)) throw new \Exception('Render View. File not exists');
            ob_start();
            include $this->template;
            return ob_get_clean();
        }catch (\Throwable $e){
            trigger_error($e->getMessage(),E_USER_WARNING);
        }
        return '';
    }
}