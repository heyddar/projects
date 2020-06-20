@extends('front.layout')
{{--@section('title')--}}
{{--    <title>وب مارکت</title>--}}
{{--@endsection--}}
@section('content')
    @include('front.main_menu')
    <div class="darker-stripe">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <ul class="breadcrumb">

                        <li >
                            {{ Breadcrumbs::render('product', $product) }}

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="push-up top-equal blocks-spacer">

            <!--  ==========  -->
            <!--  = Product =  -->
            <!--  ==========  -->
            <div class="row blocks-spacer">

                <!--  ==========  -->
                <!--  = Preview Images =  -->
                <!--  ==========  -->
                <div class="span5">
                    <div class="product-preview">
                        <div class="picture">
                            <img src="{{url($product->image)}}" alt="" width="940" height="940" id="mainPreviewImg" />
                        </div>
                        <div class="thumbs clearfix">
                            <div class="thumb active">
                                <a href="#mainPreviewImg"><img src="images/dummy/products/shirt-1.jpg" alt="" width="940" height="940" /></a>
                            </div>
                            <div class="thumb">
                                <a href="#mainPreviewImg"><img src="images/dummy/products/shirt-2.jpg" alt="" width="940" height="940" /></a>
                            </div>
                            <div class="thumb">
                                <a href="#mainPreviewImg"><img src="images/dummy/products/shirt-3.jpg" alt="" width="940" height="940" /></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!--  ==========  -->
                <!--  = Title and short desc =  -->
                <!--  ==========  -->
                <div class="span7">
                    <div class="product-title">
                        <h1 class="name"> {{$product->name}}</h1>
                        <div class="meta">
                            <span class="stock">
                                @if($product->count>0)
                                <span class="btn btn-success">موجود</span>
                                @else
                                <span class="btn btn-danger">اتمام موجودی</span>
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="product-description">
                        <p>{{$product->short_description}}</p>
                        <hr />

                        <!--  ==========  -->
                        <!--  = Add to cart form =  -->
                        <!--  ==========  -->
                        <form action="{{route('cart.add')}}" class="form form-inline clearfix" method="post">
                            @csrf
                            <div class="numbered">
                                <input type="text" name="num" value="1" class="tiny-size" />
                                <span class="clickable add-one icon-plus-sign-alt"></span>
                                <span class="clickable remove-one icon-minus-sign-alt"></span>
                            </div>
                            &nbsp;
                            <select name="color" class="span2" data-placeholder="رنگ مورد نظر خود را انتخاب کنید">
                                @foreach($product->colors as $color)
                                    <option value="{{$color->title}}" >{{$color->title}}</option>
                                @endforeach
                            </select>
                            <select name="size" class="span2">
                                @foreach($product->sizes as $size)
                                    <option value="{{$size->title}}" >{{$size->title}}</option>
                                @endforeach
                            </select>
                            <input type="hidden" value="{{$product->id}}" name="id">
                            @if($product->count>0)
                            <button class="btn btn-danger pull-right"><i class="icon-shopping-cart"></i> اضافه به سبد خرید</button>
                            @else
                                <button class="btn btn-danger pull-right disabled"><i class="icon-shopping-cart"></i> اضافه به سبد خرید</button>
                            @endif
                        </form>

                        <hr />
                        <div>
                            <h3>
                                {{$product->category->title}}

                            </h3>
                        </div>

                        <!--  ==========  -->
                        <!--  = Share buttons =  -->
                        <!--  ==========  -->
                        <div class="share-item">
                            <div class="pull-right social-networks">
                                <!-- AddThis Button BEGIN -->
                                <div class="addthis_toolbox addthis_default_style ">
                                    <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                    <a class="addthis_button_tweet"></a>
                                    <a class="addthis_button_pinterest_pinit"></a>
                                    <a class="addthis_counter addthis_pill_style"></a>
                                </div>
                                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-517459541beb3977"></script>
                                <!-- AddThis Button END -->
                            </div>
                            با دوستان خود به اشتراک بگذارید :
                        </div>

                    </div>
                </div>
            </div>

            <!--  ==========  -->
            <!--  = Tabs with more info =  -->
            <!--  ==========  -->
            <div class="row">
                <div class="span12">
                    <ul id="myTab" class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab-1" data-toggle="tab">جزئیات</a>
                        </li>
                        <li>
                            <a href="#tab-3" data-toggle="tab">نظرات</a>
                        </li>
                        <li>
                            <a href="#tab-4" data-toggle="tab">جزئیات ارسال</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="fade in tab-pane active" id="tab-1">
                            <h3>توضیحات محصول</h3>
                            {{strip_tags($product->long_description)}}
                        </div>

                        <div class="fade tab-pane" id="tab-3">
                            <p>
                                لورم ایپسوم متنی است که ساختگی برای طراحی و چاپ آن مورد است. صنعت چاپ زمانی لازم بود شرایطی شما باید فکر ثبت نام و طراحی، لازمه خروج می باشد. در ضمن قاعده همفکری ها جوابگوی سئوالات زیاد شاید باشد، آنچنان که لازم بود طراحی گرافیکی خوب بود. کتابهای زیادی شرایط سخت ، دشوار و کمی در سالهای دور لازم است. هدف از این نسخه فرهنگ پس از آن و دستاوردهای خوب شاید باشد. حروفچینی لازم در شرایط فعلی لازمه تکنولوژی بود که گذشته، حال و آینده را شامل گردد. سی و پنج درصد از طراحان در قرن پانزدهم میبایست پرینتر در ستون و سطر حروف لازم است، بلکه شناخت این ابزار گاه اساسا بدون هدف بود و سئوالهای زیادی در گذشته بوجود می آید، تنها لازمه آن بود.
                            </p>
                        </div>
                        <div class="fade tab-pane" id="tab-4">
                            <p>
                                لورم ایپسوم متنی است که ساختگی برای طراحی و چاپ آن مورد است. صنعت چاپ زمانی لازم بود شرایطی شما باید فکر ثبت نام و طراحی، لازمه خروج می باشد. در ضمن قاعده همفکری ها جوابگوی سئوالات زیاد شاید باشد، آنچنان که لازم بود طراحی گرافیکی خوب بود. کتابهای زیادی شرایط سخت ، دشوار و کمی در سالهای دور لازم است. هدف از این نسخه فرهنگ پس از آن و دستاوردهای خوب شاید باشد. حروفچینی لازم در شرایط فعلی لازمه تکنولوژی بود که گذشته، حال و آینده را شامل گردد. سی و پنج درصد از طراحان در قرن پانزدهم میبایست پرینتر در ستون و سطر حروف لازم است، بلکه شناخت این ابزار گاه اساسا بدون هدف بود و سئوالهای زیادی در گذشته بوجود می آید، تنها لازمه آن بود...
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /container -->
    <div class="boxed-area no-bottom">
        <div class="container">

            <!--  ==========  -->
            <!--  = Title =  -->
            <!--  ==========  -->
            <div class="row">
                <div class="span12">
                    <div class="main-titles lined">
                        <h2 class="title"><span class="light">محصولات</span> مرتبط</h2>
                    </div>
                </div>
            </div>

            <!--  ==========  -->
            <!--  = Related products =  -->
            <!--  ==========  -->
            <div class="row popup-products">


                <!--  ==========  -->
                <!--  = Products =  -->
                <!--  ==========  -->
                <div class="span3">
                    <div class="product">
                        <div class="product-img">
                            <div class="picture">
                                <img src="images/dummy/products/product-1.jpg" alt="" width="540" height="374" />
                                <div class="img-overlay">
                                    <a href="#" class="btn more btn-primary">توضیحات بیشتر</a>
                                    <a href="#" class="btn buy btn-danger">اضافه به سبد خرید</a>
                                </div>
                            </div>
                        </div>
                        <div class="main-titles no-margin">
                            <h4 class="title"><span class="striked">90000 تومان</span> <span class="red-clr">80000 تومان</span></h4>
                            <h5 class="no-margin">آدیداس کانورس</h5>
                        </div>
                        <p class="desc">توضیحاتی که در مورد محصول لازم است را در اینجا مینویسید</p>
                        <p class="center-align stars">
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star"></span>
                        </p>
                    </div>
                </div> <!-- /product -->


                <!--  ==========  -->
                <!--  = Products =  -->
                <!--  ==========  -->
                <div class="span3">
                    <div class="product">
                        <div class="product-img">
                            <div class="picture">
                                <img src="images/dummy/products/product-2.jpg" alt="" width="540" height="374" />
                                <div class="img-overlay">
                                    <a href="#" class="btn more btn-primary">توضیحات بیشتر</a>
                                    <a href="#" class="btn buy btn-danger">اضافه به سبد خرید</a>
                                </div>
                            </div>
                        </div>
                        <div class="main-titles no-margin">
                            <h4 class="title"><span class="striked">70000 تومان</span> <span class="red-clr">30000 تومان</span></h4>
                            <h5 class="no-margin">نایک دانک 552</h5>
                        </div>
                        <p class="desc">توضیحاتی که در مورد محصول لازم است را در اینجا مینویسید</p>
                        <p class="center-align stars">
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star"></span>
                        </p>
                    </div>
                </div> <!-- /product -->


                <!--  ==========  -->
                <!--  = Products =  -->
                <!--  ==========  -->
                <div class="span3">
                    <div class="product">
                        <div class="product-img">
                            <div class="picture">
                                <img src="images/dummy/products/product-3.jpg" alt="" width="540" height="374" />
                                <div class="img-overlay">
                                    <a href="#" class="btn more btn-primary">توضیحات بیشتر</a>
                                    <a href="#" class="btn buy btn-danger">اضافه به سبد خرید</a>
                                </div>
                            </div>
                        </div>
                        <div class="main-titles no-margin">
                            <h4 class="title"><span class="striked">45000 تومان</span> <span class="red-clr">35000 تومان</span></h4>
                            <h5 class="no-margin">آل استار 552</h5>
                        </div>
                        <p class="desc">توضیحاتی که در مورد محصول لازم است را در اینجا مینویسید</p>
                        <p class="center-align stars">
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star"></span>
                        </p>
                    </div>
                </div> <!-- /product -->


                <!--  ==========  -->
                <!--  = Products =  -->
                <!--  ==========  -->
                <div class="span3">
                    <div class="product">
                        <div class="product-img">
                            <div class="picture">
                                <img src="images/dummy/products/product-4.jpg" alt="" width="540" height="374" />
                                <div class="img-overlay">
                                    <a href="#" class="btn more btn-primary">توضیحات بیشتر</a>
                                    <a href="#" class="btn buy btn-danger">اضافه به سبد خرید</a>
                                </div>
                            </div>
                        </div>
                        <div class="main-titles no-margin">
                            <h4 class="title"><span class="striked">10000 تومان</span> <span class="red-clr">5000 تومان</span></h4>
                            <h5 class="no-margin">کاترپیلار 552</h5>
                        </div>
                        <p class="desc">توضیحاتی که در مورد محصول لازم است را در اینجا مینویسید</p>
                        <p class="center-align stars">
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star"></span>
                        </p>
                    </div>
                </div> <!-- /product -->


            </div>
        </div>
    </div>




@endsection
