<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lele - Login Register</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('about/lele.png') }}">
    <link rel="apple-touch-icon" href="apple-touch-icon.png') }}">
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{ asset('tmart/css/bootstrap.min.css') }}">
    <!-- This core.css') }} file contents all plugings css file. -->
    <link rel="stylesheet" href="{{ asset('tmart/css/core.css') }}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{ asset('tmart/css/shortcode/shortcodes.css') }}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{ asset('tmart/style.css') }}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('tmart/css/responsive.css') }}">
    <!-- User style -->
    <link rel="stylesheet" href="{{ asset('tmart/css/custom.css') }}">

    <style>
        #scrollUp{
            visibility: hidden;
            display: none;
        }
    </style>

    <!-- Modernizr JS -->
    <script src="{{ asset('tmart/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        
        @include('user/blueprints/header')
        
        <!-- Start Login Register Area -->
        <div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0) url({{ asset('tmart/images/bg/5.jpg') }}) no-repeat scroll center center / cover ;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <ul class="login__register__menu" role="tablist">
                            <li role="presentation" class="login active"><a href="#login" role="tab" data-toggle="tab">Login</a></li>
                            <li role="presentation" class="register"><a href="#register" role="tab" data-toggle="tab">Register</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Start Login Register Content -->
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="htc__login__register__wrap">
                            <!-- Start Single Content -->
                            <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                                <form class="login" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <input placeholder="Email" id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    
                                    <input placeholder="Password" id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <button type="submit" class="htc__login__btn mt--30">Login</button>
                                </form>
                                {{-- <div class="htc__social__connect">
                                    <h2>Or Login With</h2>
                                    <ul class="htc__soaial__list">
                                        <li><a class="bg--twitter" href="#"><i class="zmdi zmdi-twitter"></i></a></li>

                                        <li><a class="bg--instagram" href="#"><i class="zmdi zmdi-instagram"></i></a></li>

                                        <li><a class="bg--facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>

                                        <li><a class="bg--googleplus" href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                                    </ul>
                                </div> --}}
                            </div>
                            <!-- End Single Content -->
                            <!-- Start Single Content -->
                            <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade">
                                <form class="login" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <input placeholder="Nama" id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    <input placeholder="Email" id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    <input placeholder="Password" id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    <input placeholder="Konfirmasi Password" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                                    <button type="submit" class="htc__login__btn mt--30">Register</button>
                                </form>
                                <div class="htc__social__connect">
                                    <h2></h2>
                                    <ul class="htc__soaial__list">
                                        <li><a class="" href="#"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
                <!-- End Login Register Content -->
            </div>
        </div>
        <!-- End Login Register Area -->
        
        @include('user/blueprints/footer')

    </div>
    <!-- Body main wrapper end -->
    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="{{ asset('tmart/js/vendor/jquery-1.12.0.min.js') }}"></script>
    <!-- Bootstrap framework js -->
    <script src="{{ asset('tmart/js/bootstrap.min.js') }}"></script>
    <!-- All js plugins included in this file. -->
    <script src="{{ asset('tmart/js/plugins.js') }}"></script>
    <script src="{{ asset('tmart/js/slick.min.js') }}"></script>
    <script src="{{ asset('tmart/js/owl.carousel.min.js') }}"></script>
    <!-- Waypoints.min.js') }}. -->
    <script src="{{ asset('tmart/js/waypoints.min.js') }}"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{ asset('tmart/js/main.js') }}"></script>

</body>

</html>