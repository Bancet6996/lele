<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('about/lele.png') }}">
    <title>Lele - Lelang</title>
    <!-- This page plugin CSS -->
    <link href="{{ asset('adminmart/src/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('adminmart/src/dist/css/style.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        
        @include('admin/blueprints/header')

        @include('admin/blueprints/sidebar')

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            
            @if(session()->has('message'))
            <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            
            @include('admin/blueprints/breadcrumb')

            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- basic table -->
                <div class="row">
                    @if ($cek_lelang != 0)
                        @foreach ($lelang as $llg)
                            <div class="col-4">
                                <!-- Card -->
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="{{ asset('gambar_barang/'. $llg->gambar_barang) }}" alt="{{ $llg->nama_barang }}" style="height: 35vh;">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $llg->nama_barang }}</h4>
                                        <p class="card-text">
                                            <table>
                                                <tr>
                                                    <td>Awal</td>
                                                    <td>: {{ $llg->harga_awal }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Tertinggi</td>
                                                    @if (\App\Http\Controllers\LelangController::sudahAda($llg->id))
                                                        <td>: {{ \App\Http\Controllers\LelangController::tawaranTertinggi($llg->id) }}</td>
                                                    @else
                                                        <td>: Belum ada tawaran</td>
                                                    @endif
                                                </tr>
                                            </table>
                                        </p>
                                        @if (\App\Http\Controllers\LelangController::sudahAda($llg->id))
                                            <div id="tutup-modal{{ $llg->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-top">
                                                    <div class="modal-content">
                                                        <form action="/barang/tutup/{{ $llg->id }}" method="post">
                                                            @method('PATCH')
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="topModalLabel">Hapus Barang</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div>Yakin ingin menutup {{ $llg->nama_barang }} dari daftar lelangan ?</div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light"
                                                                    data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-success">Tutup</button>
                                                            </div>
                                                        </form>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                            <button type="button" class="btn btn-outline-success btn-block" data-toggle="modal" data-target="#tutup-modal{{ $llg->id }}">Tutup</button>
                                        @else
                                            <form action="/barang/batal/{{ $llg->id }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger btn-block">Batal</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                        @endforeach
                    @else
                        @if ($cek_barang != 0)
                            <div class="col-12 mt-4">
                                <!-- Card -->
                                <div class="card text-center">
                                    <div class="card-header">Tidak ada barang yang dibuka</div>
                                    <div class="card-body">
                                        <h4 class="card-title">Daftar lelangan kosong, silahkan buka barang untuk dilelang</h4>
                                    </div>
                                    <div class="card-footer text-muted"><a href="/barang">Buka disini</a></div>
                                </div>
                                <!-- Card -->
                            </div>
                        @else
                            <div class="col-12 mt-4">
                                <!-- Card -->
                                <div class="card text-center">
                                    <div class="card-header">Tidak ada barang sama sekali</div>
                                    <div class="card-body">
                                        <h4 class="card-title">Daftar lelangan kosong, mohon untuk menambahkan barang dan membuka barang tersebut</h4>
                                    </div>
                                    <div class="card-footer text-muted"><a href="/barang/tambah">Tambah barang disini</a></div>
                                </div>
                                <!-- Card -->
                            </div>
                        @endif
                    @endif
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                All Rights Reserved by Adminmart. Designed and Developed by <a
                    href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('adminmart/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('adminmart/src/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('adminmart/src/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="{{ asset('adminmart/src/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('adminmart/src/dist/js/feather.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('adminmart/src/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('adminmart/src/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <!-- themejs -->
    <!--Menu sidebar -->
    <script src="{{ asset('adminmart/src/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('adminmart/src/dist/js/custom.min.js') }}"></script>
    <!--This page plugins -->
    <script src="{{ asset('adminmart/src/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminmart/src/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
</body>

</html>