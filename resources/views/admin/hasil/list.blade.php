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
    <title>Lele - Hasil</title>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Buat Laporan</h4>
                                <h6 class="card-subtitle">Silahkan pilih opsi di bawah untuk membuat laporan dengan format yang diinginkan.</h6>
                                <h6 class="card-subtitle">Jika ingin membuat laporan dengan format <i>.xlsx</i> atau <i>.pdf</i>, harap untuk menyalakan <i>Flash</i> pada halaman ini.</h6>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>ID Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Harga Awal</th>
                                                <th>Harga Akhir</th>
                                                <th>Pemenang</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($lelang as $llg)
                                                <tr>
                                                    <td>Lele-{{ $llg->id }}</td>
                                                    <td>{{ $llg->nama_barang }}</td>
                                                    <td>{{ $llg->harga_awal }}</td>
                                                    <td>{{ $llg->harga_akhir }}</td>
                                                    <td>{{ $llg->name }}</td>
                                                    <td>{{ \Carbon\Carbon::parse(strtotime($llg->created_at))->isoFormat('LLLL') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <script src="{{ asset('adminmart/src/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminmart/src/assets/libs/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminmart/src/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminmart/src/assets/libs/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminmart/src/assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('adminmart/src/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminmart/src/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminmart/src/assets/libs/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('adminmart/src/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('adminmart/src/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminmart/src/assets/libs/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('adminmart/src/assets/libs/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('adminmart/src/assets/libs/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('adminmart/src/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminmart/src/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script>
        $(document).ready(function() {
          $('#zero_config').DataTable( {
            dom: 'Bfrtip',
            paging: false,
            info: false,
            bFilter: false,
            buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
            ],
         } );
        } );
      </script>
</body>

</html>