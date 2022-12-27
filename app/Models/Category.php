<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory , SoftDeletes;

    protected $guarded = [];

   public function scopeFilter(Builder $builder, $filters){

       $builder->when($filters['name'] ?? false , function ($builder , $value)  {
           $builder->where('name', 'like' , "%$value%");
       })->when($filters['status'] ?? false, function ($builder , $value){
           $builder->whereStatus($value);
       });
   }

    public static function rules(){
        return [
            'name' => 'string|min:3|max|4',
            'status' => ['in:active,inactive',function($attribute , $value , $fails ){  //casom rule

                if(Str::lower($value) == 'laravel'){
                    $fails('the status is not correct');
                }
            }],
            'image' => ['mimes:png,jpg'],

        ];
    }

}
