<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title', 'status'
    ];
    public function category_status()
    {
        return $this->status? "انتشار" : "پیش نویس";
    }
}
