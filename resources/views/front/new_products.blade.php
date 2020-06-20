<!--  = New Products =  -->
<!--  ==========  -->
<div class="boxed-area blocks-spacer">
    <div class="container">

        <!--  ==========  -->
        <!--  = Title =  -->
        <!--  ==========  -->
        <div class="row">
            <div class="span12">
                <div class="main-titles lined">
                    <h2 class="title"><span class="light">محصولات</span> جدید فروشگاه</h2>
                </div>
            </div>
        </div> <!-- /title -->

        <div class="row popup-products blocks-spacer">


            <!--  ==========  -->
            <!--  = Product =  -->
            <!--  ==========  -->




            <!--  ==========  -->
            <!--  = Product =  -->
            <!--  ==========  -->




            <!--  ==========  -->
            <!--  = Product =  -->
            <!--  ==========  -->




            <!--  ==========  -->
            <!--  = Product =  -->
            <!--  ==========  -->

            <div class="clearfix"></div>


            <!--  ==========  -->
            <!--  = Product =  -->
            <!--  ==========  -->




            <!--  ==========  -->
            <!--  = Product =  -->
            <!--  ==========  -->




            <!--  ==========  -->
            <!--  = Product =  -->
            <!--  ==========  -->




            <!--  ==========  -->
            <!--  = Product =  -->
            <!--  ==========  -->
            @foreach($products as $product)
            <div class="span3">
                <div class="product">
                    <div class="product-img">
                        <div class="picture">
                            <img src="{{url($product->image)}}" alt="" width="540" height="374" />
                            <div class="img-overlay">
                                <a href="{{route('product.show',['product'=>$product->id,$product->name])}}" class="btn more btn-primary">توضیحات بیشتر</a>
                                <a href="#" class="btn buy btn-danger">اضافه به سبد خرید</a>
                            </div>
                        </div>
                    </div>
                    <div class="main-titles no-margin">
                        <h4 class="title">{{$product->price}}</h4>
                        <h5 class="no-margin">  {{$product->name}}</h5>
                    </div>
                    <p class="desc">{{$product->short_description}}</p>
                    <p class="center-align stars">
                        <span class="icon-star stars-clr"></span>
                        <span class="icon-star stars-clr"></span>
                        <span class="icon-star stars-clr"></span>
                        <span class="icon-star"></span>
                        <span class="icon-star"></span>

                    </p>
                </div>
            </div> <!-- /product -->
            @endforeach


        </div>
    </div>
</div> <!-- /new products -->