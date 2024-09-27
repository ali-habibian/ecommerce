<?php

namespace App\Http\Constants;

enum CartStatusEnum: string
{
    case Pending = 'pending';
    case Completed = 'completed';
}
