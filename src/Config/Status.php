<?php

namespace App\Config;

enum Status: string
{
    case Online  = 'online';
    case Offline = 'offline';
}
