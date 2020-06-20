<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Group;
use App\Http\Controllers\_Controller\TagHandler;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Tag;
use App\Http\Traits\Taggable;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:panel']);
    }
    public function index()
    {
        if (Auth::user()->hasRole('writer')){
            $posts = Post::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')
                ->paginate(10);
        }else {
            $posts = Post::OrderBy('created_at', 'desc')
                ->paginate(10);
        }
        return view('admin.posts.index',compact('posts'));
    }


    public function create()
    {
        $tags = \Spatie\Tags\Tag::all();
        $groups = Group::all();
        return view('admin.posts.create',compact('tags','groups'));
    }
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->summary = $request->summary;
        $post->content = $request->content1;
        $post->has_comment = $request->has_comment;
        $post->group_id = $request->group_id;
        $post->user_id = Auth::user()->id;
        $post->status  = $request->status;
        $image = $request->file('image');
        if($image){
            $image_name = date('mdYHis');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.".".$ext;
            $upload_url = 'images/posts/';
            $image_url = $upload_url.$image_full_name;
            $isUploaded = $image->move($upload_url,$image_full_name);
            if($isUploaded) {
                $post->image = $image_url;
            }else {
                $post->image = null;
            }
        }
        $post->save();
        $post->attachTags($request->input('tags'));
        Session::put('msg', ' پست جدید با موفقیت ثبت شد.');
        return redirect()->back();
    }
    public function show($id)
    {
        $post = Post::findorfail($id);
        return view('admin.posts.show',compact('post'));
    }

    public function edit($id)
    {
        if (Auth::user()->hasRole('writer')) {
            $groups = Group::all();
            $tags = \Spatie\Tags\Tag::select('id', 'name')->get();
            $post = Post::
                where('id',$id)
                ->where('user_id',Auth::user()->id)
                ->get()->first();
        }else
        {
            $groups = Group::all();
            $tags = \Spatie\Tags\Tag::select('id', 'name')->get();
            $post = Post::
            findOrFail($id);
        }
        return view('admin.posts.edit', compact('post','groups','tags'));

    }

    public function update(PostRequest $request, $id)
    {
            if($request->file('image')) {
                $image = $request->file('image');
                if ($image) {
                    $image_name = date('mdYHis');
                    $ext = strtolower($image->getClientOriginalExtension());
                    $image_full_name = $image_name . "." . $ext;
                    $upload_url = 'images/brands/';
                    $image_url = $upload_url . $image_full_name;
                    $isUploaded = $image->move($upload_url, $image_full_name);
                    $data['image'] = $image_url;

                }

                $post = Post::findorfail($id);
                $post->update([
                    'title' => $request->title,
                    'summary' => $request->summary,
                    'content' => $request->content1,
                    'group_id' => $request->group_id,
                    'user_id' => Auth::user()->id,
                    'status' => $request->status,
                    'has_comment' => $request->has_comment,
                    'image' => $data['image'],

                ]);
            }else
            {
                $post = Post::findorfail($id);
                $post->update([
                    'title' => $request->title,
                    'summary' => $request->summary,
                    'content' => $request->content1,
                    'group_id' => $request->group_id,
                    'user_id' => Auth::user()->id,
                    'status' => $request->status,
                    'has_comment' => $request->has_comment,

                ]);
            }
        $post->syncTags($request->input('tags'));
        \Session::put('msg', ' پست مورد نظر با موفقیت ویرایش شد.');
        return redirect(route('admin.post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Post::where('id',$id)
            ->delete();
        \Session::put('msg', ' پست مورد نظر با موفقیت حذف شد.');

        return redirect()->back();
    }
}
