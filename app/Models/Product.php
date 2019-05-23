<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductSku;
use Illuminate\Support\Str;

class Product extends Model
{
    //

     protected $fillable = [
                    'title', 'description', 'image', 'on_sale', 
                    'rating', 'sold_count', 'review_count', 'price'
    ];
    protected $casts = [
        'on_sale' => 'boolean', // on_sale 是一个布尔类型的字段
    ];

    // 与商品SKU关联
    public function skus()
    {
        return $this->hasMany(ProductSku::class);
    }

    public function getImageUrlAttribute(){
        //zheshi zaignama wozheghiizaiqiangdaima 
        if(Str::startswith($this->attributes['image'],['http://','https://'])){

            return $this->attributes['image'];

        }else{
            
            return \Storage::disk('public')->url($this->attributes['image']);
        }

    }
}
