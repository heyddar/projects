@extends('admin.component')
@section('meta')
    <title>افزودن دسترسی جدید </title>

@endsection
@section('content2')
<div class="container">
 <div class="card card-body">

        <h2 class="text-primary"> افزودن دسترسی جدید </h2>

    <hr>
     <?php
     if(Session::get('msg')){
         echo'<p class="alert alert-success">';
         echo Session::get('msg');
         echo'</p>';
         Session::put('msg',null);
     }
     ?>
     @if ($errors->any())
         <div class="alert alert-danger">
             <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
         </div>
     @endif
    <form class="row justify-content-center" action="{{route('admin.role.store')}}" method="post" id="f1">
        @csrf

        <div class="col-md-3 form-group">
            <label for="name"> نامک   </label>
            <input type="text" name="name" value="{{  old('name') }}" id="name" class="form-control" placeholder="فقط حروف انگلیسی">
        </div>
        <div class="col-md-3 form-group">
            <label for="display_name"> نام نمایشی   </label>
            <input type="text" name="display_name" value="{{  old('display_name') }}" id="display_name" class="form-control" >
        </div>
        <div class="col-md-3 form-group">
            <label for="description"> توضیحات    </label>
            <textarea type="text" name="description" id="description" class="form-control" placeholder="توضیحاتی در مورد این دسترسی">
                {{old('description')}}
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
                                            <input type="checkbox" id="input_permissions" name="permission" value="{{ $permission['id'] }}" type="checkbox" @if(!empty($rolePermissions) && in_array($permission['id'], $rolePermissions)) checked @endif />

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

افزودن
            </button>
        </div>


    </form>
  </div>
</div>
@endsection