@extends('admin.component')
@section('meta')
        <title> ویرایش دسته بندی - {{$group->name}} </title>

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
        <form class="row justify-content-center" action="{{route('admin.group.update',['group'=>$group->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="col-md-3 form-group">
                <label for="title">  عنوان </label>
                <input type="text" name="title" value="{{old('title') ?? $group->title ?? null}}" id="title" class="form-control">
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
