<?php

namespace App\Models;

use App\Models\Scopes\StoreScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'description' , 'slug' , 'store_id' , 'category_id' , 'price' , 'compare_price' , 'status'];
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

    public function tags(){
        return $this->belongsToMany(
            Tag::class , //related class
            'product_tag', //pivot table
            'product_id', //fk of current model
            'tag_id', // fk of related model
            'id', // pk of current model
            'id' // pk of related model
        );
    }
}
