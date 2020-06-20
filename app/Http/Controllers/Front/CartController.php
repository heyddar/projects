<?php

namespace App\Http\Controllers\Front;

use App\Product;
use App\Shipping;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Zarinpal\Zarinpal;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $id       = $request->id;
        $product  = Product::where('id',$id)->get()->first();
        $name     = $product->name;
        $price    = $product->price;
        $image    = $product->image;
        $qty      = $request->num;
        $size     = $request->size;
        $color    = $request->color;
        Cart::add(['id' => $id, 'name' => $name, 'qty' => $qty, 'price' => $price, 'weight' => 550, 'options' => ['size' => $size, 'color' => $color, 'image' => $image]]);
        return redirect()->back();
    }

    //step-1
    public function step1()
    {
        return view('front.checkout.checkout_1');
    }
    //step-2
    public function step2()
    {
        if(Auth::check()) {
            return view('front.checkout.checkout_2');
        }
        else
        {
            return redirect('login');
        }
    }

    //step-3
    public function step3(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|min:2|max:200',
            'lastName'  => 'required|string|min:2|max:200',
            'addr1'      => 'required|string|min:2|max:200',
            'addr2'      => 'required|string|min:2|max:200',
            'telephone'        => 'required||digits:11',
            'zip'        => 'required||digits:11',
        ]);
        Shipping::create([
            'first_name' => $request->firstName,
            'last_name'  => $request->lastName,
            'tel'        => $request->telephone,
            'address1'   => $request->addr1,
            'address2'   => $request->addr2,
            'zip'        => $request->zip,
        ]);
        return view('front.checkout.checkout_3');
    }
    //payment
    public function payment(Request $request){
        $payment_method = $request->payment_method;
        switch ($payment_method){
            case 'inhome':
                echo 'You must pay in your home';
                break;

            case 'zarinpal':
                $this->pay_by_zarinpal();

                break;
            default:
                echo 'this payment method not supported right now';
                break;

        }

    }
    public function pay_by_zarinpal()
    {
        $MerchantID = '00000000-0000-0000-0000-000000000000'; //Required
        $Amount = (int)Cart::total(0,'','',''); //Amount will be based on Toman - Required
        $Description = 'توضیحات تراکنش تستی'; // Required
        $Email = 'UserEmail@Mail.Com'; // Optional
        $Mobile = '09123456789'; // Optional
        $CallbackURL = 'http://webmarket.com/payment/done'; // Required


        $client = new \SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
        $result = $client->PaymentRequest(
            [
                'MerchantID' => $MerchantID,
                'Amount' => $Amount,
                'Description' => $Description,
                'Email' => $Email,
                'Mobile' => $Mobile,
                'CallbackURL' => $CallbackURL,
            ]
        );

//Redirect to URL You can do it also by creating a form
        if ($result->Status == 100) {

            Header('Location: https://sandbox.zarinpal.com/pg/StartPay/'.$result->Authority);
            dd('fff');

        } else {
            echo'ERR: '.$result->Status;
        }
    }
    public function callback()
    {
        $status = $_GET['Status'];
        if($status=='OK'){
            $this->finalstep('zarinpal');
//            dd('fff');
        }else{
            echo'not ok';
        }
    }
    public function finalstep($payment_method){
        $payment_method = array();
        $payment_method['payment_method'] =$payment_method;
        $payment_method['payment_status'] ='pending';
        $payment_id = DB::table('payments')
            ->insertGetId($payment_method);
        //..............................
        $order_data = array();
        $order_data['customer_id'] = session::get('customer_id') ;
        $order_data['shipping_id'] = session::get('shipping_id') ;
        $order_data['payment_id'] = $payment_id ;
        $order_data['order_total'] =       $total_cart = (int)Cart::total(0,'','','');
        ;
        $order_data['order_status'] = 'pending' ;
        $order_id = DB::table('orders')
            ->insertGetId($order_data);
        //...............................
        $order_details_data = array();
        $cart_content = Cart::content();
        foreach ($cart_content as $content){
            $order_details_data['order_id'] = $order_id;
            $order_details_data['product_id'] = $content->id;
            $order_details_data['product_name'] = $content->name;
            $order_details_data['product_price'] = $content->price;
            $order_details_data['product_sale_quantity'] = $content->qty;

            DB::table('order_details')
                ->insert($order_details_data);

        }
        return redirect('/cart/success');
    }
    public function success(){
        return view('front.success');
    }
}
