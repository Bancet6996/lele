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
    <title>Lele - Dashboard</title>
    <!-- Custom CSS -->
    <link href="{{ asset('adminmart/src/assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminmart/src/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
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
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        
        @include('admin/blueprints/header')

        @include('admin/blueprints/sidebar')

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">@if($jam < 11) Selamat Pagi @elseif($jam >= 11 && $jam < 15) Selamat Siang @elseif($jam >= 15 && $jam < 18) Selamat Sore @else Selamat Malam @endif {{ auth()->user()->name }}!</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- *************************************************************** -->
                <div class="card-group">
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium">{{ $masyarakat }}</h2>
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Masyarakat</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                            class="set-doller">Rp.</sup>{{ $pendapatan }}</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Pendapatan
                                    </h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium">{{ $dibuka }}</h2>
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Barang dibuka</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="check-square"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-dark mb-1 font-weight-medium">{{ $barang }}</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Barang</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="box"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End First Cards -->
                <!-- *************************************************************** -->
                <!-- *************************************************************** -->
                <!-- Start Location and Earnings Charts Section -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <h4 class="card-title">Tawaran Terbaru dari Masyarakat</h4>
                                    <div class="ml-auto">
                                        <div class="dropdown sub-dropdown">
                                            <button class="btn btn-link text-muted dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @if ($cek_riwayat != 0)
                                    <div class="table-responsive">
                                        <table class="table no-wrap v-middle mb-0">
                                            <thead>
                                                <tr class="border-0">
                                                    <th class="border-0 font-14 font-weight-medium text-muted">Barang</th>
                                                    <th class="border-0 font-14 font-weight-medium text-muted">Penawar</th>
                                                    <th class="border-0 font-14 font-weight-medium text-muted text-center">Nominal Tawaran</th>
                                                    <th class="border-0 font-14 font-weight-medium text-muted text-center">Harga Tertinggi</th>
                                                    <th class="border-0 font-14 font-weight-medium text-muted text-center">Total Orang yang Menawar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($riwayat->take(7) as $rwt)
                                                    <tr>
                                                        <td class="border-top-0 px-2 py-4">
                                                            <div class="d-flex no-block align-items-center">
                                                                <div class="mr-3">
                                                                    <img src="{{ asset('gambar_barang/'. $rwt->gambar_barang) }}" alt="{{ $rwt->nama_barang }}" class="rounded-circle" width="45" height="45" />
                                                                </div>
                                                                <div class="">
                                                                    <h5 class="text-dark mb-0 font-16 font-weight-medium">{{ $rwt->nama_barang }}</h5>
                                                                    <span class="text-muted font-14">Rp.{{ $rwt->harga_awal }}</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="border-top-0 text-muted px-2 py-4 font-14">{{ $rwt->nama_penawar }}</td>
                                                        <td class="font-weight-medium text-center text-dark border-top-0 px-2 py-4">Rp.{{ $rwt->nominal }}</td>
                                                        <td class="font-weight-medium text-center text-dark border-top-0 px-2 py-4">Rp.{{ \App\Http\Controllers\LelangController::tawaranTertinggi($rwt->id) }}</td>
                                                        <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4">{{ \App\Http\Controllers\LelangController::orangMenawar($rwt->id) }} Orang</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else    
                                    <div>Belum ada penawaran untuk saat ini</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End Location and Earnings Charts Section -->
                <!-- *************************************************************** -->
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
    <script src="{{ asset('adminmart/src/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('adminmart/src/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="{{ asset('adminmart/src/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('adminmart/src/dist/js/feather.min.js') }}"></script>
    <script src="{{ asset('adminmart/src/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('adminmart/src/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('adminmart/src/dist/js/custom.min.js') }}"></script>
    <!--This page JavaScript -->
    <script src="{{ asset('adminmart/src/assets/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('adminmart/src/assets/extra-libs/c3/c3.min.js') }}"></script>
    <script src="{{ asset('adminmart/src/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('adminmart/src/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}"></script>
</body>

</html>