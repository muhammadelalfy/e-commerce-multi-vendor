<?php

namespace App\Models;

use App\Enums\ProductStatusEnum;
use App\Models\Scopes\StoreScope;
use App\Traits\ProductFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, ProductFilter;

    const Active = ProductStatusEnum::Active;
    const Inactive = ProductStatusEnum::Inactive;
    protected $fillable = ['name', 'description', 'slug', 'store_id', 'category_id', 'price', 'compare_price', 'status'];
    protected $appends = ['image_url', 'sale_percent'];
    protected $hidden = ['created_at', 'updated_at', 'store_id', 'category_id', 'image'];


    protected static function booted()
    {
        static::addGlobalScope('store', new StoreScope());
        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });
    }


    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function Store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }


    public function tags()
    {
        return $this->belongsToMany(
            Tag::class, //related class
            'product_tag', //pivot table
            'product_id', //fk of current model
            'tag_id', // fk of related model
            'id', // pk of current model
            'id' // pk of related model
        );
    }

    public function ScopeActive(Builder $builder)
    {
        $builder->where('status', 'active');
    }

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return 'https://cdn-icons-png.flaticon.com/512/158/158764.png';

        } elseif (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }
        return asset('storage' . $this->image);
    }

    public function getSalePercentAttribute()
    {
        if (!$this->compare_price) {
            return 0;
        }
        return number_format(100 - (100 * $this->price / $this->compare_price), 1);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items')
            ->using(OrderItem::class)
            ->withPivot('quantity', 'price', 'product_name');

    }

    public function scopeFilter(Builder $builder, $filters)
    {
        $options = array_merge([
            'status' => null,
            'category_id' => null,
            'store_id' => null,
            'tag_id' => null,
        ], $filters);

        $builder->when($options['tag_id'], function ($query, $tagId) {
            // If 'tag_id' is present in $options, this function will be executed.
            // The `$query` is the main query builder, and `$tagId` is the value of 'tag_id'.

            $query->whereExists(function ($subQuery) use ($tagId) {
                // `whereExists` will add a condition to check if the subquery finds any matching row.
                // If the subquery returns any result, the main query will include the `products` row.

                $subQuery->select(DB::raw(1)) // Selecting a constant value (1) because we just need to check for existence
                ->from('product_tag') // Specify the `product_tag` table for the subquery
                ->whereColumn('products.id', 'product_tag.product_id')
                    // Ensures that the `product_id` in `product_tag` matches the `id` in `products`.

                    ->where('product_tag.tag_id', $tagId);
                // Adds a condition to check if the `tag_id` in `product_tag` matches the provided `$tagId`.
            });
        })->when($options['status'], function ($query, $status) {
            $query->where('status', $status);
        })->when($options['category_id'], function ($query, $categoryId) {
            $query->where('category_id', $categoryId);
        })->when($options['store_id'], function ($query, $storeId) {
            $query->where('store_id', $storeId);
        });


    }

}
