<?php

namespace App\Listeners;

use App\Facades\Cart;


class EmptyCart
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(): void
    {
        Cart::empty();
    }
}
