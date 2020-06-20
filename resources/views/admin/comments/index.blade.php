@extends('admin.component')
@section('meta')
    <title>لیست نظرات </title>

@endsection
@section('content2')
    <div class="container">
        <div class="card card-body">
            <h2 class="text-primary">لیست نظرات </h2>
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
                    <th> نویسنده </th>
                    <th> پست  </th>
                    <th> عنوان </th>
                    <th> محتوا </th>
                    <th> وضعیت تایید </th>
                    <th colspan="3"> عملیات </th>
                </tr>
                </thead>
                <tbody>
              @foreach ($comments as $i => $comment)
                    <tr>
                        <th> {{$i+1}}</th>
                        <td> {{$comment->name}}</td>
                        <td> {{$comment->post->title}}</td>
                        <td> {{$comment->title}}</td>
                        <td> {{str_limit($comment->content,40)}}</td>
                        <td> {{$comment->is_accepted()}}</td>
                        <td>
                            <a class="btn btn-info" data-toggle="tooltip" title="تغییر وضعیت تایید" href="{{route('admin.comment.edit',['comment'=>$comment->id])}}">
                                <i class="halflings-icon white fa fa-edit"></i>
                            </a>
                            <a class="btn btn-secondary" data-toggle="tooltip" title=" نمایش کامنت" href="{{route('admin.comment.show',['comment'=>$comment->id])}}">
                                <i class="halflings-icon white fa fa-comment"></i>
                            </a>
                            <a class= "btn btn-danger btn-setting " data-toggle="tooltip" title="حذف کامنت" href="{{route('admin.comment.delete',['comment'=>$comment->id])}}"
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
                {{$comments->links()}}
            </div>
        </div>
    </div>

@endsection
