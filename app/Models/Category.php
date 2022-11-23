<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function rules(){
        return [
            'name' => 'string|min:3|max|4',
            'status' => ['in:active,inactive',function($attribute , $value , $fails ){  //casom rule
                        if(Str::lower($value) == 'laravel'){
                            
                            $fails('the status is not coerrect');
                        }
            }],
            'image' => ['mimes:png,jpg'],


        ];
    }
}
