<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Admin extends \Illuminate\Foundation\Auth\User
{
    use HasFactory , Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'phone',
        'status',
        'super_admin',
    ];
}
