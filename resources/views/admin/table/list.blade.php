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
    <title>Lele - Data</title>
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
                {!! session()->get('message') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                {{-- <h4 class="card-title">Zero Configuration</h4>
                                <h6 class="card-subtitle">DataTables has most features enabled by default, so all you
                                    need to do to use it with your own tables is to call the construction
                                    function:<code> $().DataTable();</code>. You can refer full documentation from here
                                    <a href="https://datatables.net/">Datatables</a></h6> --}}
                                <div class="table-responsive">
                                    @if (Request::path() === 'barang')
                                        <table id="zero_config1" class="table table-striped table-bordered no-wrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Gambar Barang</th>
                                                    <th>Nama Barang</th>
                                                    <th>Harga Awal</th>
                                                    @if (auth()->user()->level === 'petugas')
                                                        <th>Oleh</th>
                                                    @endif
                                                    <th>Aksi</th>
                                                </tr>   
                                            </thead>
                                            <tbody>
                                                @foreach ($barang as $brg)
                                                    <div id="delete-modal{{ $brg->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-top">
                                                            <div class="modal-content">
                                                                <form action="/barang/{{ $brg->id }}/hapus" method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="topModalLabel">Hapus Barang</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div>Yakin ingin menghapus {{ $brg->nama_barang }} ?</div>
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
                                                    @if (auth()->user()->level === 'petugas')
                                                        <tr>
                                                            <td style="vertical-align: middle">{{ isset($i) ? ++ $i : $i = 1 }}</td>
                                                            <td style="vertical-align: middle; width: 20%"><img src="{{ $brg->gambar_barang }}" alt="{{ $brg->gambar_barang }}" style="width: 28%;" ></td>
                                                            <td style="vertical-align: middle">{{ $brg->nama_barang }}</td>
                                                            <td style="vertical-align: middle">{{ $brg->harga_awal }}</td>
                                                            <td style="vertical-align: middle">{{ $brg->name }}</td>
                                                            <td style="vertical-align: middle; text-align: center">
                                                                <div class="btn-group" role="group" aria-label="">
                                                                    @if (\App\Http\Controllers\LelangController::sudahDitutup($brg->id))
                                                                        <a href="lelangan/{{ $brg->id }}" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="far fa-share-square"></i></a>
                                                                    @else
                                                                        @if (\App\Http\Controllers\LelangController::sudahDibuka($brg->id))
                                                                            <a href="lelangan/{{ $brg->id }}" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="far fa-share-square"></i></a>
                                                                            <a href="barang/ubah/{{ $brg->id }}" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>
                                                                        @else
                                                                            <form action="barang/buka/{{ $brg->id }}" method="POST">
                                                                                @csrf
                                                                                <button type="submit" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Buka"><i class="far fa-check-circle"></i></button>
                                                                            </form>
                                                                            <a href="barang/ubah/{{ $brg->id }}" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>
                                                                        @endif
                                                                        <button type="button" data-tooltip="true" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-modal{{ $brg->id }}"><i class="far fa-trash-alt"></i></button>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td style="vertical-align: middle">{{ isset($i) ? ++ $i : $i = 1 }}</td>
                                                            <td style="vertical-align: middle"><img src="{{ $brg->gambar_barang }}" alt="{{ $brg->gambar_barang }}" style="width: 28%;" ></td>
                                                            <td style="vertical-align: middle">{{ $brg->nama_barang }}</td>
                                                            <td style="vertical-align: middle">{{ $brg->harga_awal }}</td>
                                                            <td style="vertical-align: middle; text-align: center">
                                                                <div class="btn-group" role="group" aria-label="">
                                                                    @if (\App\Http\Controllers\LelangController::sudahDibuka($brg->id))
                                                                        <a href="lelangan/{{ $brg->id }}" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="far fa-share-square"></i></a>
                                                                    @endif
                                                                    <a href="barang/ubah/{{ $brg->id }}" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>
                                                                    <button type="button" data-tooltip="true" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-modal{{ $brg->id }}"><i class="far fa-trash-alt"></i></button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @elseif(Request::path() === 'kategori')
                                        <!-- Top modal content -->
                                        <form action="/kategori/tambah" method="post">
                                            @csrf
                                            <div id="top-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-top">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="topModalLabel">Tambah Kategori</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="text" class="form-control" placeholder="Nama Kategori" name="nama_kategori" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light"
                                                                data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Kirim</button>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div>
                                        </form>
                                        <!-- /.modal -->
                                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                            <thead>
                                                <tr>
                                                    <th>Nomor</th>
                                                    <th>Nama Kategori</th>
                                                    <th>Aksi</th>
                                                </tr>   
                                            </thead>
                                            <tbody>
                                                @foreach ($kategori as $ktg)
                                                    <!-- Top modal content -->
                                                    <div id="edit-modal{{ $ktg->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-top">
                                                            <div class="modal-content">
                                                                <form action="/kategori/{{ $ktg->id }}/ubah" method="post">
                                                                    @csrf
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="topModalLabel">Ubah Kategori</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <input type="text" class="form-control" placeholder="Nama Kategori" name="nama_kategori" value="{{ old('nama_kategori', $ktg->nama_kategori) }}">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light"
                                                                            data-dismiss="modal">Batal</button>
                                                                        <button type="submit" class="btn btn-success">Simpan</button>
                                                                    </div>
                                                                </form>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->
                                                    <!-- Top modal content -->
                                                    <div id="delete-modal{{ $ktg->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-top">
                                                            <div class="modal-content">
                                                                <form action="/kategori/{{ $ktg->id }}/hapus" method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="topModalLabel">Hapus Kategori</h4>
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
                                                    <tr>
                                                        <td>{{ isset($i) ? ++ $i : $i = 1 }}</td>
                                                        <td>{{ $ktg->nama_kategori }}</td>
                                                        <td style="text-align: center">
                                                            <div class="btn-group" role="group" aria-label="">
                                                                <button type="button" data-tooltip="true" data-placement="top" title="Edit" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#edit-modal{{ $ktg->id }}"><i class="far fa-edit"></i></button>
                                                                <button type="button" data-tooltip="true" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-modal{{ $ktg->id }}"><i class="far fa-trash-alt"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>    
                                    @elseif(Request::path() === 'admin')
                                        <!-- Signup modal content -->
                                        <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-body">
                                                        <div class="text-center mt-2 mb-4">
                                                            <a href="/dashboard" class="text-success">
                                                                <span><img class="mr-2" src="{{ asset('about/logo.png') }}" alt="" style="max-width: 56%; max-height: 56%"></span>
                                                            </a>
                                                        </div>

                                                        <form class="pl-3 pr-3" action="/admin/tambah" method="POST">
                                                            @csrf

                                                            <div class="form-group">
                                                                <label for="username">Nama</label>
                                                                <input class="form-control" type="text" id="username" required="" placeholder="Cimon Maulana" name="name">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="emailaddress">Alamat email</label>
                                                                <input class="form-control" type="email" id="emailaddress" required="" placeholder="cimon@lele.id" name="email">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="password">Password</label>
                                                                <input class="form-control" type="password" required="" id="password" placeholder="Masukkan password disini" name="password">
                                                            </div>

                                                            <div class="form-group text-center">
                                                                <button class="btn btn-primary" type="submit">Kirim</button>
                                                            </div>

                                                        </form>

                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                            <thead>
                                                <tr>
                                                    <th>Nomor</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Aksi</th>
                                                </tr>   
                                            </thead>
                                            <tbody>
                                                @foreach ($user as $usr)
                                                    <!-- Signup modal content -->
                                                    <div id="edit-modal{{ $usr->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <div class="modal-body">
                                                                    <div class="text-center mt-2 mb-4">
                                                                        <a href="/dashboard" class="text-success">
                                                                            <span><img class="mr-2" src="{{ asset('about/logo.png') }}" alt="" style="max-width: 56%; max-height: 56%"></span>
                                                                        </a>
                                                                    </div>

                                                                    <form class="pl-3 pr-3" action="/admin/{{ $usr->id }}/ubah" method="POST">
                                                                        @csrf
                                                                        @method('PATCH')

                                                                        <div class="form-group">
                                                                            <label for="username">Nama</label>
                                                                            <input class="form-control" type="text" id="username" required="" placeholder="Cimon Maulana" name="name" value="{{ old('name', $usr->name) }}">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="emailaddress">Alamat email</label>
                                                                            <input class="form-control" type="email" id="emailaddress" required="" placeholder="cimon@lele.id" name="email" value="{{ old('email', $usr->email) }}">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="password">Password Baru</label>
                                                                            <input class="form-control" type="password" id="newpassword" placeholder="Kosongkan saja jika tidak ingin mengubah" name="password">
                                                                        </div>

                                                                        <div class="form-group text-center">
                                                                            <button class="btn btn-success" type="submit">Simpan</button>
                                                                        </div>

                                                                    </form>

                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
                                                     <!-- Top modal content -->
                                                     <div id="delete-modal{{ $usr->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-top">
                                                            <div class="modal-content">
                                                                <form action="/admin/{{ $usr->id }}/hapus" method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="topModalLabel">Hapus Admin</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div>Yakin ingin menghapus {{ $usr->name }} ?</div>
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
                                                    <tr>
                                                        <td>{{ isset($i) ? ++ $i : $i = 1 }}</td>
                                                        <td>{{ $usr->name }}</td>
                                                        <td>{{ $usr->email }}</td>
                                                        <td style="text-align: center">
                                                            <div class="btn-group" role="group" aria-label="">
                                                                <button type="button" data-tooltip="true" data-placement="top" title="Edit" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#edit-modal{{ $usr->id }}"><i class="far fa-edit"></i></button>
                                                                <button type="button" data-tooltip="true" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-modal{{ $usr->id }}"><i class="far fa-trash-alt"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>    
                                    @else

                                    @endif
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
    <script>
        $(function() {
            $('[data-tooltip="true"]').tooltip();
        });
        // $('#zero_config1').DataTable( {
        //     processing: true,
        //     serverSide: true,
        //     ajax: '/get-barang',
        //     columns: [
        //         {data: 'DT_RowIndex'},
        //         {data: 'gambar_barang',
        //          render: function(data){
        //             return '<img width="35%" src="'+data+'"/>';
        //          }
        //         },
        //         {data: 'nama_barang'},
        //         {data: 'harga_awal'},
        //         {data: 'id_user'},
        //         {data: 'action', orderable: false, searchable: false}
        //     ]
        // } );
    </script>
</body>

</html>