<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = [
        'title'
    ];
//    protected $guarded = ['id'];

    public function products(){
        return $this->belongsToMany(Product::class);

    }
}
