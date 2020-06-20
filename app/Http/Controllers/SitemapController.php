<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;

class SitemapController extends Controller
{
    public function sitemap()
    {
        return response()->view('sitemap')->header('Content-Type','text/xml');
    }

    public function statics()
    {
        return response()->view('statics')->header('Content-Type','text/xml');
    }

    public function category()
    {
        $query=Category::active()->get();
        return response()->view('category',compact('query'))->header('Content-Type','text/xml');
    }

    public function post()
    {
        $query=Product::active()->with('PictureFirst')->orderBy('id','desc')->get();
        return response()->view('post',compact('query'))->header('Content-Type','text/xml');
    }
}
