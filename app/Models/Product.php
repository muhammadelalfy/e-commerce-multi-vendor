<?php

namespace App\Models;

use App\Models\Scopes\StoreScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function Category(){
      return  $this->belongsTo(Category::class, 'category_id' , 'id');
    }
    public function Store(){
      return  $this->belongsTo(Store::class, 'store_id' , 'id');
    }


    protected static function booted()
    {
        static::addGlobalScope('store' , new StoreScope());
    }
}
