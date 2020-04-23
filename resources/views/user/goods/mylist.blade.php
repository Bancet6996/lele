<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lele - Tawaran</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('about/lele.png') }}">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    

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
        @if(session()->has('message'))
            <div class="alert alert-info alert-dismissible" role="alert">
                {!! session()->get('message') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url({{ asset('tmart/images/bg/2.jpg') }}) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Daftar Tawaran</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="/">Beranda</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Tawaran</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @if ($cek_riwayat != 0)
                        <div class="section__title text-center mb--50">
                            <h2 class="title__line">Daftar Tawaran</h2>
                        </div>
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Gambar Barang</th>
                                            <th class="product-name">Nama Barang</th>
                                            <th class="product-price">Harga Awal</th>
                                            <th class="product-quantity">Nominal Tawaranmu</th>
                                            <th class="product-subtotal">Tawaran Tertinggi</th>
                                            <th class="product-remove">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($riwayat as $rwt)
                                            <tr>
                                                <td class="product-thumbnail"><a href="/lelangan/{{ $rwt->id }}"><img src="{{ asset('gambar_barang/'. $rwt->gambar_barang) }}" alt="{{ $rwt->nama_barang }}"/></a></td>
                                                <td class="product-name"><a href="/lelangan/{{ $rwt->id }}">{{ $rwt->nama_barang }}</a></td>
                                                <td class="product-subtotal">@rupiah($rwt->harga_awal)</td>
                                                <td class="product-subtotal">@rupiah($rwt->nominal)</td>
                                                <td class="product-subtotal">@rupiah(\App\Http\Controllers\LelangController::tawaranTertinggi($rwt->id))</td>
                                                <td class="product-remove">
                                                    <form action="/lelangan/{{ $rwt->id }}/batal" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-block tawar">Batal</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div style="text-align: center; font-size: 1rem">Situ belum menawar barang apapun, gih cari barang dan tawarkan dengan harga paling top !!</div>
                        @endif
                    </div>
                </div>
                @if ($cek_riwayatt != 0)
                <br>
                <div class="section__title text-center mb--50">
                    <h2 class="title__line">Hasil Tawaran</h2>
                </div>
                <div class="row">
                    <div class="blog__wrap blog--page clearfix">
                        @foreach ($riwayatt as $rwtt)
                        <!-- Start Single Blog -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="blog foo">
                                <div class="blog__inner">
                                    <div class="blog__thumb">
                                        <a href="/lelangan/{{ $rwtt->id }}">
                                            <img src="{{ asset('gambar_barang/'. $rwtt->gambar_barang) }}" alt="{{ $rwtt->nama_barang }}" style="width: 370px; height: 347px;">
                                        </a>
                                        <div class="blog__post__time"  style="background-color: @if (\App\Http\Controllers\LelangController::menang(auth()->user()->id, $rwtt->id)) rgba(119, 255, 119, 0.49) @elseif(\App\Http\Controllers\LelangController::kalah($rwtt->id)) rgba(255, 119, 119, 0.49); @else rgba(119, 119, 255, 0.49); @endif">
                                            <div class="post__time--inner">
                                                <span class="date">
                                                    @if (\App\Http\Controllers\LelangController::menang(auth()->user()->id, $rwtt->id))
                                                        Menang
                                                    @elseif(\App\Http\Controllers\LelangController::kalah($rwtt->id))
                                                        Kalah
                                                    @else
                                                        Menunggu
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog__hover__info">
                                        <div class="blog__hover__action">
                                            <p class="blog__des"><a href="/lelangan/{{ $rwtt->id }}">{{ $rwtt->nama_barang }}</a></p>
                                            <ul class="bl__meta">
                                                <li>@rupiah($rwtt->nominal)</li>
                                            </ul>
                                            <div class="blog__btn">
                                                <a class="read__more__btn" href="/lelangan/{{ $rwtt->id }}">Lihat Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                        @endforeach
                    </div>
                </div>
                @else
            
                @endif
            </div>
        </div>
        
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