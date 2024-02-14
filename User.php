<?php

namespace Lira\Framework;

abstract class User
{
    public function __construct(protected bool $isLoggedIn = false)
    {
    }

    public function isLoggedIn(): bool
    {
        return $this->isLoggedIn;
    }

    public abstract function login(): bool;

    public abstract function logout(): void;

    public abstract function isMethodAllowed(string $method): bool;
}