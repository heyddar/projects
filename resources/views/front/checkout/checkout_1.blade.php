@extends('front.checkout.checkout')
@section('checkout')
<div class="master-wrapper">
    <div class="container">
        <div class="row">
            <!--  ==========  -->
            <!--  = Main content =  -->
            <!--  ==========  -->
            <section class="span12">
                <div class="checkout-container">
                    <div class="row">
                        <div class="span10 offset1">
                            <!--  ==========  -->
                            <!--  = Header =  -->
                            <!--  ==========  -->
                        @include('front.checkout.header')

                            <!--  ==========  -->
                            <!--  = Steps =  -->
                            <!--  ==========  -->
                            <div class="checkout-steps">
                                <div class="clearfix">
                                    <div class="step active">
                                        <div class="step-badge">1</div>
                                        سبد خرید
                                    </div>
                                    <div class="step">
                                        <div class="step-badge">2</div>
                                        آدرس ارسال
                                    </div>
                                    <div class="step">
                                        <div class="step-badge">3</div>
                                        شیوه پرداخت
                                    </div>
                                    <div class="step">
                                        <div class="step-badge">4</div>
                                        تایید و پرداخت
                                    </div>
                                </div>
                            </div> <!-- /steps -->

                            <!--  ==========  -->
                            <!--  = Selected Items =  -->
                            <!--  ==========  -->
                            @if (session('error'))
                                <div class="alert alert-danger">{{session('error')}}</div>
                            @endif
                            <table class="table table-items">
                                <thead>
                                <tr>
                                    <th colspan="4">آیتم</th>
                                    <th><div class="align-center">تعداد</div></th>
                                    <th><div class="align-right">قیمت</div></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $row)
                                    <tr>
                                    <td class="image"><img src="{{URL::to($row->options->image)}}" alt="" width="124" height="124" /></td>
                                    <td class="desc">{{$row->name}} <a title="Remove Item" class="icon-remove-sign" href="#"></a></td>
                                        <form action="{{route('copon')}}" method="get">
                                            @csrf
                                            <input type="hidden" value="18" name="product">
                                            <td class="desc">
                                                <input type="text" name="voucher">
                                            </td>
                                            <td class="desc">
                                                <button type="submit">
                                                    اعمال کد تخفیف
                                                </button>
                                            </td>

                                        </form>
                                    <td class="qty">
                                        <input type="text" class="tiny-size" value="{{$row->qty}}" />
                                    </td>
                                    <td class="price">

                                        {{$row->total}}
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2" rowspan="2">
                                        <div class="alert alert-info">
                                            <button data-dismiss="alert" class="close" type="button">×</button>
                                            هزینه ارسال بر اساس منطقه جغرافیایی محاسبه میشود. <a href="#">اطلاعات بیشتر</a>
                                        </div>
                                    </td>
                                    <td class="stronger">هزینه ارسال :</td>
                                    <td class="stronger"><div class="align-right">0</div></td>
                                </tr>
                                <tr>
                                    <td class="stronger">جمع کل :</td>
                                    <td class="stronger"><div class="size-16 align-right">
                                            {{\Gloudemans\Shoppingcart\Facades\Cart::total()}}

                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <hr />

                            <p class="right-align">
                                در مرحله بعدی شما آدرس ارسال را انتخاب خواهید کرد. &nbsp; &nbsp;
                                <a href="{{route('checkout-step-2')}}" class="btn btn-primary higher bold">ادامه</a>
                            </p>
                        </div>
                    </div>
                </div>


            </section> <!-- /main content -->

        </div>
    </div> <!-- /container -->




</div>
<div id="fb-root"></div>
@endsection
