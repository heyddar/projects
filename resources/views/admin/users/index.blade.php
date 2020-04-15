@extends('admin.home')
@section('content2')
    <div class="container">
        <div class="card card-body">
            <table class="table table-bordered table-hover table-responsive-lg text-center">
                <thead>
                <tr >
                    <th> # </th>
                    <th> نام </th>
                    <th> ایمیل </th>
                    <th> تاریخ ثبت نام </th>
                    <th colspan="2"> عملیات </th>
                </tr>
                </thead>
                <tbody>
              @foreach ($users as $i => $user)
                    <tr>
                        <th> {{$i+1}} </th>
                        <td> {{$user->name}}</td>
                        <td> {{$user->email}} </td>
                        <td> {{print_date($user->created_at)}} </td>
                        <td>  <a class="btn btn-info" href="{{route('admin.user.edit',['user'=>$user->id])}}">
                                <i class="halflings-icon white fa fa-edit"></i>
                            </a>
                            <a class= "btn btn-danger btn-setting" href="{{route('admin.user.destroy',['user'=>$user->id])}}"
                               onclick="return confirm('آیا مطمئنید؟')">
                                <i class="halflings-icon white fa fa-trash"></i>
                            </a> </td>

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
