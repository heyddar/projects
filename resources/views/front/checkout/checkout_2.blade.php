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
                                            <a href="{{route('checkout-step-1')}}">سبد خرید</a>
                                        </div>
                                        <div class="step active">
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
                                <!--  = Shipping addr form =  -->
                                <!--  ==========  -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{route('checkout-step-3')}}" method="post" class="form-horizontal form-checkout">
                                    @csrf
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">نام<span class="red-clr bold">*</span></label>
                                        <div class="controls">
                                            <input type="text" id="firstName" class="span4" name="firstName" value="{{old('firstName')}}">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="lastName">نام خانوادگی<span class="red-clr bold">*</span></label>
                                        <div class="controls">
                                            <input type="text" id="lastName" class="span4" name="lastName" value="{{old('lastName')}}">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="telephone">تلفن<span class="red-clr bold">*</span></label>
                                        <div class="controls">
                                            <input type="tel" id="telephone" class="span4" name="telephone" value="{{old('telephone')}}">
                                        </div>
                                    </div>
{{--                                    <div class="control-group">--}}
{{--                                        <label class="control-label" for="email">ایمیل<span class="red-clr bold">*</span></label>--}}
{{--                                        <div class="controls">--}}
{{--                                            <input type="email" id="email" class="span4" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="control-group">
                                        <label class="control-label" for="addr1">ادرس 1<span class="red-clr bold">*</span></label>
                                        <div class="controls">
                                            <input type="text" id="addr1" class="span4" name="addr1" value="{{old('addr1')}}">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="addr2">آدرس 2</label>
                                        <div class="controls">
                                            <input type="text" id="addr2" class="span4" name="addr2" value="{{old('addr2')}}">
                                        </div>
                                    </div>
{{--                                    <div class="control-group">--}}
{{--                                        <label class="control-label" for="city">شهر<span class="red-clr bold">*</span></label>--}}
{{--                                        <div class="controls">--}}
{{--                                            <input type="text" id="city" class="span4" name="city" value="{{old('city')}}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="control-group">
                                        <label class="control-label" for="zip">کد پستی<span class="red-clr bold">*</span></label>
                                        <div class="controls">
                                            <input type="text" id="zip" class="span4" name="zip" value="{{old('zip')}}">
                                        </div>
                                    </div>
                                    <!--  ==========  -->
                                    <p class="right-align">
                                        در مرحله بعدی شما شیوه پرداخت را انتخاب میکنید &nbsp; &nbsp;
                                        <button  class="btn btn-primary higher bold">ادامه</button>
                                    </p>
                                </form>

                                <hr />




                            </div>
                        </div>
                    </div>


                </section> <!-- /main content -->

            </div>
        </div> <!-- /container -->




    </div> <!-- end of master-wrapper -->
    <div id="fb-root"></div>
@endsection
