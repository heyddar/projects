@extends('admin.component')
@section('meta')
    <title> ویرایش پست - {{$post->title}} </title>

@endsection
@section('content2')
    <div class="container">
        <div class="card card-body">

            <h2 class="text-primary"> ویرایش پست  </h2>

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
            <form class="row justify-content-right" action="{{route('admin.post.update',['post'=>$post->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="col-md-3 form-group ">
                    <label for="title"> عنوان  </label>
                    <input type="text" name="title" value="{{old('title') ?? $post->title ?? null}}" id="title" class="form-control">
                </div>
                <div class="col-md-3 form-group text-right" style="right: 50%;">
                    <label for="image"> تصویرشاخص  </label>
                    <input type="file" name="image"  value="{{old('image') ?? $post->image ?? null}}" id="image" class="form-control">
                </div>
                <div class="w-100"><br></div>

                <div class="form-group w-75">
                    <label class="control-label" for="summary"> خلاصه</label>
                    <textarea class="form-control"  id="summary" name="summary" rows="3" placeholder="وارد کردن خلاصه ...">
                        {{old('summary') ?? $post->summary ?? null}}
                    </textarea>
                </div>
                <div class="control-group hidden-phone w-50 col-md-10">
                    <label class="control-label" for="content1"> محتوا</label>
                    <div class="controls">
                        <textarea class="ckeditor"  id="content1" name="content1" rows="3">
                            {{old('content1') ?? $post->content ?? null}}
                        </textarea>
                    </div>
                </div>
                <div class="row col-md-12 mt-3">
                 <div class="form-group col-md-4">
                     <label>انتخاب دسته بندی</label>
                     <select class="form-control" name="group_id" >
                         @foreach($groups as $group)
                             <option value="{{$group->id}}" {{ !empty($post->group_id) && ($post->group_id === $group->id) ? 'selected' : '' }}>{{$group->title}}</option>
                         @endforeach
                     </select>
                 </div>
                 <div class="col-lg-4">
                     <h6>انتخاب کلمه کلیدی</h6>
                     <div class="form-group">
                         <select name="tags[]" id="tag_list"
                                 class="form-control"
                                 multiple="multiple" >
                                 @foreach($tags as $tag)
                                 <option value="{{ $tag->name }}" @if(isset($post) && in_array($tag['id'], $post->tags->pluck('id')->toArray(), true)) selected @endif >{{$tag->name}}</option>
                                 @endforeach

                         </select>
                     </div>
                 </div>
             </div>
                @if(\Illuminate\Support\Facades\Auth::user()->can('commenting'))
                <div class="row col-md-12">
                    <div class="col-md-4 form-group" >

                        <label class="d-block">وضعیت  </label>

                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="status" value="1" class="custom-control-input" @if ($post->status == '1') checked @endif>
                            <span class="custom-control-label">
                        <span class="mr-4"> انتشار </span>
                    </span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="status" value="0" class="custom-control-input" @if ($post->status == '0') checked @endif>
                            <span class="custom-control-label">
                        <span class="mr-4"> پیشنویس </span>
                    </span>
                        </label>

                    </div>
                    <div class="col-md-4 form-group" >

                        <label class="d-block">امکان نظردهی </label>

                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="has_comment" value="1" class="custom-control-input" @if ($post->has_comment == '1') checked @endif>
                            <span class="custom-control-label">
                        <span class="mr-4"> بله </span>
                    </span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="has_comment" value="0" class="custom-control-input" @if ($post->has_comment == '0') checked @endif>
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