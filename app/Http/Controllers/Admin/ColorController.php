<?php

namespace App\Http\Controllers\Admin;

use App\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::OrderBy('created_at','desc')->paginate(5);
        return view('admin.colors.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->validator());
        $color = new Color();
        $color->title = $request->title;
        $color->save();
        Session::put('msg', 'رنگ جدید با موفقیت ثبت شد.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $color = Color::
        where('id',$id)
            ->get()->first();
        return view('admin.color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:200',
        ]);
        if ($request->title) {
            $data ['title']= $request->title;
        }



        Color::where('id',$id)
            ->update($data);
        Session::put('msg', ' رنگ مورد نظر با موفقیت ویرایش شد.');
        return redirect(route('admin.color.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$id)
    {

        Color::where('id',$id)
            ->delete();
        Session::put('msg', ' رنگ مورد نظر با موفقیت حذف شد.');

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
