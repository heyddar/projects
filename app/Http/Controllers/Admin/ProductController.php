<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Color;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Size;
use BeyondCode\Vouchers\Models\Voucher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::OrderBy('created_at','desc')
            ->paginate(10);
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands     = Brand::all();
        $sizes      = Size::all();
        $colors     = Color::all();
        return view('admin.products.create',compact('categories','brands','sizes','colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->price = $request->price;
        $product->count = $request->count;
        $product->brand_id = $request->brand_id;
        $product->exist = $request['exist'] ?? 'yes';
        $product->kind = $request['kind'] ?? null;
        $product->category_id = $request->category_id;
        $product->status = $request->status?? 'publish';
        $image = $request->file('image');
        if($image){
            $image_name = date('mdYHis');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.".".$ext;
            $upload_url = 'images/brands/';
            $image_url = $upload_url.$image_full_name;
            $isUploaded = $image->move($upload_url,$image_full_name);
            if($isUploaded) {
                $product->image = $image_url;
            }else {
                $product->image = null;
            }
        }
        $product->save();
        $product = Product::find($product->id);

        $product->createVouchers(2, [], today()->addDays(7));
        $product->sizes()->attach($request->input('sizes'));
        $product->colors()->attach($request->input('colors'));
        Session::put('msg', ' محصول جدید با موفقیت ثبت شد.');
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
        $categories = Category::all();
        $brands     = Brand::all();
        $sizes      = Size::all();
        $colors     = Color::all();
        $product = Product::with([
                'sizes:sizes.id,title'
            ])
            ->findOrFail($id);
        return view('admin.products.edit', compact('product','categories','brands','sizes','colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $image = $request->file('image');
            if($image){
                $image_name = date('mdYHis');
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name.".".$ext;
                $upload_url = 'images/brands/';
                $image_url = $upload_url.$image_full_name;
                $isUploaded = $image->move($upload_url,$image_full_name);
                    $data['image'] = $image_url;

            }
        $product= Product::findorfail($id);
        $product->update([
            'name' => $request->name,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'price' => $request->price,
            'count' => $request->count,
            'exist' => $request-> $request['exist'] ?? 'yes',
            'brand_id' => $request->brand_id,
            'kind' => $request['kind'] ?? null,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'image'=> $data['image'],

        ]);
        $product = Product::find($product->id);

        $product->createVouchers(1, ['discount_percent' => 10], today()->addDays(7));

        $product->colors()->sync($request->input('colors'));

        $product->sizes()->sync($request->input('sizes'));


        \Session::put('msg', ' محصول مورد نظر با موفقیت ویرایش شد.');
        return redirect(route('admin.product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$id)
    {

        Product::where('id',$id)
            ->delete();
        \Session::put('msg', ' محصول مورد نظر با موفقیت حذف شد.');

        return redirect()->back();
    }

}
