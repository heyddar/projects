<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::OrderBy('created_at','desc')->paginate(10);
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');

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
        $category = new Category();
        $category->title = $request->title;
        $category->status = $request->status;
        $category->save();
        Session::put('msg', 'دسته بندی جدید با موفقیت ثبت شد.');
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
        $category = Category::
        where('id',$id)
            ->get()->first();
        return view('admin.categories.edit', compact('category'));
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
            'title' => 'nullable|string|max:200',
            'status' => 'nullable',
        ]);
        if ($request->title) {
            $data ['title']= $request->title;
        }
            $data ['status']= $request->status;



        Category::where('id',$id)
            ->update($data);
        Session::put('msg', 'دسته بندی مورد نظر با موفقیت ویرایش شد.');
        return redirect(route('admin.category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$id)
    {

        Category::where('id',$id)
            ->delete();
        Session::put('msg', 'دسته بندی مورد نظر با موفقیت حذف شد.');

        return redirect()->back();
    }
    private function validator(): array
    {
        $rules = [
            'title' => 'required|string|max:255|unique:categories,title',
            'status' => 'nullable',


        ];



        return $rules;
    }
}
