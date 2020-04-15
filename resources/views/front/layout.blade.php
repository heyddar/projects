
<!DOCTYPE html>
<!--[if lt IE 8]>      <html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
   @yield('title')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ProteusThemes">

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

                <!--  ==========  -->
                <!--  = Social Icons =  -->
                <!--  ==========  -->
                        <div class="register" style="margin-top: 7%;left: 30px;float: left;width: 8%;">
                            @guest
                            <a class="nav-link" href="{{ route('login') }}" style="padding-left:1% ">ورود</a>
                                @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">ثبت نام</a>
                                @endif
                            @else
                                <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                                </ul>
                        </div>
            </div>
        </div>
    </header>

    <!--  ==========  -->





        @yield('content')
    <!--  ==========  -->
    <!--  = Footer =  -->
    <!--  ==========  -->
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
            <form method="post" action="#">
                <div class="control-group">
                    <label class="control-label hidden shown-ie8" for="inputEmail">نام کاربری</label>
                    <div class="controls">
                        <input type="text" class="input-block-level" id="inputEmail" placeholder="Username">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label hidden shown-ie8" for="inputPassword">رمز عبور</label>
                    <div class="controls">
                        <input type="password" class="input-block-level" id="inputPassword" placeholder="Password">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox">
                            <input type="checkbox">
                            مرا به خاطر بسپار
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary input-block-level bold higher">
                    ورود
                </button>
            </form>
            <p class="center-align push-down-0">
                <a href="#" data-dismiss="modal">رمز عبورتان را فراموش کرده اید؟</a>
            </p>
        </div>
    </div>

    <!--  = Register =  -->
    <div id="registerModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="registerModalLabel"><span class="light">ثبت نام</span> در وبمارکت</h3>
        </div>
        <div class="modal-body">
            <form method="post" action="#">
                <div class="control-group">
                    <label class="control-label hidden shown-ie8" for="inputUsernameRegister">نام کاربری</label>
                    <div class="controls">
                        <input type="text" class="input-block-level" id="inputUsernameRegister" placeholder="Username">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label hidden shown-ie8" for="inputEmailRegister">ایمیل</label>
                    <div class="controls">
                        <input type="email" class="input-block-level" id="inputEmailRegister" placeholder="Email">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label hidden shown-ie8" for="inputPasswordRegister">رمز عبور</label>
                    <div class="controls">
                        <input type="password" class="input-block-level" id="inputPasswordRegister" placeholder="Password">
                    </div>
                </div>
                <button type="submit" class="btn btn-danger input-block-level bold higher">
                    ثبت نام
                </button>
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


