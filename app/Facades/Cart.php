<?php

namespace App\Facades;

use App\Repositories\CartRepository;
use Facade;

class Cart extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CartRepository::class;
    }

}
