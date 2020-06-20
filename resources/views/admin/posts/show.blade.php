@extends('admin.component')
@section('meta')
    <title>  {{$post->title}} </title>

@endsection
@section('content2')
    <div class="container">
        <table class="table table-striped table-show">
            <thead>
            <tr>
                <th>عنوان</th>
                <th>مشخصات</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <th>عنوان</th>
                <td>{{ $post['title'] }}</td>
            </tr>
            <tr>
                <th>خلاصه</th>
                <td>{!! $post['summary'] !!}</td>
            </tr>
            <tr>
                <th>محتوا</th>
                <td>{!! $post['content'] !!}</td>
            </tr>
            <tr>
                <th>تصویر</th>
                <td >
                    <img src="{{url($post['image'])}}" style="height: 200px;width: auto" alt="">
                </td>
            </tr>
            <tr>
                <th>نویسنده</th>
                <td>{!! $post->user->name !!}</td>
            </tr>

            <tr>
                <th> وضعیت انتشار</th>
                <td>{{ $post['status'] == '1' ? ' انتشار' : '  پیشنویس' }}</td>
            </tr>
            <tr>
                <th>تاریخ ایجاد</th>
                <td>{{ print_date($post['created_at']) }}</td>
            </tr>

            </tbody>
        </table>

    </div>
@endsection