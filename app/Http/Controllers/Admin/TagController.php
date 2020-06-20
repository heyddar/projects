<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:taging']);
    }
    public function index()
    {
        $tags = \Spatie\Tags\Tag::OrderBy('created_at','desc')->paginate(5);
        return view('admin.tags.index',compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');

    }
    public function store(Request $request)
    {
//        $this->validate($request, $this->validator());
        $tag = new \Spatie\Tags\Tag();
        $tag->name = $request->name;
        $tag->save();
        Session::put('msg', 'کلمه کلیدی جدید با موفقیت ثبت شد.');
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $tag = \Spatie\Tags\Tag::
        where('id',$id)
            ->get()->first();
        return view('admin.tags.edit', compact('tag'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:200',
        ]);
        if ($request->title) {
            $data ['title']= $request->title;
        }

        \Spatie\Tags\Tag::where('id',$id)
            ->update($data);
        Session::put('msg', ' کلمه کلیدی مورد نظر با موفقیت ویرایش شد.');
        return redirect(route('admin.tag.index'));
    }
    public function delete(Request $request,$id)
    {

        \Spatie\Tags\Tag::where('id',$id)
            ->delete();
        Session::put('msg', ' کلمه کلیدی مورد نظر با موفقیت حذف شد.');

        return redirect()->back();
    }
}
