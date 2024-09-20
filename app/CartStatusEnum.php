<?php

namespace App;

enum CartStatusEnum: string
{
    case Pending = 'pending';
    case Completed = 'completed';
}
