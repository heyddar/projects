<!--  = Main Menu / navbar =  -->
<!--  ==========  -->
<div class="navbar navbar-static-top" id="stickyNavbar">
    <div class="navbar-inner">
        <div class="container">
            <div class="row">
                <div class="span9">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!--  ==========  -->
                    <!--  = Menu =  -->
                    <!--  ==========  -->
                    <div class="nav-collapse collapse">
                        <ul class="nav" id="mainNavigation">
                            <li><a href="{{url('/')}}"> خانه</a></li>

                            <li><a href="{{url('/products')}}"> فروشگاه</a></li>
                            <li >
                                <a href="{{route('post.index')}}" >بلاگ <b ></b> </a>

                            </li>
                            <li><a href="about-us.html">درباره ما</a></li>
                            <li><a href="contact.html">تماس با ما</a></li>
                        </ul>

                        <!--  ==========  -->
                        <!--  = Search form =  -->
                        <!--  ==========  -->
                        <form class="navbar-form pull-right" action="#" method="get">
                            <button type="submit"><span class="icon-search"></span></button>
                            <input type="text" class="span1" name="search" id="navSearchInput">
                        </form>
                    </div><!-- /.nav-collapse -->
                </div>

                <!--  ==========  -->
                <!--  = Cart =  -->
                <!--  ==========  -->
                <div class="span3">
                    <div class="cart-container" id="cartContainer">
                        <div class="cart">
                            <p class="items">سبد خرید <span class="dark-clr">
                                ({{\Gloudemans\Shoppingcart\Facades\Cart::count()}})

                                </span></p>
                            <p class="dark-clr hidden-tablet">
                                {{\Gloudemans\Shoppingcart\Facades\Cart::total()}}
                            </p>
                            <a href="{{route('checkout-step-1')}}" class="btn btn-danger">
                                <!-- <span class="icon icons-cart"></span> -->
                                <i class="icon-shopping-cart"></i>
                            </a>
                        </div>
                        <div class="open-panel">
                            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $row)
                            <div class="item-in-cart clearfix">
                                <div class="image">
                                    <a href=""><img style="height: 100px;width: 100px" src="{{URL::to($row->options->image)}}" alt=""></a>
                                </div>
                                <div class="desc">
                                    <strong><a href="product.html">{{$row->name}}</a></strong>
                                    <span class="light-clr qty">
                                    تعداد : {{$row->qty}}
                                    &nbsp;
                                    <a href="#" class="icon-remove-sign" title="Remove Item"></a>
                                </span>
                                </div>
                                <div class="price">
                                    <strong>{{$row->total}} تومان</strong>
                                </div>
                            </div>
                            @endforeach

                            <div class="summary">
                                <div class="line">
                                    <div class="row-fluid">
                                        <div class="span6">هزینه ارسال :</div>
                                        <div class="span6 align-right">0</div>
                                    </div>
                                </div>
                                <div class="line">
                                    <div class="row-fluid">
                                        <div class="span6">جمع کل :</div>
                                        <div class="span6 align-right size-16">{{\Gloudemans\Shoppingcart\Facades\Cart::total()}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="proceed">
                                <a href="{{route('checkout-step-1')}}" class="btn btn-danger pull-right bold higher">تسویه حساب <i class="icon-shopping-cart"></i></a>
                                <small>هزینه ارسال بر اساس منطقه جغرافیایی محاسبه میشود. <a href="#">اطلاعات بیشتر</a></small>
                            </div>
                        </div>
                    </div>
                </div> <!-- /cart -->
            </div>
        </div>
    </div>
</div> <!-- /main menu -->