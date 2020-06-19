@extends('admin.component')
@section('meta')
    <title> ویرایش محصول - {{$product->name}} </title>

@endsection
@section('content2')
    <div class="container">
        <div class="card card-body">

            <h2 class="text-primary"> افزودن محصول  </h2>

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
            <form class="row justify-content-right" action="{{route('admin.product.update',['product'=>$product->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-3 form-group ">
                    <label for="name"> نام  </label>
                    <input type="text" name="name" value="{{old('name') ?? $product->name ?? null}}" id="name" class="form-control">
                </div>
                <div class="col-md-3 form-group text-right" style="right: 50%;">
                    <label for="image"> تصویرشاخص  </label>
                    <input type="file" name="image"  value="{{old('image') ?? $product->image ?? null}}" id="image" class="form-control">
                </div>
                <div class="w-100"><br></div>

                <div class="form-group w-75">
                    <label class="control-label" for="short_description">توضیح کوتاه</label>
                    <textarea class="form-control"  id="short_description" name="short_description" rows="3" placeholder="وارد کردن اطلاعات ...">
                        {{old('short_description') ?? $product->short_description ?? null}}
                    </textarea>
                </div>
                <div class="control-group hidden-phone w-50 col-md-10">
                    <label class="control-label" for="long_description">توضیح بلند</label>
                    <div class="controls">
                        <textarea class="ckeditor"  id="long_description" name="long_description" rows="3">
                            {{old('long_description') ?? $product->long_description ?? null}}
                        </textarea>
                    </div>
                </div>
            <div class="row col-md-12">
                <div class="col-md-4 control-group">
                    <label class="control-label" for="price">قیمت</label>
                    <div class="controls">
                        <input type="number" class="input-xlarge " value="{{old('price') ?? $product->price ?? null}}" id="price"  name="price">
                    </div>
                </div>
                <div class="form-group col-md-4 ">
                    <label for="input_status" class="control-label w-100"> رنگ ها</label>
                    <select id="color_list" name="colors[]" class="form-control"  data-placeholder="  انتخاب کنید" multiple>
                        @foreach($colors as $color)
                            <option value="{{$color->id}}" @if(isset($product) && in_array($color['id'], $product->colors->pluck('id')->toArray(), true)) selected @endif>{{$color->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-4 ">
                    <label for="input_status" class="control-label w-100"> سایزها</label>
                    <select id="size_list" name="sizes[]"  class="form-control"  data-placeholder="  انتخاب کنید" multiple>


                    @foreach($sizes as $size)
                            <option value="{{$size->id}}" @if(isset($product) && in_array($size['id'], $product->sizes->pluck('id')->toArray(), true)) selected @endif >{{$size->title}}</option>

                        @endforeach
                    </select>
                </div>
            </div>
             <div class="row col-md-12">
                 <div class="form-group col-md-4">
                     <label>انتخاب دسته بندی</label>
                     <select class="form-control" name="category_id" >
                         @foreach($categories as $category)
                             <option value="{{$category->id}}" {{ !empty($product->category_id) && ($product->category_id === $category->id) ? 'selected' : '' }}>{{$category->title}}</option>
                         @endforeach
                     </select>
                 </div>
                 <div class="form-group col-md-4">
                     <label>انتخاب برند </label>
                     <select class="form-control" name="brand_id" >
                         @foreach($brands as $brand)
                             <option value="{{$brand->id}}" {{ !empty($product->brand_id) && ($product->brand_id === $brand->id) ? 'selected' : '' }}>{{$brand->title}}</option>
                         @endforeach
                     </select>
                 </div>
                 <div class="form-group col-md-4">
                     <label for="input_status" class="control-label">وضعیت موجودی </label>
                     <br>
                     @component('_components.bootstrap-select--single')

                         @slot('name') exist @endslot
                         @slot('search') false @endslot

                         @slot('options')
                             <option {{ !empty($product->exist) && $product->exist === 'yes' ? 'selected' : '' }} value="yes">
                                 موجود
                             </option>
                             <option {{ !empty($product->exist) && $product->exist === 'no' ? 'selected' : '' }} value="no">
                                 تمام شده
                             </option>
                         @endslot

                     @endcomponent
                 </div>
             </div>
              <div class="row col-md-12">
                  <div class="control-group col-md-4">
                      <label class="control-label" for="count">تعداد</label>
                      <div class="controls">
                          <input type="number" class="input-xlarge " value="{{$product->count}}" id="count"  name="count">
                      </div>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="input_status" class="control-label"> نوع </label>
                      <br>
                      @component('_components.bootstrap-select--single')

                          @slot('name') kind @endslot
                          @slot('search') false @endslot

                          @slot('options')
                              <option {{ !empty($product->kind) && $product->kind === 'special' ? 'selected' : '' }} value="special">
                                  ویژه
                              </option>
                              <option {{ !empty($product->kind) && $product->kind === 'popular' ? 'selected' : '' }} value="popular">
                                  محبوب
                              </option>
                              <option {{ !empty($product->kind) && $product->kind === 'new' ? 'selected' : '' }} value="new">
                                  جدید
                              </option>
                          @endslot

                      @endcomponent
                  </div>
                  <div class="col-md-4 form-group" >

                      <label class="d-block">وضعیت  </label>

                      <label class="custom-control custom-radio custom-control-inline">
                          <input type="radio" name="status" value="1" class="custom-control-input" @if ($product->status == '1') checked @endif>
                          <span class="custom-control-label">
                        <span class="mr-4"> انتشار </span>
                    </span>
                      </label>
                      <label class="custom-control custom-radio custom-control-inline">
                          <input type="radio" name="status" value="0" class="custom-control-input" @if ($product->status == '0') checked @endif>
                          <span class="custom-control-label">
                        <span class="mr-4"> پیشنویس </span>
                    </span>
                      </label>

                  </div>
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