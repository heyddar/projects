@extends('admin.component')
@section('meta')
    <title>لیست کلمات کلیدی </title>

@endsection
@section('content2')
    <div class="container">
        <div class="card card-body">
            <h2 class="text-primary">لیست کلمات کلیدی </h2>
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
                    <th colspan="2"> عملیات </th>
                </tr>
                </thead>
                <tbody>
              @foreach ($tags as $i => $tag)
                    <tr>
                        <th> {{$i+1}}</th>
                        <td> {{$tag->title}}</td>
                        <td>
                            <a class="btn btn-info" href="{{route('admin.tag.edit',['tag'=>$tag->id])}}">
                                <i class="halflings-icon white fa fa-edit"></i>
                            </a>
                            <a class= "btn btn-danger btn-setting " href="{{route('admin.tag.delete',['tag'=>$tag->id])}}"
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
                {{$tags->links()}}
            </div>
        </div>
    </div>

@endsection
