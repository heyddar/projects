@extends('admin.component')
@section('meta')
    <title>لیست محصولات </title>

@endsection
@section('content2')
    <div class="container">
        <div class="card card-body">
            <h2 class="text-primary">لیست محصولات </h2>
            <?php
            if(Session::get('msg')){
                echo'<p class="alert alert-success">';
                echo Session::get('msg');
                echo'</p>';
                Session::put('msg',null);
            }
            ?>
            <table class="table table-bordered table-hover table-responsive-lg text-center">
                <thead>
                <tr >
                    <th> # </th>
                    <th> نام </th>
                    <th> قیمت </th>
{{--                    <th> رنگ </th>--}}
{{--                    <th> سایز </th>--}}
                    <th> دسته بندی </th>
                    <th> برند </th>
                    <th> تصویر شاخص </th>
                    <th> وضعیت</th>
                    <th colspan="2"> عملیات </th>
                </tr>
                </thead>
                <tbody>
              @foreach ($products as $i => $product)
                    <tr>
                        <th> {{$i+1}}</th>
                        <td> {{$product->name}}</td>
                        <td> {{$product->price}}</td>
{{--                        <td> {{$product->colors->title}}</td>--}}
{{--                        <td> {{$product->sizes->title}}</td>--}}
                        <td> {{$product->category->title}}</td>
                        <td> {{$product->brand->title}}</td>
                        <td>
                            <img src="{{url($product->image)}}" alt="" style="width: 100px;height: auto">

                        </td>
                        <td> {{$product->status()}} </td>
                        <td>
                            <a class="btn btn-info" href="{{route('admin.product.edit',['product'=>$product->id])}}">
                                <i class="halflings-icon white fa fa-edit"></i>
                            </a>
                            <a class= "btn btn-danger btn-setting " href="{{route('admin.product.delete',['product'=>$product->id])}}"
                               onclick="return confirm('آیا مطمئنید؟')"
                               >

                                <i class="halflings-icon white fa fa-trash"></i>
                            </a>

                        </td>

                    </tr>
               @endforeach
                </tbody>
            </table>

            <div class="mt-4 center-pagination">
                {{$products->links()}}
            </div>
        </div>
    </div>

@endsection
