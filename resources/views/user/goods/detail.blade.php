<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lele - Detail Barang</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('about/lele.png') }}">
    <link rel="apple-touch-icon" href="apple-touch-icon.png') }}">
    

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
    <style>
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none; 
            margin: 0; 
        }
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
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
                                <h2 class="bradcaump-title">Detail Barang</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="/">Beranda</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Detail</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Details -->
        <section class="htc__product__details pt--120 pb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-sm-8 col-xs-8">
                        <div class="product__details__container">
                            <div class="product__big__images">
                                <div class="portfolio-full-image tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active product-video-position" id="img-tab-1">
                                        <img src="{{ asset('gambar_barang/'. @$lelang->gambar_barang) }}" alt="{{ @$lelang->gambar_barang }}" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 smt-30 xmt-30">
                        <div class="htc__product__details__inner">
                            <div class="pro__detl__title">
                                <h2>{{ $lelang->nama_barang }}</h2>
                            </div>
                            <div class="pro__details">
                                <p>{{ $lelang->definisi_barang }}</p>
                            </div>
                            <ul class="pro__dtl__prize">
                                @if ($terbesar === null)
                                    <li data-toggle="tooltip" title="Harga Awal">@rupiah($lelang->harga_awal)</li>
                                @else                                    
                                    <li class="old__prize" data-toggle="tooltip" title="Harga Awal">@rupiah($lelang->harga_awal)</li>
                                    <li data-toggle="tooltip" title="Harga Tertinggi">@rupiah($terbesar)</li>
                                @endif
                            </ul>
                            @if (Auth::check() && auth()->user()->level === 'masyarakat')
                                @if (\App\Http\Controllers\LelangController::sudahDitutup($lelang->id))
                                    <div class="product-action-wrap">
                                        <div class="prodict-statas"><span>Pemenang :</span></div>
                                        <div class="product-quantity">
                                            {{ $lelang->name }}
                                        </div>
                                    </div>
                                @else
                                    @if (\App\Http\Controllers\LelangController::sudahNawar($lelang->id, auth()->user()->id))
                                        <ul class="pro__dtl__btn">
                                            <form action="/lelangan/{{ $lelang->id }}/batal" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="btn-group" role="group" aria-label="">
                                                    <input type="text" class="form-control" name="nominal" value="Tawaranmu : @rupiah(\App\Http\Controllers\LelangController::tawaran($lelang->id)->nominal)" readonly>
                                                    <br>
                                                    <button type="submit" class="btn btn-block tawar">Batal</button>
                                                </div>
                                            </form>
                                        </ul>
                                    @else
                                        <ul class="pro__dtl__btn">
                                            <form action="/lelangan/{{ $lelang->id }}/tawar" method="post">
                                                @csrf
                                                <div class="btn-group" role="group" aria-label="">
                                                    <input type="number" class="form-control" name="nominal">
                                                    <br>
                                                    <button type="submit" class="btn btn-block tawar">Tawar</button>
                                                </div>
                                            </form>
                                        </ul>
                                    @endif
                                @endif
                            @else
                                @if (\App\Http\Controllers\LelangController::sudahDitutup($lelang->id))
                                    <div class="product-action-wrap">
                                        <div class="prodict-statas"><span>Pemenang :</span></div>
                                        <div class="product-quantity">
                                            {{ $lelang->name }}
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Details -->
        <!-- Start Product tab -->
        <section class="htc__product__details__tab bg__white pb--120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <ul class="product__deatils__tab mb--60" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#deskripsi" role="tab" data-toggle="tab">Deskripsi</a>
                            </li>
                            <li role="presentation">
                                <a href="#tawaran" role="tab" data-toggle="tab">Tawaran</a>
                            </li>
                            <li role="presentation">
                                <a href="#diskusi" role="tab" data-toggle="tab">Diskusi</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="product__details__tab__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="deskripsi" class="product__tab__content fade in active">
                                <div class="product__description__wrap">
                                    <div class="product__desc">
                                        <h2 class="title__6">Detail {{ $lelang->nama_barang }}</h2>
                                        <p>{{ $lelang->deskripsi_barang }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Content -->
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="tawaran" class="product__tab__content fade">
                                <div class="pro__feature">
                                    @if ($cek_riwayat != 0)
                                        <h2 class="title__6">Riwayat Tawaran</h2>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                {{-- <thead>
                                                    <tr>
                                                        <th>Posisi</th>
                                                        <th>Penawar</th>
                                                        <th>Nominal Tawaran</th>
                                                        <th></th>
                                                    </tr>
                                                </thead> --}}
                                                <tbody>
                                                    @foreach ($riwayat as $rwt)
                                                        <tr>
                                                            <td>#{{ isset($i) ? ++ $i : $i = 1 }}</td>
                                                            <td>{{ $rwt->name }}</td>
                                                            <td>@rupiah($rwt->nominal)</td>
                                                            <td>{{ Carbon\Carbon::parse($rwt->created_at)->diffForHumans() }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        @if (auth()->user()->level != 'masyarakat')
                                            <div style="text-align: center; font-size: 1rem">Belum ada yang menawar barang ini</div>
                                            <div style="text-align: center; font-size: 1rem">Tunggu aja, sabar ya</div>
                                        @else
                                            <div style="text-align: center; font-size: 1rem">Belum ada yang menawar barang ini</div>
                                            <div style="text-align: center; font-size: 1rem">Tertarik ? Tawar aja langsung</div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <!-- End Single Content -->
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="diskusi" class="product__tab__content fade">
                                <div class="review__address__inner">
                                    @foreach ($pertanyaan as $pty)
                                        <!-- Top modal content -->
                                        <div id="edit-tanya-modal{{ $pty->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-top">
                                                <div class="modal-content">
                                                    <form action="/lelangan/{{ $pty->id }}/tanya/ubah" method="post">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="topModalLabel">Ubah Pertanyaan</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <textarea name="pertanyaan" rows="3" class="form-control">{{ $pty->pertanyaan }}</textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light"
                                                                data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-success">Jawab</button>
                                                        </div>
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                        <!-- Top modal content -->
                                        <div id="delete-tanya-modal{{ $pty->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-top">
                                                <div class="modal-content">
                                                    <form action="/lelangan/{{ $pty->id }}/tanya/hapus" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="topModalLabel">Hapus Jawaban</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div>Yakin ingin menghapus ?</div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light"
                                                                data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                        <!-- Top modal content -->
                                        <div id="jawab-modal{{ $pty->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-top">
                                                <div class="modal-content">
                                                    <form action="/lelangan/{{ $pty->id }}/jawab" method="post">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="topModalLabel">Jawab Pertanyaan {{ $pty->name }}</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <textarea name="jawaban" rows="3" class="form-control" placeholder="{{ $pty->pertanyaan }}"></textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light"
                                                                data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-success">Jawab</button>
                                                        </div>
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                        <!-- Start Single Review -->
                                        <div class="pro__review" @if (\App\Http\Controllers\DiskusiController::cekJawaban($pty->id) === 0) style="margin-bottom: 50px;" @endif>   
                                            <div class="review__details">
                                                <div class="review__info">
                                                    <h4><a href="#">{{ $pty->name }}</a></h4>
                                                    <div class="rating__send">
                                                        @if (Auth::check())
                                                            @if ($pty->id_user === auth()->user()->id)
                                                                @if (\App\Http\Controllers\DiskusiController::cekJawaban($pty->id) != 0)
                                                                    <button type="button" data-toggle="modal" data-target="#delete-tanya-modal{{ $pty->id }}"><i class="zmdi zmdi-close"></i></button>
                                                                @else
                                                                    <button type="button" data-toggle="modal" data-target="#edit-tanya-modal{{ $pty->id }}"><i class="zmdi zmdi-edit"></i></button>
                                                                    <button type="button" data-toggle="modal" data-target="#delete-tanya-modal{{ $pty->id }}"><i class="zmdi zmdi-close"></i></button>
                                                                @endif
                                                            @elseif(auth()->user()->level != 'masyarakat')
                                                                @if (\App\Http\Controllers\DiskusiController::cekJawaban($pty->id) != 0)
                                                                    
                                                                @else
                                                                    <button type="button" data-toggle="modal" data-target="#jawab-modal{{ $pty->id }}"><i class="zmdi zmdi-mail-reply"></i></button>    
                                                                @endif
                                                            @else

                                                            @endif
                                                        @else
                                                            
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="review__date">
                                                    <span>{{ \Carbon\Carbon::parse(strtotime($pty->created_at))->isoFormat('LLLL') }}</span>
                                                </div>
                                                <p>{{ $pty->pertanyaan }}</p>
                                            </div>
                                        </div>
                                        <!-- End Single Review -->
                                        @if (\App\Http\Controllers\DiskusiController::jawaban($pty->id))
                                            <!-- Top modal content -->
                                            <div id="edit-jawab-modal{{ \App\Http\Controllers\DiskusiController::jawaban($pty->id)->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-top">
                                                    <div class="modal-content">
                                                        <form action="/lelangan/{{ \App\Http\Controllers\DiskusiController::jawaban($pty->id)->id }}/jawab/ubah" method="post">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="topModalLabel">Ubah Jawaban</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <textarea name="jawaban" rows="3" class="form-control">{{ \App\Http\Controllers\DiskusiController::jawaban($pty->id)->jawaban }}</textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light"
                                                                    data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-success">Jawab</button>
                                                            </div>
                                                        </form>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                            <!-- Top modal content -->
                                            <div id="delete-jawab-modal{{ \App\Http\Controllers\DiskusiController::jawaban($pty->id)->id  }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-top">
                                                    <div class="modal-content">
                                                        <form action="/lelangan/{{ \App\Http\Controllers\DiskusiController::jawaban($pty->id)->id }}/jawab/hapus" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="topModalLabel">Hapus Jawaban</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div>Yakin ingin menghapus ?</div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light"
                                                                    data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                            <!-- Start Single Review -->
                                            <div class="pro__review ans">
                                                <div class="review__details">
                                                    <div class="review__info">
                                                        {{-- <h4><a href="#">{{ \App\Http\Controllers\DiskusiController::jawaban($pty->id)->name }}</a></h4> --}}
                                                        <h4><a href="#">Lele ~</a></h4>
                                                        <div class="rating__send">
                                                            @if (auth()->check() && auth()->user()->level != 'masyarakat')
                                                                <button type="button" data-toggle="modal" data-target="#edit-jawab-modal{{ \App\Http\Controllers\DiskusiController::jawaban($pty->id)->id }}"><i class="zmdi zmdi-edit"></i></button>
                                                                <button type="button" data-toggle="modal" data-target="#delete-jawab-modal{{ \App\Http\Controllers\DiskusiController::jawaban($pty->id)->id }}"><i class="zmdi zmdi-close"></i></button>
                                                            @else
                                                                
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="review__date">
                                                        <span>{{ \Carbon\Carbon::parse(strtotime(\App\Http\Controllers\DiskusiController::jawaban($pty->id)->created_at))->isoFormat('LLLL') }}</span>
                                                    </div>
                                                    <p>{{ \App\Http\Controllers\DiskusiController::jawaban($pty->id)->jawaban }}</p>
                                                </div>
                                            </div>
                                            <!-- End Single Review -->
                                        @else
                                            
                                        @endif
                                    @endforeach
                                </div>
                                @if (Auth::check())
                                    @if (auth()->user()->level != 'masyarakat')
                                        
                                    @else
                                        <!-- Start RAting Area -->
                                        <div class="rating__wrap">
                                            <h2 class="rating-title">Tulis Pertanyaan</h2>
                                        </div>
                                        <!-- End RAting Area -->
                                        <div class="review__box">
                                            <form id="review-form" action="/lelangan/{{ $lelang->id }}/tanya" method="POST">
                                                @csrf
                                                <div class="single-review-form">
                                                    <div class="review-box message">
                                                        <textarea name="pertanyaan" placeholder="Tulis pertanyaanmu disini terkait barang ini jika ada hal yang ingin ditanyakan" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="review-btn">
                                                    <button type="submit" class="fv-btn">Kirim</button>
                                                </div>
                                            </form>                                
                                        </div>
                                    @endif
                                @else
                                    
                                @endif
                            </div>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product tab -->

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