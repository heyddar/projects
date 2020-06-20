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
            <div class="col-md-12 jumbotron">

                <h3 class="text-primary m-b-3">
                    <strong>دسترسی‌ها</strong>
                </h3>
                {{--                <small>--}}
                {{--                    <label class="text-muted">--}}
                {{--                        <input class="select-all-group" type="checkbox">  انتخاب همه موارد--}}
                {{--                    </label>--}}
                {{--                </small>--}}
                <div class="row mt-5">
                    @foreach($permissions as $permission)
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <div class="pretty p-default p-curve p-pulse">
                                    <div class="state p-primary">
                                        <label for="input_permissions"></label>
                                        <input type="checkbox" id="input_permissions" name="permissions[]" value="{{ $permission['id'] }}" type="checkbox" @if(!empty($rolePermissions) && in_array($permissions['id'], $rolePermissions)) checked @endif />

                                        <label>{{ $permission['display_name'] }}</label>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    @endforeach
                </div>

                </h3>


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
