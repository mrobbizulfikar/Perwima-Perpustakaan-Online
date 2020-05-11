        @if(Request::is(['admin', 'admin/*']))
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                    <button type="button" class="navbar-toggler">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                    </div>
                    <a href="{{ route('home') }}" class="h6"><i class="fa fa-home fa-2x"></i> Kembali ke Beranda</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <form>
                    <div class="input-group no-border">
                        <input type="text" value="" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="nc-icon nc-zoom-split"></i>
                        </div>
                        </div>
                    </div>
                    </form>
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link btn-magnify" href="#pablo">
                        <i class="nc-icon nc-layout-11"></i>
                        <p>
                            <span class="d-lg-none d-md-block">Stats</span>
                        </p>
                        </a>
                    </li>
                    <li class="nav-item btn-rotate dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="nc-icon nc-bell-55"></i>
                        <p>
                            <span class="d-lg-none d-md-block">Some Actions</span>
                        </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-rotate" href="#pablo">
                        <i class="nc-icon nc-settings-gear-65"></i>
                        <p>
                            <span class="d-lg-none d-md-block">Account</span>
                        </p>
                        </a>
                    </li>
                    </ul>
                </div>
                </div>
            </nav>
            <!-- End Navbar -->
        @else
            <!-- Start: Header Section -->
            <header id="header-v1" class="navbar-wrapper">
                <div class="container">
                    <div class="row">
                        <nav class="navbar navbar-default">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="navbar-header">
                                        <div class="navbar-brand">
                                            <h1>
                                                <a href="index-2.html">
                                                    <img src="{{ asset('media/images/perwima/logo.png') }}" alt="LIBRARIA" />
                                                </a>
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <!-- Header Topbar -->
                                    <div class="header-topbar hidden-sm hidden-xs">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="topbar-info">
                                                    <a href="tel:+62-813-8459-3009"><i class="fa fa-phone"></i>+62-813-8459-3009</a>
                                                    <span>/</span>
                                                    <a href="mailto:support@perwima.com"><i class="fa fa-envelope"></i>support@perwima.com</a>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="topbar-links">
                                                    @guest
                                                        <a href="{{ route('login') }}"><i class="fa fa-lock"></i>Masuk / Daftar</a>
                                                    @else
                                                        <div class="header-cart dropdown">
                                                            <span>|</span>
                                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                                                <i class="fa fa-book"></i>
                                                                <small>{{ $transaction->count() }}</small>
                                                            </a>
                                                            <div class="dropdown-menu cart-dropdown">
                                                                <ul>
                                                                    @foreach($transaction as $ft)
                                                                        <li class="clearfix">
                                                                            <img src="{{ asset('media/images/book/' . $ft->book->image) }}" alt="cart item" />
                                                                            <div class="item-info">
                                                                                <div class="name">
                                                                                    <a href="#">{{ $ft->book->title }}</a>
                                                                                </div>
                                                                                <div class="author"><strong>Author:</strong> {{ $ft->book->author }}</div>
                                                                                <div class="price">{{ $ft->borrow_date }} - {{ $ft->return_date }}</div>
                                                                            </div>
                                                                            <a class="remove" href="{{ route('book.detail',$ft->book->isbn) }}"><i class="fa fa-info-circle"></i></a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="cart-total">
                                                                    <div class="title">Denda</div>
                                                                    <div class="price">Rp{{ $transaction->sum('fine') }}</div>
                                                                </div>
                                                                <div class="cart-buttons">
                                                                    <a href="{{ route('member.transaction.index') }}" class="btn btn-primary">Detail</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="header-cart dropdown">
                                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-lock"></i>{{ Auth::user()->name }}</a>                                                        
                                                            <div class="dropdown-menu cart-dropdown">
                                                                <div class="cart-total">
                                                                    <div class="">{{ Auth::user()->name }}</div>
                                                                    <div class="">{{ Auth::user()->email }}</div>
                                                                </div>
                                                                <div class="cart-buttons">
                                                                    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                                    {{ __('Keluar') }}
                                                                </a>

                                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                                    @csrf
                                                                </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endguest
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="navbar-collapse hidden-sm hidden-xs">
                                        <ul class="nav navbar-nav">
                                            <li class="dropdown {{ Route::is('home') ? 'active' : '' }}">
                                                <a data-toggle="dropdown" class="dropdown-toggle disabled" href="{{ route('home') }}">Beranda</a>
                                            </li>
                                            <li class="dropdown {{ Route::is('book.detail') ? 'active' : '' }}">
                                                <a data-toggle="dropdown" class="dropdown-toggle disabled" href="{{ route('home') }}/#bookandmedia">Buku &amp; Media</a>
                                            </li>
                                            <li class="dropdown">
                                                <a data-toggle="dropdown" class="dropdown-toggle disabled" href="{{ route('home') }}/#newsandevent">Berita &amp; Acara</a>
                                            </li>                                        
                                            <li class="dropdown">
                                                <a data-toggle="dropdown" class="dropdown-toggle disabled" href="#" id="page">HALAMAN</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ route('home') }}/#newreleases">Rilisan Terbaru</a></li>
                                                    <li><a href="{{ route('home') }}/#ourteam">Tim Kami</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="{{ route('home') }}/#footer">Layanan</a></li>
                                            <li><a href="{{ route('home') }}/#footer" class="scroll">Kontak</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="mobile-menu hidden-lg hidden-md">
                                <a href="#mobile-menu"><i class="fa fa-navicon"></i></a>
                                <div id="mobile-menu">
                                    <ul>
                                        <li class="mobile-title">
                                            <h4>Navigasi</h4>
                                            <a href="#" class="close"></a>
                                        </li>
                                        <li>
                                            <a href="{{ route('home') }}">Beranda</a>
                                        </li>
                                        <li>
                                            <a href="#bookandmedia">Buku &amp; Media</a>
                                        </li>
                                        <li>
                                            <a href="#newsandevent">Berita &amp; Acara</a>
                                        </li>
                                        <li>
                                            <a href="#">Halaman</a>
                                            <ul>
                                                <li><a href="{{ route('home') }}/#newreleases">Rilisan Terbaru</a></li>
                                                <li><a href="{{ route('home') }}/#ourteam">Tim Kami</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('home') }}/#footer">Layanan</a></li>
                                        <li><a href="{{ route('home') }}/#footer">Kontak</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </header>
            <!-- End: Header Section -->
        @endif