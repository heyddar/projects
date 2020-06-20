<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = ['first_name','last_name','tel','address1','address2','zip'];
}
