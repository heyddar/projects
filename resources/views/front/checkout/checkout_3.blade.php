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
                                        <div class="step done">
                                            <div class="step-badge"><i class="icon-ok"></i></div>
                                            <a href="{{route('checkout-step-1')}}">سبد خريد</a>
                                        </div>
                                        <div class="step done">
                                            <div class="step-badge"><i class="icon-ok"></i></div>
                                            <a href="{{route('checkout-step-2')}}">آدرس ارسال</a>
                                        </div>
                                        <div class="step active">
                                            <div class="step-badge">2</div>
                                            شيوه پرداخت
                                        </div>
                                        <div class="step">
                                            <div class="step-badge">4</div>
                                            تاييد و پرداخت
                                        </div>
                                    </div>
                                </div> <!-- /steps -->

                                <!--  ==========  -->
                                <!--  = Payment =  -->
                                <!--  ==========  -->
                                <div class="row"
                                     style="border: 1px solid #ccc;
    margin: auto;
    overflow: hidden;
    text-align: center;
">
                                 <form action="{{route('payment')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12 alert alert-success">
                                            لطفا روش پرداخت خود را انتخاب کنید و بر روی پرداخت نهایی کلیک کنید.
                                        </div>

                                    </div>
                                    @csrf
{{--                                    <label style="display: block">--}}
{{--                                        <div class="col-sm-3">--}}
{{--                                            <img style="height: 100px" src="{{asset('/images/banks/download.jpg')}}"><br>--}}
{{--                                            <input type="radio" name="payment_method" id="saman" value="saman" />--}}

{{--                                        </div>--}}
{{--                                    </label>--}}
                                    <label style="display: inline-block" class="ml-2">
                                        <div class="col-sm-3">

                                            <img style="height: 100px" src="{{asset('/images/banks/mellat.jpg')}}"><br>
                                            <input type="radio" name="payment_method" id="mellat" value="mellat" />

                                        </div>
                                    </label>
                                    <label style="display: inline-block">
                                        <div class="col-sm-3">
                                            <img style="height: 100px" src="{{asset('images/banks/zpal.png')}}"><br>
                                            <input type="radio" name="payment_method" id="zarinpal" value="zarinpal" />

                                        </div>
                                    </label>
                                    <label style="display: inline-block">
                                        <div class="col-sm-3">
                                            <img style="height: 100px" src="{{asset('/images/banks/inhome.jpg')}}"><br>
                                            <input type="radio" name="payment_method" id="inhome" value="inhome" />

                                        </div>
                                    </label>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <br>
                                            <button type="submit" class="btn btn-primary" >
                                                پرداخت نهایی
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                                </div>
                        </div>
                    </div>


                </section> <!-- /main content -->

            </div>
        </div> <!-- /container -->
    </div> <!-- end of master-wrapper -->
    <div id="fb-root"></div>
@endsection
