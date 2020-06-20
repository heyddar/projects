<?php

namespace App\Http\Controllers\Front;

use App\Comment;
use App\Dislike;
use App\Group;
use App\Like;
use App\Post;
use App\User;
use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;

class PostController extends Controller
{

    public function index()
    {
        $groups = Group::all();
        $posts  = Post::orderBy('created_at','desc')
            ->where('status','1')
            ->paginate(3);
//        $data = [
//            'body' => [
//                'title' => 'title'
//            ],
//            'index' => 'my_index',
//            'type' => 'text',
//            'id' => 'my_id',
//        ];
//
//        $client = ClientBuilder::create()->build();
//        $return = $client->index($data);
        return view('front.posts',compact('posts','groups'));
    }

    public function show($id)
    {
        $post = Post::where('id',$id)
            ->get()->first();
        $comments = Comment::where('post_id',$id)
            ->where('is_accepted','1')
            ->get();
        $likes = Like::where('post_id',$id)->get();
        $dislikes = Dislike::where('post_id',$id)->get();
        visits($post)->increment();
        $p = Post::where('id','1000');
        return view('front.post',compact('post','p','comments','likes','dislikes'));
    }
    public function group_index($id)
    {
        $posts  = Post::where('group_id',$id)
            ->orderBy('created_at','desc')
            ->paginate(7);
        $groups = Group::all();
        return view('front.posts',compact('posts','groups'));
    }
    public function tag_index($id)
    {
        $posts= Post::where('status','1')
            ->orderBy('created_at','desc')
            ->wherehas('tags', function ($q) use($id){
            $q->where('tag_id',$id);
        })->paginate(7);
        $groups= Group::all();
        return view('front.posts',compact('posts','groups'));
    }
    public function author_index($id)
    {
        $posts = Post::where('status','1')
            ->where('user_id',$id)
            ->orderBy('created_at','desc')
            ->paginate(3);
        $groups= Group::all();

        return view('front.posts',compact('posts','groups'));
    }
    public function like($id)
    {
        if(Auth::check()) {
            $existing_like = Like::where('post_id',$id)->where('user_id',Auth::id())->first();

            if (is_null($existing_like)){
                Like::create([
                    'post_id' => $id,
                    'user_id' => Auth::id()
                ]);
                return redirect()->back();
            }else{
                Like::where('post_id',$id)
                    ->where('user_id',Auth::user()->id)
                    ->delete();            }
            return redirect()->back();
        }else{
            Session::put('msglike', ' برای لایک این پست باید ابتدا وارد سایت شوید.');
            return redirect()->back();
        }
    }


    public function dislike($id)
    {

        if(Auth::check()) {
            $existing_like = Dislike::where('post_id',$id)->where('user_id',Auth::id())->first();

            if (is_null($existing_like)){
                Dislike::create([
                    'post_id' => $id,
                    'user_id' => Auth::id()
                ]);
                return redirect()->back();
            }else{
                Dislike::where('post_id',$id)
                    ->where('user_id',Auth::user()->id)
                    ->delete();
                return redirect()->back();

            }


        }else{
            Session::put('msglike', ' برای دیسلایک این پست باید ابتدا وارد سایت شوید.');
            return redirect()->back();
        }
    }

}
