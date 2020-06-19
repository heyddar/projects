@extends('admin.component')
@section('meta')
    <title>افزودن کاربر جدید </title>

@endsection
@section('content2')
<div class="container">
 <div class="card card-body">

        <h2 class="text-primary"> افزودن کاربر جدید </h2>

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
    <form class="row justify-content-center" action="{{route('admin.user.store')}}" method="post" id="f1">
        @csrf

        <div class="col-md-3 form-group">
            <label for="name"> نام  </label>
            <input type="text" name="name" value="{{  old('name') }}" id="name" class="form-control">
        </div>
        <div class="col-md-3 form-group">
            <label for="email"> ایمیل </label>
            <input type="email" name="email" value="{{  old('email') }}"  id="email" class="form-control">
        </div>
        <div class="col-md-3 form-group">
            <label for="password"> رمز عبور </label>
            <input type="password" name="password" value="{{  old('password') }}"  id="password" class="form-control">
        </div>
        <div class="col-md-4 form-group text-center">

            <label class="d-block"> نوع کاربر </label>

            <label class="custom-control custom-radio custom-control-inline">
                <input type="radio" name="is_admin" value="1" class="custom-control-input">
                <span class="custom-control-label">
                        <span class="mr-4"> ادمین </span>
                    </span>
            </label>
            <label class="custom-control custom-radio custom-control-inline">
                <input type="radio" name="is_admin" value="0" class="custom-control-input">
                <span class="custom-control-label">
                        <span class="mr-4"> عادی </span>
                    </span>
            </label>

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
{{--@section('ajax')--}}
{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function () {--}}
{{--            $("#f1").submit(function (event) {--}}
{{--                event.preventDefault();--}}
{{--                var $this = $(this);--}}
{{--                var url = $this.attr('action');--}}

{{--                $.ajax({--}}
{{--                    url : url,--}}
{{--                    type:'POST',--}}
{{--                    datatype:'JSON',--}}
{{--                    data: $this.serialize(),--}}
{{--                })--}}
{{--                    --}}
{{--            });--}}
{{--        });--}}

{{--    </script>--}}
{{--@endsection--}}