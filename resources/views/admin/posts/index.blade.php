@extends('admin.component')
@section('meta')
    <title>لیست پست ها </title>

@endsection
@section('content2')
    <div class="container">
        <div class="card card-body">
            <h2 class="text-primary">لیست پست ها </h2>
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
                    <th> عنوان </th>
                    <th> نویسنده </th>
                    <th> دسته بندی </th>
                    <th> تصویر شاخص </th>
                    <th> وضعیت</th>
                    <th colspan="3"> عملیات </th>
                </tr>
                </thead>
                <tbody>
              @foreach ($posts as $i => $post)
                    <tr>
                        <th> {{$i+1}}</th>
                        <td> {{$post->title}}</td>
                        <td> {{$post->user->name}}</td>
                        <td> {{$post->group->title}}</td>
                        <td>
                            <img src="{{url($post->image)}}" alt="" style="width: 100px;height: auto">

                        </td>
                        <td> {{$post->status()}} </td>
                        <td>
                            <a class="btn btn-info" href="{{route('admin.post.edit',['post'=>$post->id])}}">
                                <i class="halflings-icon white fa fa-edit"></i>
                            </a>
                            <a class="btn btn-secondary" href="{{route('admin.post.show',['post'=>$post->id])}}">
                                <i class="halflings-icon white fa fa-area-chart"></i>
                            </a>
                            <a class= "btn btn-danger btn-setting " href="{{route('admin.post.delete',['post'=>$post->id])}}"
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
                {{$posts->links()}}
            </div>
        </div>
    </div>

@endsection
