<?php

namespace Lira\Framework;

class Router
{
    public function __construct(public string $default, protected array $routes = [])
    {
    }

    public function execute(string $url): string
    {
        if (!empty($this->routes)) {
            foreach ($this->routes as $regex => $controller) {
                if (preg_match($regex, $url)) {
                    if (is_subclass_of($controller, Controller::class)) return $controller;
                }
            }
        }
        if (!class_exists($this->default)) {
            //TODO log
            throw new \Exception('Controller not found');
        }
        if (!is_subclass_of($this->default, Controller::class)) {
            //TODO log
            throw new \Exception('Invalid Controller class');
        }
        return $this->default;
    }
}