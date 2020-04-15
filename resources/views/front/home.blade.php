@extends('front.layout')
@section('title')
<title>وب مارکت</title>
@endsection

@section('content')


    @include('front.main_menu')
    @include('front.slider_revelotion')

    <!--  ==========  -->
    <!--  = Main container =  -->
    <!--  ==========  -->
    <div class="container">
        @include('front.3')

        <!--  ==========  -->
        <!--  = Featured Items =  -->
        <!--  ==========  -->
       @include('front.special_products')
    </div> <!-- /container -->

    <!--  ==========  -->
    @include('front.new_products')

    <!--  ==========  -->

    @include('front.most_popular_products')
    @include('front.brands_carousel')
@endsection


