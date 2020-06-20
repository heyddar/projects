<?php

namespace App\Http\Controllers\Front;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class CommentController extends Controller
{

    public function store(Request $request )
    {
//        'g-recaptcha-response' => 'recaptcha',

        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->title = $request->title;
        $comment->content = $request->content1;
        $comment->post_id = $request->post_id;
        $comment->save();
        Session::put('msg', ' کامنت شما با موفقیت ثبت شد و پس از تایید مدیر سایت نمایش داده خواهد شد.');
        return redirect()->back();
    }
}
