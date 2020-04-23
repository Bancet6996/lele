<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/dashboard" aria-expanded="false">
                    <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Menu</span></li>
                @if (auth()->user()->level === 'petugas')
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link" href="/admin" aria-expanded="false">
                            <i data-feather="users" class="feather-icon"></i>
                            <span class="hide-menu">Administrator</span>
                        </a>
                    </li>
                @endif
                <li class="sidebar-item @if(Request::path() === 'barang/tambah') selected @endif">
                    <a class="sidebar-link sidebar-link" href="/barang" aria-expanded="false">
                        <i data-feather="package" class="feather-icon"></i>
                        <span class="hide-menu">Barang</span>
                    </a>
                </li>
                @if (auth()->user()->level === 'petugas')
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link" href="/kategori" aria-expanded="false">
                            <i data-feather="tag" class="feather-icon"></i>
                            <span class="hide-menu">Kategori</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link" href="/lelang" aria-expanded="false">
                            <i data-feather="archive" class="feather-icon"></i>
                            <span class="hide-menu">Lelang</span>
                        </a>
                    </li>
                @endif
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="/hasil" aria-expanded="false">
                        <i data-feather="dollar-sign" class="feather-icon"></i>
                        <span class="hide-menu">Hasil</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" aria-expanded="false" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i data-feather="log-out" class="feather-icon"></i>
                        <span class="hide-menu">Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->