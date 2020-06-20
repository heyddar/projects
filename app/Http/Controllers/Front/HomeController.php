<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Notifications\InvoicePaid;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $products = Product::all();
        $special_products = Product::where('kind','special')->get();

        return view('front.home',compact('products','special_products'));
    }

    public function invoice()
    {
        $invoice =[
            'id' => 1,
            'amount' => 2000

        ];
        Notification::send(User::all(),new InvoicePaid($invoice));
    }
}
