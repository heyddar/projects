<?php

namespace App\Http\Controllers\Admin;

use App\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class SizeController extends Controller
{

    public function index()
    {
        $sizes = Size::OrderBy('created_at','desc')->paginate(5);
        return view('admin.sizes.index',compact('sizes'));
    }

    public function create()
    {
        return view('admin.sizes.create');

    }
    public function store(Request $request)
    {
        $this->validate($request, $this->validator());
        $size = new Size();
        $size->title = $request->title;
        $size->save();
        Session::put('msg', 'سایز جدید با موفقیت ثبت شد.');
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $size = Size::
        where('id',$id)
            ->get()->first();
        return view('admin.sizes.edit', compact('size'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:200',
        ]);
        if ($request->title) {
            $data ['title']= $request->title;
        }



        Size::where('id',$id)
            ->update($data);
        Session::put('msg', ' سایز مورد نظر با موفقیت ویرایش شد.');
        return redirect(route('admin.size.index'));
    }
    public function delete(Request $request,$id)
    {

        Size::where('id',$id)
            ->delete();
        Session::put('msg', ' سایز مورد نظر با موفقیت حذف شد.');

        return redirect()->back();
    }
    private function validator(): array
    {
        $rules = [
            'title' => 'required|string|max:255|unique:categories,title',


        ];



        return $rules;
    }
}
