@extends('admin.component')
@section('meta')
        <title> ویرایش دسته بندی - {{$category->name}} </title>

@endsection
@section('content2')
    <div class="container card card-body">
            <h2 class="text-primary"> ویرایش دسته بندی </h2>

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
        <form class="row justify-content-center" action="{{route('admin.category.update',['category'=>$category->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="col-md-3 form-group">
                <label for="title">  عنوان </label>
                <input type="text" name="title" value="{{old('title') ?? $category->title ?? null}}" id="title" class="form-control">
            </div>
            <div class="col-md-4 form-group text-center">

                <label class="d-block">  وضعیت </label>

                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" value="1" class="custom-control-input"
                           @if((old('status') !== null && old('status') === "1") || old('status') === null && $category->status === 1) checked @endif>
                    <span class="custom-control-label">
                        <span class="mr-4"> انتشار </span>
                    </span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="status" value="0" class="custom-control-input"
                           @if((old('status') !== null && old('status') === "0") || old('status') === null && $category->status === 0) checked @endif
                    >
                    <span class="custom-control-label">
                        <span class="mr-4"> پیش نویس </span>
                    </span>
                </label>

            </div>
            <div class="w-100"></div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-block">
                         ثبت

                </button>
            </div>
        </form>
    </div>
@endsection
