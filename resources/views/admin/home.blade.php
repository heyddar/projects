@extends('admin.layout')
@section('content')
    @include('admin.nav')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('admin.aside')
    @yield('content2')
@endsection