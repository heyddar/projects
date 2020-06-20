<?php

namespace App\Http\Controllers\Front;

use App\Brand;
use App\Category;
use App\Color;
use App\Product;
use App\Size;
use App\User;
use Ghanem\Rating\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function index()
    {
        $products   = Product::all();
        $brands     = Brand::all();
        $sizes      = Size::all();
        $colors     = Color::all();
        $categories = Category::all();

        return view('front.products',compact('categories','brands','sizes','colors','products'));

    }
    public function show($id)
    {
        $product = Product::
        where('id',$id)
       ->with([
           'colors:id,title',
           'sizes:sizes.id,title'
       ])
            ->get()->first();
        SEOTools::setTitle($product->name);

        return view('front.product', compact('product'));
    }

    public function rating($product_id , $star)
    {
        if(Auth::check()) {

            $user = User::find(Auth::user()->id);
            $product = Product::find($product_id);

            $rating = $product->ratingUnique([
                'rating' => $star
            ], $user);
            return redirect()->back();
        } else
            {
                return redirect()->back();
            }

    }
    public function coponcode(Request $request )
    {

       }

}
