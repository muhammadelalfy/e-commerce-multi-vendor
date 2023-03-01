<?php

namespace App\Models;

use App\Models\Scopes\StoreScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    public function ScopeActive(Builder $builder)
    {
        $builder->where('status','active');
    }

    public function getImageUrlAttribute()
    {
        if (!$this->image){
            return 'https://cdn-icons-png.flaticon.com/512/158/158764.png';

        }
        elseif (Str::startsWith($this->image , ['http://' , 'https://'])){
            return $this->image;
        }
        return asset('storage' . $this->image);
    }

    public function getSalePercentAttribute()
    {
        if (!$this->conmare_price){
            return 0;
        }
        return  100 - (100 * $this->compare_price / $this->conmare_price);
    }
}
