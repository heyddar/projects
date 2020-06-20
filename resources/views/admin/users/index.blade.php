@extends('admin.component')
@section('meta')
    <title>لیست کاربران </title>

@endsection
@section('content2')
    <div class="container">
        <div class="card card-body">
            <h2 class="text-primary">لیست کاربران </h2>
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
                    <th> ایمیل </th>
                    <th>نقش کاربر</th>
                    <th> تاریخ ثبت نام </th>
                    <th colspan="2"> عملیات </th>
                </tr>
                </thead>
                <tbody>
              @foreach ($users as $i => $user)
                    <tr>
                        <th> {{$i+1}}</th>
                        <td> {{$user->name}}</td>
                        <td> {{$user->email}} </td>
                        @if(count($user->roles))
                        @foreach($user->roles as $role)
                        <td>{{$role->display_name}}</td>
                        @endforeach
                        @else
                            <td>کاربرعادی</td>
                        @endif
                        <td> {{print_date($user->created_at)}} </td>
                        <td>
                            <a class="btn btn-info" href="{{route('admin.user.edit',['user'=>$user->id])}}">
                                <i class="halflings-icon white fa fa-edit"></i>
                            </a>
                            <a class= "btn btn-danger btn-setting " href="{{route('admin.user.delete',['user'=>$user->id])}}"
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
                {{$users->links()}}
            </div>
        </div>
    </div>

@endsection
