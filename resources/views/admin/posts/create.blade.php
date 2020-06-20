@extends('admin.component')
@section('meta')
    <title>افزودن پست جدید </title>

@endsection
@section('content2')
<div class="container">
 <div class="card card-body">

        <h2 class="text-primary"> افزودن پست جدید </h2>

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
    <form class="row justify-content-right" action="{{route('admin.post.store')}}" method="post" id="f1" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="author_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
        <div class="col-md-3 form-group ">
            <label for="title"> عنوان  </label>
            <input type="text" name="title" value="{{  old('title') }}" id="title" class="form-control">
        </div>
        <div class="col-md-3 form-group text-right" style="right: 50%;">
            <label for="image"> تصویرشاخص  </label>
            <input type="file" name="image" value="{{  old('image') }}" id="image" class="form-control">
        </div>
        <div class="w-100"><br></div>

        <div class="form-group w-75">
            <label class="control-label" for="summary"> خلاصه</label>
            <textarea class="form-control" id="summary" name="summary" rows="3" placeholder="وارد کردن خلاصه پست ...">
                {{  old('summary') }}
            </textarea>
        </div>
        <div class="control-group hidden-phone w-50 col-md-10">
            <label class="control-label" for="content1"> محتوا</label>
            <div class="controls">
                <textarea class="ckeditor" id="content1" name="content1" rows="3">
                                    {{  old('content1') }}

                </textarea>
            </div>
        </div>
        <div class="w-100"><br></div>
    <div class="row col-md-12">
        <div class="col-md-4 form-group ">
            <label>انتخاب دسته بندی</label>
            <select class="form-control" name="group_id" >
                @foreach($groups as $group)
                    <option value="{{$group->id}}">{{$group->title}}</option>
                @endforeach
            </select>
        </div>
    </div>
        <div class="w-100"></div>
        <div class="col-md-4 form-group">
            <select id="tag_list" name="tags[]" class="form-control" multiple="multiple">
                @foreach($tags as $tag)
                    <option value="{{$tag->name}}">{{$tag->name}}</option>
                @endforeach
            </select>
        </div>
    <div class="row col-md-12">
    </div>

        <div class="row col-md-12">
            @if(\Illuminate\Support\Facades\Auth::user()->can('post_status'))

            <div class="col-md-4 form-group" >
            <label class="d-block">وضعیت  </label>
            <label class="custom-control custom-radio custom-control-inline">
                <input type="radio" name="status" value="1" class="custom-control-input">
                <span class="custom-control-label">
                        <span class="mr-4"> انتشار </span>
                    </span>
            </label>
            <label class="custom-control custom-radio custom-control-inline">
                <input type="radio" name="status" value="0" class="custom-control-input">
                <span class="custom-control-label">
                        <span class="mr-4"> پیشنویس </span>
                    </span>
            </label>

        </div>
            @endif
            @if(\Illuminate\Support\Facades\Auth::user()->can('commenting'))

            <div class="col-md-4 form-group" >

            <label class="d-block">امکان نظردهی </label>

            <label class="custom-control custom-radio custom-control-inline">
                <input type="radio" name="has_comment" value="1" class="custom-control-input">
                <span class="custom-control-label">
                        <span class="mr-4"> بله </span>
                    </span>
            </label>
            <label class="custom-control custom-radio custom-control-inline">
                <input type="radio" name="has_comment" value="0" class="custom-control-input">
                <span class="custom-control-label">
                        <span class="mr-4"> خیر </span>
                    </span>
            </label>

        </div>
         </div>
        @endif
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
