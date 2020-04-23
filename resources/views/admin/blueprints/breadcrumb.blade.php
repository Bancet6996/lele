<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">{{ $judul }}</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="/dashboard" class="text-muted">Dashboard</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">{{ $sub }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        @if (Request::path() === 'barang')
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <a href="/barang/tambah" class="btn btn-link">Tambah Barang</a>
                </div>
            </div>
        @endif
        @if (Request::path() === 'kategori')
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#top-modal">Tambah Kategori</button>
                </div>
            </div>
        @endif
        @if (Request::path() === 'admin')
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#signup-modal">Tambah Administrator</button>
                </div>
            </div>
        @endif
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->