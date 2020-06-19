@extends('admin.component')
@section('meta')
        <title> ویرایش مشتری - {{$user->name}} </title>

@endsection
@section('content2')
    <div class="container card card-body">
            <h2 class="text-primary"> ویرایش مشتری </h2>

        <hr>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="row justify-content-center" action="{{route('admin.user.update',['user'=>$user->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="col-md-3 form-group">
                <label for="name"> نام مشتری </label>
                <input type="text" name="name" value="{{old('name') ?? $user->name ?? null}}" id="name" class="form-control">
            </div>
            <div class="col-md-3 form-group">
                <label for="email"> ایمیل </label>
                <input type="email" name="email" value="{{old('email') ?? $user->email ?? null}}" id="email" class="form-control">
            </div>
            <div class="col-md-3 form-group">
                <label for="password"> رمز عبور جدید </label>
                <input type="password" name="password"  id="password" class="form-control">
            </div>

            <div class="col-md-4 form-group text-center">

                <label class="d-block"> نوع کاربر </label>

                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="is_admin" value="1" class="custom-control-input"
                           @if((old('is_admin') !== null && old('is_admin') === "1") || old('is_admin') === null && $user->is_admin === 1) checked @endif>
                    <span class="custom-control-label">
                        <span class="mr-4"> ادمین </span>
                    </span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="is_admin" value="0" class="custom-control-input"
                           @if((old('is_admin') !== null && old('is_admin') === "0") || old('is_admin') === null && $user->is_admin === 0) checked @endif
                    >
                    <span class="custom-control-label">
                        <span class="mr-4"> عادی </span>
                    </span>
                </label>

            </div>
            <div class="w-100"></div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-block">
                        ویرایش کاربر

                </button>
            </div>
        </form>
    </div>
@endsection
