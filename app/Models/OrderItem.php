<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderItem extends Pivot
{
    use HasFactory;
    protected $table = 'order_items';
    public $incrementing = true;

    public function product()
    {
        return $this->belongsTo(Product::class)->withDefault([
            'name' => 'Product not found'
        ]);
    }
}
