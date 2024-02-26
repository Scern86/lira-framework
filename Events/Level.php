<?php

namespace Lira\Framework\Events;

enum Level: int
{
    case DEBUG = 10;
    case INFO = 20;
    case WARNING = 30;
    case CRITICAL = 40;
}