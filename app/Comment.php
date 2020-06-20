<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['is_accepted'];
    public $timestamps = false;

    public function is_accepted()
    {
        return $this->is_accepted? "تایید شده" : " تایید نشده";
    }
    public function post()
    {
        return $this->belongsTo(Post::class,'post_id', 'id');
    }
}
