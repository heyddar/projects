@extends('admin.component')
@section('meta')
        <title> ویرایش نقش - {{$role->name}} </title>

@endsection
@section('content2')
    <div class="container card card-body">
            <h2 class="text-primary"> ویرایش نقش </h2>

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
        <form class="row justify-content-center" action="{{route('admin.role.update',['role'=>$role->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="col-md-3 form-group">
                <label for="name">  نامک </label>
                <input type="text" name="name" value="{{old('name') ?? $role->name ?? null}}" id="name" class="form-control">
            </div>
            <div class="col-md-3 form-group">
                <label for="display_name">  نام نمایشی </label>
                <input type="text" name="display_name" value="{{old('display_name') ?? $role->display_name ?? null}}" id="display_name" class="form-control">
            </div>
            <div class="col-md-3 form-group">
                <label for="description">  توضیحات </label>
                <textarea type="text" name="description" id="description" class="form-control">
                    {{old('description') ?? $role->description ?? null}}
                </textarea>
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
