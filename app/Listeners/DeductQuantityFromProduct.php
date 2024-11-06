<?php

namespace App\Listeners;

use App\Facades\Cart;


class DeductQuantityFromProduct
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
    public function handle($event): void
    {
        foreach ($event->order->products as $product) {
            $product->decrement('quantity', $product->order_item->quantity);
        }
    }
}
