<?php

namespace Lira\Framework;

use Lira\Framework\Traits\{Getter, Setter};
use Lira\Framework\Events\{Event, EventType, EventsSupport};

class View
{
    use Getter, Setter, EventsSupport;

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
            $event = new Event(EventType::ERROR,'invalid_template',[$e]);
            $this?->eventDispatcher->dispatch($event);
        }
    }

    public function render(): string
    {
        $result = '';
        try{
            if (is_null($this->template)) throw new \Exception('Template is undefined');
            ob_start();
            include $this->template;
            $result = ob_get_clean();
        }catch (\Throwable $e){
            $event = new Event(EventType::ERROR,'invalid_template',[$e]);
            $this?->eventDispatcher->dispatch($event);
        }
        return $result;
    }
}