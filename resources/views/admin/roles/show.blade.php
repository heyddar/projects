@extends('admin.component')
@section('meta')
    <title>  {{$role->title}} </title>

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
                <th>نامک</th>
                <td>{{ $role['name'] }}</td>
            </tr>
            <tr>
                <th>نام نمایشی</th>
                <td>{!! $role['display_name'] !!}</td>
            </tr>
            <tr>
                <th>توضیحات</th>
                <td>{!! $role['description'] !!}</td>
            </tr>
{{--            <tr>--}}
{{--                <th>دسترسی ها</th>--}}
{{--                @foreach($role->permissions as $permission)--}}
{{--                <td>{!! $permission['display_name'] !!}</td>--}}
{{--                 @endforeach--}}
{{--            </tr>--}}
            </tbody>
        </table>

    </div>
@endsection