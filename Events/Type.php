<?php

namespace Lira\Framework\Events;

enum Type
{
    case NOTIFY;
    case ERROR;
    case SECURITY;
}