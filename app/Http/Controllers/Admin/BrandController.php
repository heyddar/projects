<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::OrderBy('created_at','desc')->paginate(10);
        return view('admin.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');

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
        $brand = new Brand();
        $brand->title = $request->title;
        $brand->status = $request->status;
        $brand->save();
        Session::put('msg', ' برند جدید با موفقیت ثبت شد.');
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
        $brand = Brand::
        where('id',$id)
            ->get()->first();
        return view('admin.brands.edit', compact('brand'));
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



        Brand::where('id',$id)
            ->update($data);
        \Session::put('msg', ' برند مورد نظر با موفقیت ویرایش شد.');
        return redirect(route('admin.brand.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$id)
    {

        Brand::where('id',$id)
            ->delete();
        \Session::put('msg', ' برند مورد نظر با موفقیت حذف شد.');

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
