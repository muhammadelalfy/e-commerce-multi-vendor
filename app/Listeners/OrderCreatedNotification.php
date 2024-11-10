<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\SendOrderCreatedNotification;


class OrderCreatedNotification
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
    public function handle(object $event): void
    {
        $order = $event->order;
        $user = User::where('store_id', $order->store_id)->first();
        $user->notify(new SendOrderCreatedNotification($order));
    }
}
