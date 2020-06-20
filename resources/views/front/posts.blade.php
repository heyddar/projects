@extends('front.layout')
@section('title')
    <title>وب مارکت</title>
@endsection
@section('content')
    @include('front.main_menu')
    <div class="darker-stripe">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <ul class="breadcrumb">

                        <li >
                            {{ Breadcrumbs::render('blog') }}

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="push-up top-equal blocks-spacer">
            <div class="row">
                <div class="span12">
                    <div class="title-area">
                        <h1 class="inline"><span class="light">بلاگ</span> وبمارکت</h1>
                        <h2 class="inline tagline">- جایی که آدمهای باهوش، حرفهای احمقانه میزنند!</h2>
                    </div>
                </div>
{{--                <div class="filter-box filter-box--1 mb-2 clearfix">--}}
{{--                    <form role="search" method="GET" action="{{route('post.index')}}">--}}
{{--                        <ul class="search-news">--}}
{{--                            <li class="form-group input-group-sm">--}}
{{--                                <label for="bookName">کلیدواژه</label>--}}
{{--                                <input value="{{ old('title') }}" type="text" class="form-control"--}}
{{--                                       name="title" id="bookName">--}}
{{--                            </li>--}}

{{--                            @if(isset($filter))--}}
{{--                                <input type="hidden" name="filter" value="{{ $filter }}">--}}
{{--                            @endif--}}





{{--                        </ul>--}}

{{--                        <button class="btn btn-outline-secondary" id="btn-filter" type="submit"><i--}}
{{--                                    class="fa fa-search"></i> جستجو--}}
{{--                        </button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--                {{$return}}--}}
                <section class="span8 blog">
                    @foreach($posts as $post)
                    <article class="post format-image">
                        <div class="post-inner">
                            <a href="blog-single.html"><img src="{{url($post->image)}}" alt="featured image" width="1540" height="746" /></a>
                            <div class="post-title">
                                <h2>{{$post->title}}</h2>
                                <div class="metadata">
                                    {{print_date($post->created_at)}}
                                    <br>
                                    <h6>
                                        نویسنده:<a title="View all posts in aciform" href="#">{{$post->user->name}}</a>
                                    </h6>
                                </div>
                            </div>

                            <p class="push-down-25">
                                {{str_limit($post->summary,100)}}
                            </p>

                            <a href="{{route('post.show',[$post->id,'/',$post->title])}}" class="btn btn-primary bold higher">ادامه مطلب</a>
                        </div>
                    </article>
                    @endforeach
                    <div class="pagination">
                        {{$posts->links()}}
                    </div>
                </section>
                <aside class="span4 right-sidebar">
                    <div class="sidebar-item widget_search">
                        <form class="form" action="#" id="searchform" method="get" role="search">
                            <input type="text" id="appendedInputButton" class="input-block-level" name="s" placeholder="جستجو در نوشته ها ...">
                            <button type="submit">
                                <i class="icon-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="sidebar-item widget_archive">
                        <div class="underlined">
                            <h3>دسته بندی ها</h3>
                        </div>
                        @foreach($groups as $group)
                        <ul>
                            <li><a href="{{route('groups',['group'=>$group->id,str_slug($group->title)])}}">{{$group->title}} </a></li>
                        </ul>
                        @endforeach
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection
