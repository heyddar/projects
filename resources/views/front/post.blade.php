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
                            {{ Breadcrumbs::render('post', $post) }}

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
                <section class="span8 single single-post">
                    <article class="post format-video">
                        <div class="post-inner">
                            <img src="{{url($post->image)}}" width="620" height="349" >
                            <div class="post-title" style="margin-top: 10px">
                                <style>
                                    div.inline { float:right; }
                                </style>
{{--                                @if(\Illuminate\Support\Facades\Auth::check())--}}
{{--                                @if((\Illuminate\Support\Facades\Auth::user()->id == $post_like->user_id))--}}
                                <div class="row" >
                                    <div class="inline">
                                        <a href="{{route('post.like',['post'=>$post->id])}}">
                                            <i class="fa fa-thumbs-up" style="font-size: 1.5rem;color: blue"></i>
                                        </a>
                                        <?php
                                        if(Session::get('msglike')){
                                            echo'<p class="alert alert-success">';
                                            echo Session::get('msglike');
                                            echo'</p>';
                                            Session::put('msglike',null);
                                        }
                                        ?>
                                    </div>
                                    <div class="inline ">
                                        <p>{{count($likes)}}</p>
                                    </div>
                                    <div class="inline mr-3">
                                        <a href="{{route('post.dislike',['post'=>$post->id])}}">
                                            <i class="fa fa-thumbs-down" style="font-size: 1.5rem;color: red;margin-right: 3rem;"></i>
                                        </a>
                                    </div>

                                    <div class="inline">
                                        <p>{{count($dislikes)}}</p>
                                    </div>
                                </div>
                                <div>

                                    <li class="fa fa-eye"> {{$post->vzt()->count()}}</li>
                                </div>
                                <h2>{{$post->title}} </h2>
                                <div class="metadata">
                                    {{print_date($post->created_at)}}
                                    <br>
                                    <h6>
                                        نویسنده:<a title="View all posts in aciform" href="{{route('author',[$post->user->id,$post->user->name])}}">{{$post->user->name}}</a>
                                    </h6>
                                </div>
                            </div>
                            <p>
                                {{strip_tags($post->content)}}
                            </p>
                        </div>
                    </article>

                    <hr />
                    <section id="comments" class="comments-container">
                        <h3 class="push-down-25"><span class="light">{{count($comments)}}</span> نظر</h3>

                        <!--  ==========  -->
                        <!--  = Single Comment =  -->
                        <!--  ==========  -->
                        @foreach($comments as $comment)
                        <div class="single-comment clearfix">
                            <div class="comment-content">
                                <div class="comment-inner">
                                    <cite class="author-name">
                                       {{$comment->name}}
                                    </cite>
                                    <div class="metadata">
                                        {{print_date($comment->created_at)}}
                                    </div>
                                    <div class="comment-text">
                                        <p>
                                            {{$comment->content}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <hr />
                        @if($post->has_comment=='1')
                        @if(\Illuminate\Support\Facades\Auth::check())
                            <h3 class="push-down-25"><span class="light">نظر</span> بدهید</h3>

                            <div class="row col-md-12">
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
                           <form id="commentform" method="post" action="{{route('comment.store')}}" class="form form-inline form-comments">
                               @csrf
                               <input type="hidden" name="post_id" value="{{$post->id}}">
                               <div class="col-md-3">
                                   <p class="push-down-20">
                                       <label for="author">نام</label>

                                       <input type="text" aria-required="true" tabindex="1" size="30" value="{{\Illuminate\Support\Facades\Auth::user()->name}}" id="name" name="name" readonly>
                                   </p>
                               </div>
                               <div class="col-md-3">
                                   <p class="push-down-20">
                                       <label for="email">ایمیل</label>

                                       <input type="email" aria-required="true" tabindex="2" size="30" value="{{\Illuminate\Support\Facades\Auth::user()->email}}" id="email" name="email" readonly>
                                   </p>
                               </div>
                               <div class="w-100"></div>
                               <div class="col-md-3">
                                   <p class="push-down-20">
                                       <label for="title">عنوان<span class="red-clr bold">*</span></label>

                                       <input type="text" tabindex="3" size="30"  id="title" name="title">
                                   </p>
                               </div>
                               <div class="col-md-3">
                                   <p class="push-down-20">
                                       <textarea class="input-block-level" tabindex="4" rows="7" cols="70" id="content1" name="content1" placeholder="نظرتان را در اینجا بنویسید ..." >
                                       </textarea>
                                   </p>
                               </div>
                               {!! htmlFormSnippet() !!}

                               <div class="w-100"></div>
                               <p>
                                   <button class="btn btn-primary bold" type="submit" tabindex="5" id="submit">ارسال نظر</button>
                               </p>
                           </form>
                       </div>
                        @else
                            <h3 class="text-danger">برای ثبت نظر ابتدا باید وارد سایت شوید. </h3>
                        @endif
                        @endif
                    </section>

                </section>
                <aside class="span4 right-sidebar">
                    @if(! $post->tags->isEmpty())
                        <div class="content-box shadow-sm rounded mb-4">
                            <style>
                                .content-box{
                                    background-color: #eeeef8;
                                    border-radius: 3px;
                                    padding: 1px;
                                    padding-right: 1rem;
                                    padding-bottom: 1rem;
                                }
                                .entry__tags{
                                    font-size: 1rem;
                                }
                            </style>
                            <h4 class="content-box__title content-box__title--red">برچسب‌ها</h4>

                            <div class="p-3">
                                @component('_components.show_tags')
                                    @slot('tags',$post->tags )
                                @endcomponent
                            </div>
                        </div>
                    @endif
                </aside>
            </div>
        </div>
    </div>
@endsection
