<?php

namespace App;

use App\Http\Controllers\_Controller\TagHandler;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\Tag;

class Post extends Model
{
    use \Spatie\Tags\HasTags;

    protected $fillable=['title','summary','content','image','category_id','status','has_comment','user_id'];

    public $timestamps = false;

    public function vzt()
    {
        return visits($this);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
    public function status()
    {
        return $this->status? "انتشار" : "پیش نویس";
    }
    public function group(){
        return $this->belongsTo(Group::class,'group_id', 'id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id', 'id');
    }
    public function likes()
    {
        return $this->belongsToMany('App\User', 'likes');
    }
    public function dislikes()
    {
        return $this->belongsToMany('App\User', 'dislikes');
    }

}
