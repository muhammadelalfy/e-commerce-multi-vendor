<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'street_address',
        'city',
        'postal_code',
        'country',
        'state',
        'type',
    ];

    protected $table = 'order_addresses';
}
