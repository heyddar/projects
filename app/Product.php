<?php

namespace App;

use BeyondCode\Vouchers\Traits\HasVouchers;
use Ghanem\Rating\Traits\Ratingable as Rating;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'short_description','long_description','image','price','status'
    ];
    protected $guarded = ['id'];

    use Rating;

    public function status()
    {
        return $this->status? "انتشار" : "پیش نویس";
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id', 'id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id', 'id');
    }
    public function sizes(){
        return $this->belongsToMany(Size::class,'product_size','product_id','size_id');
    }
    public function colors(){
        return $this->belongsToMany(Color::class, 'color_product','product_id','color_id');
    }
}

