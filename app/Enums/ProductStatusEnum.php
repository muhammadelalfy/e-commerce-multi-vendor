<?php

namespace App\Enums;

enum ProductStatusEnum:string {
    case Pending = 'pending';
    case Active = 'active';
    case Inactive = 'inactive';
    case Rejected = 'rejected';
}
