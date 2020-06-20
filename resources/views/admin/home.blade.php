@extends('admin.layout')
@section('meta')
    <title>پنل مدیریت </title>

@endsection
@section('content')
    @include('admin.nav')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('admin.aside')
    <div class="container">
        <h2 class="text-success">به پنل مدیریت سایت وب مارکت خوش آمدید.</h2>

    </div>
    @yield('content2')
@endsection