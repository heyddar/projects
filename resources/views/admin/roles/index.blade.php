@extends('admin.component')
@section('meta')
    <title>لیست نقش ها </title>

@endsection
@section('content2')
    <div class="container">
        <div class="card card-body">
            <h2 class="text-primary">لیست نقش ها </h2>
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
                    <th> نامک </th>
                    <th> توضیحات </th>
                    <th colspan="2"> عملیات </th>
                </tr>
                </thead>
                <tbody>
              @foreach ($roles as $i => $role)
                    <tr>
                        <th> {{$i+1}}</th>
                        <td> {{$role->display_name}}</td>
                        <td> {{$role->name}}</td>
                        <td> {{$role->description}}</td>
                        <td>
                            <a class="btn btn-info" href="{{route('admin.role.edit',['role'=>$role->id])}}">
                                <i class="halflings-icon white fa fa-edit"></i>
                            </a>
                            <a class= "btn btn-danger btn-setting " href="{{route('admin.role.delete',['role'=>$role->id])}}"
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
                {{$sizes->links()}}
            </div>
        </div>
    </div>

@endsection
