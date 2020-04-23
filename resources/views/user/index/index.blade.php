<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lele - Beranda</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('about/lele.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('tmart/apple-touch-icon.png') }}">
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{ asset('tmart/css/bootstrap.min.css') }}">
    <!-- Owl Carousel main css -->
    <link rel="stylesheet" href="{{ asset('tmart/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tmart/css/owl.theme.default.min.css') }}">
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

        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url({{asset('tmart/images/bg/2.jpg') }}) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Selamat Datang di Lele ~</h2>
                                {{-- <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Shop Page</span>
                                </nav> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area --> 
        <!-- Start Our Product Area -->
        <section class="htc__product__area shop__page ptb--130 bg__white">
            <div class="container">
                @if ($cek_lelang != 0)
                    <div class="htc__product__container">
                        <!-- Start Product Menu -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="filter__menu__container">
                                    <div class="product__menu">
                                        <button data-filter="*" class="is-checked">Semua</button>
                                        @foreach ($kategori as $ktg)                                        
                                            <button data-filter=".{{ $ktg->nama_kategori }}">{{ $ktg->nama_kategori }}</button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Product MEnu -->
                        <div class="row">
                            <div class="product__list another-product-style">
                                @foreach ($lelang as $llg)
                                <!-- Start Single Product -->
                                <div class="col-md-3 single__pro col-lg-3 {{ $llg->kategori }} col-sm-4 col-xs-12">
                                    <div class="product foo">
                                        <div class="product__inner">
                                            <div class="pro__thumb">
                                                <a href="/lelangan/{{ $llg->id }}">
                                                    <img src="{{ asset('gambar_barang/'. $llg->gambar_barang) }}" alt="{{ $llg->nama_barang }}" style="width: 270px; height: 270px;">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product__details">
                                            <h2><a href="/lelangan/{{ $llg->id }}">{{ $llg->nama_barang }}</a></h2>
                                            <ul class="product__price">
                                                @if (\App\Http\Controllers\LelangController::sudahAda($llg->id))
                                                    <li class="old__price" data-toggle="tooltip" title="Harga Awal">@rupiah($llg->harga_awal)</li>
                                                    <li class="new__price" data-toggle="tooltip" title="Harga Tertinggi">@rupiah(\App\Http\Controllers\LelangController::tawaranTertinggi($llg->id))</li>
                                                @else
                                                    <li class="new__price" data-toggle="tooltip" title="Harga Awal">@rupiah($llg->harga_awal)</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                                @endforeach
                            </div>
                        </div>
                        {{-- <!-- Start Load More BTn -->
                        <div class="row mt--60">
                            <div class="col-md-12">
                                <div class="htc__loadmore__btn">
                                    <a href="#">load more</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Load More BTn --> --}}
                    </div>
                @else
                    <div class="htc__product__container">
                        <div class="row">
                            <div class="col">
                                <div class="text-center" style="font-size: 1.1rem">Belum ada barang yang dilelang untuk saat ini</div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
        <!-- End Our Product Area -->

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