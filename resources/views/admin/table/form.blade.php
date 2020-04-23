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
    <title>Lele - Formulir</title>
    <!-- This page plugin CSS -->
    <link href="{{ asset('adminmart/src/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('adminmart/src/dist/css/style.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> -->
    
    <style>
        .container {
            padding: 50px 10%;
        }

        .box {
            position: relative;
            background: #ffffff;
            width: 100%;
        }

        .box-header {
            color: #444;
            display: block;
            padding: 10px;
            position: relative;
            border-bottom: 1px solid #f4f4f4;
            margin-bottom: 10px;
        }

        .box-tools {
            position: absolute;
            right: 10px;
            top: 5px;
        }

        .dropzone-wrapper {
            border: 2px dashed #91b0b3;
            color: #92b0b3;
            position: relative;
            height: 150px;
        }

        .dropzone-desc {
            position: absolute;
            margin: 0 auto;
            left: 0;
            right: 0;
            text-align: center;
            width: 40%;
            top: 50px;
            font-size: 16px;
        }

        .dropzone,
        .dropzone:focus {
            position: absolute;
            outline: none !important;
            width: 100%;
            height: 150px;
            cursor: pointer;
            opacity: 0;
        }

        .dropzone-wrapper:hover,
        .dropzone-wrapper.dragover {
            background: #ecf0f5;
        }

        .preview-zone {
            text-align: center;
        }

        .preview-zone .box {
            box-shadow: none;
            border-radius: 0;
            margin-bottom: 0;
        }
    </style>

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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session()->has('message'))
            <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                {!! session()->get('message') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Basic Initialisation</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-right">
                            <a href="/barang" class="btn btn-link">Kembali</a>
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
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- basic table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="mt-4" action="/barang/{{ @$barang->id }}" enctype="multipart/form-data" method="POST">
                                    @csrf

                                    @if(!@empty($barang))
                                        @method('PATCH')
                                    @endif

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Nama Barang" name="nama_barang" value="{{ old('nama_barang', @$barang->nama_barang) }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Harga Awal" name="harga_awal" value="{{ old('harga_awal', @$barang->harga_awal) }}">
                                    </div>
                                    <div class="form-group">
                                        <select name="kategori" id="" class="form-control">
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($kategori as $ktg)
                                                <option value="{{ $ktg->nama_kategori }}" @if($ktg->nama_kategori === @$barang->kategori) selected @endif>{{ $ktg->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="definisi_barang" rows="2" class="form-control" placeholder="Definisi Barang" style="resize: none">{{ old('definisi_barang', @$barang->definisi_barang) }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="deskripsi_barang" rows="5" class="form-control" placeholder="Deskripsi Barang" style="resize: none">{{ old('deskripsi_barang', @$barang->deskripsi_barang) }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="preview-zone hidden">
                                            <div class="box box-solid">
                                                  <div class="box-header with-border">
                                                        <div><b>Gambar Barang</b></div>
                                                        <div class="box-tools pull-right">
                                                            <button type="button" class="btn btn-danger btn-sm remove-preview">
                                                                <i class="fa fa-times"></i> Reset Gambar
                                                            </button>
                                                        </div>
                                                    </div>
                                                <div class="box-body"></div>
                                            </div>
                                        </div>
                                        <div class="dropzone-wrapper">
                                            <div class="dropzone-desc">
                                                <i class="fas fa-upload"></i>
                                                <p>Choose an image file or drag it here.</p>
                                            </div>
                                            <input type="file" name="gambar_barang" class="dropzone">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-block">Simpan</button>
                                    </div>
                                </form>
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
        function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
            var htmlPreview =
                '<img width="200" src="' + e.target.result + '" />' +
                '<p>' + input.files[0].name + '</p>';
            var wrapperZone = $(input).parent();
            var previewZone = $(input).parent().parent().find('.preview-zone');
            var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

            wrapperZone.removeClass('dragover');
            previewZone.removeClass('hidden');
            boxZone.empty();
            boxZone.append(htmlPreview);
            };

            reader.readAsDataURL(input.files[0]);
        }
        }

        function reset(e) {
            e.wrap('<form>').closest('form').get(0).reset();
            e.unwrap();
        }

        $(".dropzone").change(function() {
            readFile(this);
        });

        $('.dropzone-wrapper').on('dragover', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).addClass('dragover');
        });

        $('.dropzone-wrapper').on('dragleave', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).removeClass('dragover');
        });

        $('.remove-preview').on('click', function() {
            var boxZone = $(this).parents('.preview-zone').find('.box-body');
            var previewZone = $(this).parents('.preview-zone');
            var dropzone = $(this).parents('.form-group').find('.dropzone');
            boxZone.empty();
            previewZone.addClass('hidden');
            reset(dropzone);
        });

    </script>
</body>

</html>