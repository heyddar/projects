<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'title', 'status'
    ];
    public function brand_status()
    {
        return $this->status? "انتشار" : "پیش نویس";
    }
}
