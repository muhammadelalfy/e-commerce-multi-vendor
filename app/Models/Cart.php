<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $incrementing = false;

    public static function booted()
    {
        static::observe(\App\Observers\CartObserver::class);
        static::addGlobalScope('cookie_id', function ($builder) {
            $builder->where('cookie_id', Cart::getCookieId());
        });
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public static function getCookieId()
    {
        $cookieId = Cookie::get('cart_id');

        if (!$cookieId) {
            $cookieId = Str::uuid();
            Cookie::queue('cart_id', $cookieId, 60 * 24 * 30);
        }
        return $cookieId;

    }
}
