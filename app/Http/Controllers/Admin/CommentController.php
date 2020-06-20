<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:commenting']);
    }
    public function index()
    {
        $comments = Comment::paginate(10);
        return view('admin.comments.index',compact('comments'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
       $comment = Comment::findorfail($id);
       return view('admin.comments.show',compact('comment'));
    }


    public function edit($id)
    {
       $comment = Comment::findorfail($id);
       if($comment->is_accepted=='1')
       {
           $comment -> update([
               'is_accepted'=> '0'
           ]);
       }else
           {
               $comment -> update([
                   'is_accepted'=> '1'
               ]);
       }
       return redirect()->back();
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function delete($id)
    {
        Comment::where('id',$id)
            ->delete();
        \Session::put('msg', ' کامنت مورد نظر با موفقیت حذف شد.');

        return redirect()->back();
    }
}
