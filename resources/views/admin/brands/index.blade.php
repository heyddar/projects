@extends('admin.component')
@section('meta')
    <title>لیست برندها </title>

@endsection
@section('content2')
    <div class="container">
        <div class="card card-body">
            <h2 class="text-primary">لیست برندها </h2>
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
                    <th> لوگو </th>
                    <th> وضعیت</th>
                    <th colspan="2"> عملیات </th>
                </tr>
                </thead>
                <tbody>
              @foreach ($brands as $i => $brand)
                    <tr>
                        <th> {{$i+1}}</th>
                        <td> {{$brand->title}}</td>
                        <td>
                            <img src="{{url($brand->logo)}}" alt="" style="width: 100px;height: auto">

                        </td>
                        <td> {{$brand->brand_status()}} </td>
                        <td>
                            <a class="btn btn-info" href="{{route('admin.brand.edit',['brand'=>$brand->id])}}">
                                <i class="halflings-icon white fa fa-edit"></i>
                            </a>
                            <a class= "btn btn-danger btn-setting " href="{{route('admin.brand.delete',['brand'=>$brand->id])}}"
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
                {{$brands->links()}}
            </div>
        </div>
    </div>

@endsection
