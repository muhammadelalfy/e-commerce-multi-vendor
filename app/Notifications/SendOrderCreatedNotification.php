<?php

namespace App\Notifications;

use App\Events\OrderCreated;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendOrderCreatedNotification extends Notification
{
    use Queueable;

    public $order;

    /**
     * Create a new notification instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting('Hello!')
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     * the data column in notifications table
     * @return array<string, mixed>
     */
    public function toDatabase()
    {
        return [
            'body' => 'Your order has been created successfully.',
            'icon' => 'fas fa-envelope mr-2',
            'url' => '/orders',
            'order_id' => $this->order->id,
        ];

    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'body' => 'Your order has been created successfully.',
            'icon' => 'fas fa-envelope mr-2',
            'url' => '/orders',
            'order_id' => $this->order->id,
        ]);
    }

}
