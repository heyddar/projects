<!DOCTYPE html>
<!--[if lt IE 8]>      <html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    {!! SEO::generate() !!}

    @yield('title')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ProteusThemes">
    <link rel="stylesheet" href="{{asset('admin/plugins/font-awesome/css/font-awesome.min.css')}}">
{!! htmlScriptTagJsApi(/* $formId - INVISIBLE version only */) !!}

    <!--  Google Fonts  -->
    <link href='http://fonts.googleapis.com/css?family=Pacifico|Open+Sans:400,700,400italic,700italic&amp;subset=latin,latin-ext,greek' rel='stylesheet' type='text/css'>

    <!-- Twitter Bootstrap -->
    <link href="{{asset('front/stylesheets/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('front/stylesheets/responsive.css')}}" rel="stylesheet">
    <!-- Slider Revolution -->
    <link rel="stylesheet" href="{{asset('front/js/rs-plugin/css/settings.css')}}" type="text/css"/>
    <!-- jQuery UI -->
    <link rel="stylesheet" href="{{asset('front/js/jquery-ui-1.10.3/css/smoothness/jquery-ui-1.10.3.custom.min.css')}}" type="text/css"/>
    <!-- PrettyPhoto -->
    <link rel="stylesheet" href="{{asset('front/js/prettyphoto/css/prettyPhoto.css')}}" type="text/css"/>
    <!-- main styles -->

    <link href="{{asset('front/stylesheets/main.css')}}" rel="stylesheet">



    <!-- Modernizr -->
    <script src="{{asset('front/js/modernizr.custom.56918.js')}}"></script>

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('front/images/apple-touch/144.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('front/images/apple-touch/114.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('front/images/apple-touch/72.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('front/images/apple-touch/57.png')}}">
    <link rel="shortcut icon" href="{{asset('front/images/apple-touch/57.png')}}">
</head>
<body class="">
<div class="master-wrapper">

    <!--  ==========  -->
    <!--  = Header =  -->
    <!--  ==========  -->
    <header id="header">
        <div class="container">
            <div class="row">

                <!--  ==========  -->
                <!--  = Logo =  -->
                <!--  ==========  -->
                <div class="span7">
                    <a class="brand" href="#">
                        <img src="{{asset('front/images/logo.png')}}" alt="Webmarket Logo" width="48" height="48" />
                        <span class="pacifico">Webmarket</span>
                        <span class="tagline">فروشگاه وب مارکت</span>

                    </a>

                </div>

                <div class="span3" style="margin-top: 3%;">
                    <li class="fa fa-calendar"></li>
                    {{print_date(now())}}
                </div>
                <!--  ==========  -->
                <!--  = Social Icons =  -->
                <!--  ==========  -->
                <div class="span-5" style="margin-top: 3%;left: 30px;float: left;width: 8%;margin-bottom: 1%">

                    <div class="top-right">
                        <div class="register">
                            @guest
                            <a href="#loginModal" role="button" data-toggle="modal">ورود</a> یا
                            <a href="#registerModal" role="button" data-toggle="modal">ثبت نام</a>
                            @else
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link" data-toggle="dropdown" href="#">
                                            <i class="fa fa-user-circle"></i>
                                            {{ Auth::user()->name }}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left col-md-2" style="height: 9rem;direction: rtl;z-index: 10000;text-align: right;">
                                           @if(Auth::user()->can('panel'))
                                            <a id="navbarDropdown" href="{{route('admin.dashboard')}}" class="nav-link  fa fa-support text-right font-size-2"    >
                                               داشبورد
                                            </a>
                                            <hr class="w-100">
                                            @endif

                                               <a id="navbarDropdown" href="#editModal" role="button" class="nav-link  fa fa-edit text-right font-size-2" data-toggle="modal"  data-toggle="dropdown"  v-pre> ویرایش پروفایل</a>
                                            <hr class="w-100">
                                               <form action="{{ route('logout') }}" method="post">
                                                   @csrf
                                                   <button
                                                    class="dropdown-item text-right font-size-1">
                                                       <i class="fa fa-sign-out ml-2"></i>خروج
                                                   </button>
                                               </form>

                                        </div>

                                    </li>
                         @endguest
                                </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>






        @yield('content')

    <footer>


        @include('front.upper_footer')
        @include('front.middle_footer')
        @include('front.bottom_footer')



    </footer> <!-- /footer -->


    <!--  ==========  -->
    <!--  = Modal Windows =  -->
    <!--  ==========  -->

    <!--  = Login =  -->
    <div id="loginModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="loginModalLabel"><span class="light">ورود</span> در وبمارکت</h3>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">ایمیل</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">رمز عبور</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                مرا به خاطر بسپار
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            ورود
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                رمز عبور را فراموش کرده اید؟
                            </a>
                        @endif
                    </div>
                </div>
            </form>

        </div>
    </div>
{{--    <div id="editModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-header">--}}
{{--            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
{{--            <h3 id="editModalLabel"><span class="light">ویرایش پروفایل</span> در وبمارکت</h3>--}}
{{--        </div>--}}
{{--        <?php--}}
{{--        if(Session::get('msg')){--}}
{{--            echo'<p class="alert alert-success">';--}}
{{--            echo Session::get('msg');--}}
{{--            echo'</p>';--}}
{{--            Session::put('msg',null);--}}
{{--        }--}}
{{--        ?>--}}
{{--        <div class="modal-body">--}}
{{--            <form method="POST" action="{{ route('user.update') }}">--}}
{{--                @csrf--}}
{{--                @method('PUT')--}}
{{--                <div class="form-group row">--}}
{{--                    <label for="name" class="col-md-4 col-form-label text-md-right">نام کاربری</label>--}}

{{--                    <div class="col-md-6">--}}
{{--                        <input id="text" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? Auth::user()->name }}"  autocomplete="name" autofocus>--}}

{{--                        @error('email')--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label for="email" class="col-md-4 col-form-label text-md-right">ایمیل</label>--}}

{{--                    <div class="col-md-6">--}}
{{--                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? Auth::user()->email }}" r autocomplete="email" autofocus>--}}

{{--                        @error('email')--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="form-group row">--}}
{{--                    <label for="password" class="col-md-4 col-form-label text-md-right">   رمز عبور جدید</label>--}}

{{--                    <div class="col-md-6">--}}
{{--                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">--}}

{{--                        @error('password')--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="form-group row">--}}
{{--                    <div class="col-md-6 offset-md-4">--}}
{{--                        <div class="form-check">--}}
{{--                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                            <label class="form-check-label" for="remember">--}}
{{--                                مرا به خاطر بسپار--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="form-group row mb-0">--}}
{{--                    <div class="col-md-8 offset-md-4">--}}
{{--                        <button type="submit" class="btn btn-primary">--}}
{{--                            تایید--}}
{{--                        </button>--}}


{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}

{{--        </div>--}}
{{--    </div>--}}

    <!--  = Register =  -->
    <div id="registerModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="registerModalLabel"><span class="light">ثبت نام</span> در وبمارکت</h3>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">نام</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">ایمیل</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">رمز عبور</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">تکرار رمز عبور</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            ثبت نام
                        </button>
                    </div>
                </div>
            </form>
            <p class="center-align push-down-0">
                <a data-toggle="modal" role="button" href="#loginModal" data-dismiss="modal">قبلا ثبت نام کرده اید؟</a>
            </p>

        </div>
    </div>


</div> <!-- end of master-wrapper -->
<!--  ==========  -->
<!--  = JavaScript =  -->
<!--  ==========  -->
<!--  = FB =  -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=126780447403102";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!--  = jQuery - CDN with local fallback =  -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    if (typeof jQuery == 'undefined') {
        document.write('<script src="{{asset('front/js/jquery.min.js')}}"><\/script>');
    }
</script>

<!--  = _ =  -->
<script src="{{asset('front/js/underscore/underscore-min.js')}}" type="text/javascript"></script>

<!--  = Bootstrap =  -->
<script src="{{asset('front/js/bootstrap.min.js')}}" type="text/javascript"></script>

<!--  = Slider Revolution =  -->
<script src="{{asset('front/js/rs-plugin/pluginsources/jquery.themepunch.plugins.min.js')}}" type="text/javascript"></script>
<script src="{{asset('front/js/rs-plugin/js/jquery.themepunch.revolution.min.js')}}" type="text/javascript"></script>

<!--  = CarouFredSel =  -->
<script src="{{asset('front/js/jquery.carouFredSel-6.2.1-packed.js')}}" type="text/javascript"></script>

<!--  = jQuery UI =  -->
<script src="{{asset('front/js/jquery-ui-1.10.3/js/jquery-ui-1.10.3.custom.min.js')}}" type="text/javascript"></script>
<script src="{{asset('front/js/jquery-ui-1.10.3/touch-fix.min.js')}}" type="text/javascript"></script>

<!--  = Isotope =  -->
<script src="{{asset('front/js/isotope/jquery.isotope.min.js')}}" type="text/javascript"></script>

<!--  = Tour =  -->
<script src="{{asset('front/js/bootstrap-tour/build/js/bootstrap-tour.min.js')}}" type="text/javascript"></script>

<!--  = PrettyPhoto =  -->
<script src="{{asset('front/js/prettyphoto/js/jquery.prettyPhoto.js')}}" type="text/javascript"></script>

<!--  = Google Maps API =  -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="{{asset('front/js/goMap/js/jquery.gomap-1.3.2.min.js')}}"></script>

<!--  = Custom JS =  -->
<script src="{{asset('front/js/custom.js')}}" type="text/javascript"></script>

</body>
</html>


