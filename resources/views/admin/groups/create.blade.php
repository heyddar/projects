@extends('admin.component')
@section('meta')
    <title>افزودن دسته بندی جدید </title>

@endsection
@section('content2')
<div class="container">
 <div class="card card-body">

        <h2 class="text-primary"> افزودن دسته بندی جدید </h2>

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
    <form class="row justify-content-center" action="{{route('admin.group.store')}}" method="post" id="f1">
        @csrf

        <div class="col-md-3 form-group">
            <label for="title"> عنوان   </label>
            <input type="text" name="title" value="{{  old('title') }}" id="title" class="form-control">
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
