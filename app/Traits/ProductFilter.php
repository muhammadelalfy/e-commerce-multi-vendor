<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

trait ProductFilter
{
    /**
     * Apply filters to a query based on the provided options.
     *
     * @param  array  $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function applyFilters(array $filters = []): Builder
    {
        $options = array_merge([
            'status' => null,
            'category_id' => null,
            'store_id' => null,
            'tag_id' => null,
        ], $filters);

        $query = self::query(); // Initialize the query builder for the model using this trait

        // Filter by status if provided
        $query->when($options['status'], function ($query, $status) {
            $query->where('status', $status);
        });

        // Filter by category if provided
        $query->when($options['category_id'], function ($query, $categoryId) {
            $query->where('category_id', $categoryId);
        });

        // Filter by store if provided
        $query->when($options['store_id'], function ($query, $storeId) {
            $query->where('store_id', $storeId);
        });

        // Filter by tag if provided
        $query->when($options['tag_id'], function ($query, $tagId) {
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
        });

        return $query;
    }
}
