<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Guest'
        ]);
    }

    protected static function booted()
    {
        static::creating(function ($order) {
            $order->number = Order::getNextOrderNumber();
            $order->total = $order->products->sum(function ($product) {
                return $product->order_item->price;
            });        });
    }
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public static function getNextOrderNumber()
    {
        $year = now()->year;
        $lastOrder = Order::whereYear('created_at', $year)->latest()->first();
        if (!$lastOrder) {
            return $year . '0001';
        }
        return $lastOrder->number + 1;

    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items')
            ->using(OrderItem::class) //to return OrderItem model not pivot class
            ->as('order_item') // rename pivot to order_item and use order_item to access pivot data
            ->withPivot('quantity', 'price' , 'product_name'); //if you want to access pivot data without it will return foreign keys only
    }

    public function addresses()
    {
        return $this->hasMany(OrderAddress::class);
    }
    public function billingAddress()
    {
        return $this->addresses()->where('type', 'billing')->first();

    }
    public function shippingAddress()
    {
        return $this->addresses()->where('type', 'shipping')->first();
    }
}
