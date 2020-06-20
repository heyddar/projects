@extends('admin.component')
@section('meta')
    <title>افزودن دسترسی جدید </title>

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
                <td>{{ $comment['title'] }}</td>
            </tr>
            <tr>
                <th>توضیحات</th>
                <td>{!! $comment['content'] !!}</td>
            </tr>

            <tr>
                <th>وضعیت</th>
                <td>{{ $comment['is_accepted'] == '1' ? ' تایید شده' : ' تایید نشده' }}</td>
            </tr>
            <tr>
                <th>تاریخ ایجاد</th>
                <td>{{ print_date($comment['created_at']) }}</td>
            </tr>

            </tbody>
        </table>

    </div>
@endsection