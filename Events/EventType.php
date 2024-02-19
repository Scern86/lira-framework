<?php

namespace Lira\Framework\Events;

enum EventType
{
    case NOTIFY;
    case ERROR;
    case SECURITY;
}