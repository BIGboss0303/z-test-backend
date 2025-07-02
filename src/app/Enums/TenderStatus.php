<?php

namespace App\Enums;

enum TenderStatus:string
{
    case Opened = 'Открыто';
    case Closed = 'Закрыто';
    case Cancelled = 'Отменено';
    case Null = '';
}
