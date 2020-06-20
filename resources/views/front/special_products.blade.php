<div class="row featured-items blocks-spacer">
    <div class="span12">

        <!--  ==========  -->
        <!--  = Title =  -->
        <!--  ==========  -->
        <div class="main-titles lined">
            <h2 class="title"><span class="light">محصولات</span> ویژه</h2>
            <div class="arrows">
                <a href="#" class="icon-chevron-right" id="featuredItemsRight"></a>
                <a href="#" class="icon-chevron-left" id="featuredItemsLeft"></a>
            </div>
        </div>
    </div>

    <div class="span12">
        <!--  ==========  -->
        <!--  = Carousel =  -->
        <!--  ==========  -->
        <div class="carouFredSel" data-autoplay="false" data-nav="featuredItems">
            <div class="slide">
                <div class="row">





                    <!--  ==========  -->
                    <!--  = Product =  -->
                    <!--  ==========  -->
                    @foreach($special_products as $special_product)
                    <div class="span4">
                        <div class="product">
                            <div class="product-img featured">
                                <div class="picture">
                                    <img src="{{url($special_product->image)}}" alt="" width="518" height="358" />
                                    <div class="img-overlay">
                                        <a href="{{route('product.show',['product'=>$special_product->id,$special_product->name])}}" class="btn more btn-primary">توضیحات بیشتر</a>
                                        <a href="#" class="btn buy btn-danger">خرید</a>
                                    </div>
                                </div>
                            </div>
                            <div class="main-titles">
                                <h4 class="title">{{$special_product->price}}</h4>
                                <h5 class="no-margin">  {{$special_product->name}}</h5>
                            </div>
                            <p class="desc">{{$special_product->short_description}}</p>
                            <p class="center-align stars">
                                <span class="icon-star stars-clr"></span>
                                <span class="icon-star stars-clr"></span>
                                <span class="icon-star stars-clr"></span>
                                <span class="icon-star stars-clr"></span>
                                <span class="icon-star stars-clr"></span>

                            </p>
                        </div>
                    </div> <!-- /product -->
                @endforeach




                    <!--  ==========  -->
                    <!--  = Product =  -->
                    <!--  ==========  -->




                </div>
            </div>

        </div> <!-- /carousel -->
    </div>

</div>