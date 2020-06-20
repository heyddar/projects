@extends('front.layout')
@section('title')
    <title>وب مارکت</title>
@endsection
@section('content')
    @include('front.main_menu')
    <style>
        a{
            color: unset;
        }
    </style>
    <div class="darker-stripe">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <ul class="breadcrumb">

                        <li >
                            {{ Breadcrumbs::render('products') }}

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="push-up blocks-spacer">
            <div class="row">

                <!--  ==========  -->
                <!--  = Sidebar =  -->
                <!--  ==========  -->
                <aside class="span3 left-sidebar" id="tourStep1">
                    <div class="sidebar-item sidebar-filters" id="sidebarFilters">

                        <!--  ==========  -->
                        <!--  = Sidebar Title =  -->
                        <!--  ==========  -->
                        <div class="underlined">
                            <h3><span class="light">بر اساس فیلتر</span> خرید کنید</h3>
                        </div>

                        <!--  ==========  -->
                        <!--  = Categories =  -->
                        <!--  ==========  -->
                        <div class="accordion-group" id="tourStep2">
                            <div class="accordion-heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" href="#filterOne">دسته بندی <b class="caret"></b></a>
                            </div>
                            <div id="filterOne" class="accordion-body collapse in">
                                <div class="accordion-inner">
                                    @foreach($categories as $category)

                                        <a href="#" data-target="{{$category->title}}" data-type="category" class="selectable detailed"><i class="box"></i> {{$category->title}}</a>
                                    @endforeach

                                </div>
                            </div>
                        </div> <!-- /categories -->

                        <!--  ==========  -->
                        <!--  = Prices slider =  -->
                        <!--  ==========  -->
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" href="#filterPrices">قیمت <b class="caret"></b></a>
                            </div>
                            <div id="filterPrices" class="accordion-body in collapse">
                                <div class="accordion-inner with-slider">
                                    <div class="jqueryui-slider-container">
                                        <div id="pricesRange"></div>
                                    </div>
                                    <input type="text" data-initial="432" class="max-val pull-right" disabled />
                                    <input type="text" data-initial="99" class="min-val" disabled />
                                </div>
                            </div>
                        </div> <!-- /prices slider -->

                        <!--  ==========  -->
                        <!--  = Size filter =  -->
                        <!--  ==========  -->
                        <div class="accordion-group" id="tourStep3">
                            <div class="accordion-heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" href="#filterTwo">سایز <b class="caret"></b></a>
                            </div>
                            <div id="filterTwo" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    @foreach($sizes as $size)

                                    <a href="#" data-target="{{$size->title}}" data-type="size" class="selectable detailed"><i class="box"></i> {{$size->title}}</a>
                                    @endforeach

                                </div>
                            </div>
                        </div> <!-- /size filter -->

                        <!--  ==========  -->
                        <!--  = Color filter =  -->
                        <!--  ==========  -->
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" href="#filterThree">رنگ <b class="caret"></b></a>
                            </div>

                            <div id="filterThree" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    @foreach($colors as $color)

                                    <a href="#" data-target="{{$color->title}}" data-type="color" class="selectable detailed"><i class="box"></i> {{$color->title}}</a>
                                    @endforeach

                                </div>
                            </div>
                        </div> <!-- /color filter -->

                        <!--  ==========  -->
                        <!--  = Brand filter =  -->
                        <!--  ==========  -->
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" href="#filterFour">برند <b class="caret"></b></a>
                            </div>
                            <div id="filterFour" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    @foreach($brands as $brand)

                                    <a href="#" data-target="{{$brand->title}}" data-type="brand" class="selectable detailed"><i class="box"></i> {{$brand->title}}</a>
                                    @endforeach

                                </div>
                            </div>
                        </div> <!-- /brand filter -->

                        <a href="#" class="remove-filter" id="removeFilters"><span class="icon-ban-circle"></span> حذف همه فیلتر ها</a>

                    </div>
                </aside> <!-- /sidebar -->

                <!--  ==========  -->
                <!--  = Main content =  -->
                <!--  ==========  -->
                <section class="span9">

                    <!--  ==========  -->
                    <!--  = Title =  -->
                    <!--  ==========  -->
                    <div class="underlined push-down-20">
                        <div class="row">
                            <div class="span5">
                                <h3><span class="light">همه</span> محصولات</h3>
                            </div>
                            <div class="span4">
                                <div class="form-inline sorting-by" id="tourStep4">
                                    <label for="isotopeSorting" class="black-clr">چینش :</label>
                                    <select id="isotopeSorting" class="span3">
                                        <option value='{"sortBy":"price", "sortAscending":"true"}'>بر اساس قیمت (کم به زیاد) &uarr;</option>
                                        <option value='{"sortBy":"price", "sortAscending":"false"}'>بر اساس قیمت (زیاد به کم) &darr;</option>
                                        <option value='{"sortBy":"popularity", "sortAscending":"true"}'>بر اساس محبوبیت (کم به زیاد) &uarr;</option>
                                        <option value='{"sortBy":"popularity", "sortAscending":"false"}'>بر اساس محبوبیت (زیاد به کم) &darr;</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /title -->

                    <!--  ==========  -->
                    <!--  = Products =  -->
                    <!--  ==========  -->
                    <div class="row popup-products">
                        <div id="isotopeContainer" class="isotope-container">



                            <!--  ==========  -->
                            <!--  = Single Product =  -->
                            <!--  ==========  -->
                            @foreach($products as $product)

                            <div class="span3 filter--blazers"
                                 data-price="{{$product->price}}"
                                 data-popularity="2"
                                 data-category="{{$product->category->title}}"
{{--                                 data-size="{{$product->size->title}}" --}}
{{--                                 data-color="{{$product->color->title}}" --}}
                                 data-brand="{{$product->brand->title}}">
                                <div class="product">
                                    @if($product->exist === 'no' or $product->count === 0 )
                                    <div class="stamp red">تمام شد</div>
                                     @endif
                                    <div class="product-img">
                                        <div class="picture">
                                            <img width="540" height="374" alt="" src="{{url($product->image)}}" />
                                            <div class="img-overlay">
                                                <a class="btn more btn-primary" href="{{route('product.show',['product'=>$product->id,$product->name])}}">توضیحات بیشتر</a>
                                                <a class="btn buy btn-danger" href="#">اضافه به سبد خرید</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-titles no-margin">
                                        <h4 class="title">{{$product->price}}</h4>
                                        <h5 class="no-margin isotope--title"> {{$product->name}}</h5>
                                    </div>

                                    <p class="center-align stars">
                                        <a href="{{route('rating',['product_id' => $product->id , 'star' => '1' ])}}" >
                                            <span class="icon-star
                                                       <?php
                                                        if($product->avgRating >= '1'){
                                                           echo 'stars-clr';
                                                        }
                                                        ?>
                                            "></span>
                                        </a>
                                        <a href="{{route('rating',['product_id' => $product->id , 'star' => '2' ])}}">
                                        <span class="icon-star
                                         <?php
                                        if($product->avgRating >= '2'){
                                            echo 'stars-clr';
                                        }
                                        ?>
                                        "></span>
                                        </a>
                                        <a href="{{route('rating',['product_id' => $product->id , 'star' => '3' ])}}">
                                        <span class="icon-star
                                         <?php
                                        if($product->avgRating >= '3'){
                                            echo 'stars-clr';
                                        }
                                        ?>
                                        "></span>
                                        </a>
                                        <a href="{{route('rating',['product_id' => $product->id , 'star' => '4' ])}}">
                                        <span class="icon-star
                                         <?php
                                        if($product->avgRating >= '4'){
                                            echo 'stars-clr';
                                        }
                                        ?>
                                        "></span>
                                        </a>
                                        <a href="{{route('rating',['product_id' => $product->id , 'star' => '5' ])}}">
                                        <span class="icon-star
                                         <?php
                                        if($product->avgRating >= '5'){
                                            echo 'stars-clr';
                                        }
                                        ?>
                                        "></span>
                                        </a>

                                    </p>
                                </div>
                            </div> <!-- /single product -->
                            @endforeach


                        </div>
                    </div>
                    <hr />
                </section> <!-- /main content -->
            </div>
        </div>
    </div> <!-- /container -->



@endsection