@extends('admin.component')
@section('meta')
        <title> ویرایش کاربر - {{$user->name}} </title>

@endsection
@section('content2')
    <div class="container card card-body">
            <h2 class="text-primary"> ویرایش کاربر </h2>

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
        <form class="row justify-content-center" action="{{route('admin.user.update',['user'=>$user->id])}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PUT')
            <div class="col-md-3 form-group">
                <label for="name"> نام  </label>
                <input type="text" name="name" value="{{old('name') ?? $user->name ?? null}}" id="name" class="form-control">
            </div>
            <div class="col-md-3 form-group">
                <label for="display_name"> نام نمایشی  </label>
                <input type="text" name="display_name" value="{{old('display_name') ?? $user->display_name ?? null}}" id="display_name" class="form-control">
            </div>
            <div class="col-md-3 form-group">
                <label for="email"> ایمیل </label>
                <input type="email" name="email" value="{{old('email') ?? $user->email ?? null}}" id="email" class="form-control">
            </div>
            <div class="col-md-3 form-group text-right" >
                <label for="avatar"> تصویر پروفایل  </label>
                <input type="file" name="avatar"  value="{{old('avatar') ?? $post->avatar ?? null}}" id="avatar" class="form-control">
            </div>
            <div class="col-md-3 form-group">
                <label for="password"> رمز عبور جدید </label>
                <input type="password" name="password"  id="password" class="form-control">
            </div>

            <div class="col-md-4 form-group text-center">
                <div class="form-group">
                    <label for="color_list" class="control-label w-100">  تعیین نقش کاربر</label>
                    <select id="color_list"  name="role"  class="form-control"  data-placeholder="  انتخاب کنید" >
                        @foreach($roles as $role)
                            <option value="{{$role['id']}}" @if(isset($user) && in_array($role['id'], $user->roles->pluck('id')->toArray(), true)) selected @endif>{{$role->display_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="w-100"></div>
            <div class="control-group hidden-phone w-50 col-md-10">
                <label class="control-label" for="biography"> بیوگرافی</label>
                <div class="controls">
                        <textarea class="ckeditor"  id="biography" name="biography" rows="3">
                            {{old('biography') ?? $user->biography ?? null}}
                        </textarea>
                </div>
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
