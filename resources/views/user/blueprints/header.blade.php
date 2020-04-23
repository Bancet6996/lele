<!-- Start Header Style -->
<header id="header" class="htc-header header--3 bg__white">
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                    <div class="logo">
                        <a href="/">
                            <img src="{{ asset('about/logo.png') }}" alt="logo" style="max-height: 100%; max-width: 100%">
                        </a>
                    </div>
                </div>
                <!-- Start MAinmenu Ares -->
                <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                                           
                </div>
                <!-- End MAinmenu Ares -->
                <div class="col-md-2 col-sm-4 col-xs-3">  
                    @if (Auth::check())
                        <ul class="main__menu">
                            <li class="drop"><a href="#">{{ auth()->user()->name }}</a>
                                <ul class="dropdown">
                                    @if (auth()->user()->level != 'masyarakat')                                        
                                        <li><a href="/dashboard">Dashboard</a></li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"><i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                                            {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    @else
                                        <li><a href="/tawaran">Daftar Tawaran</a></li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"><i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                                            {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    @else
                        <ul class="menu-extra">
                            <li><a href="/login"><span class="ti-user"></span></a></li>
                        </ul>
                    @endif
                </div>
            </div>
            <div class="mobile-menu-area"></div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>
<!-- End Header Style -->