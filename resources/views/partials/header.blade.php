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
                    <a class="navbar-brand" href="#pablo">Dashboard</a>
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
                                                    <img src="{{ asset('libraria_template/images/libraria-logo-v1.png') }}" alt="LIBRARIA" />
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
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <small>0</small>
                                                            </a>
                                                            <div class="dropdown-menu cart-dropdown">
                                                                <ul>
                                                                    <li class="clearfix">
                                                                        <img src="{{ asset('libraria_template/images/header-cart-image-01.jpg') }}" alt="cart item" />
                                                                        <div class="item-info">
                                                                            <div class="name">
                                                                                <a href="#">The Great Gatsby</a>
                                                                            </div>
                                                                            <div class="author"><strong>Author:</strong> F. Scott Fitzgerald</div>
                                                                            <div class="price">1 X $10.00</div>
                                                                        </div>
                                                                        <a class="remove" href="#"><i class="fa fa-trash-o"></i></a>
                                                                    </li>
                                                                    <li class="clearfix">
                                                                        <img src="{{ asset('libraria_template/images/header-cart-image-02.jpg') }}" alt="cart item" />
                                                                        <div class="item-info">
                                                                            <div class="name">
                                                                                <a href="#">The Great Gatsby</a>
                                                                            </div>
                                                                            <div class="author"><strong>Author:</strong> F. Scott Fitzgerald</div>
                                                                            <div class="price">1 X $10.00</div>
                                                                        </div>
                                                                        <a class="remove" href="#"><i class="fa fa-trash-o"></i></a>
                                                                    </li>
                                                                    <li class="clearfix">
                                                                        <img src="{{ asset('libraria_template/images/header-cart-image-03.jpg') }}" alt="cart item" />
                                                                        <div class="item-info">
                                                                            <div class="name">
                                                                                <a href="#">The Great Gatsby</a>
                                                                            </div>
                                                                            <div class="author"><strong>Author:</strong> F. Scott Fitzgerald</div>
                                                                            <div class="price">1 X $10.00</div>
                                                                        </div>
                                                                        <a class="remove" href="#"><i class="fa fa-trash-o"></i></a>
                                                                    </li>
                                                                </ul>
                                                                <div class="cart-total">
                                                                    <div class="title">SubTotal</div>
                                                                    <div class="price">$30.00</div>
                                                                </div>
                                                                <div class="cart-buttons">
                                                                    <a href="cart.html" class="btn btn-dark-gray">View Cart</a>
                                                                    <a href="checkout.html" class="btn btn-primary">Checkout</a>
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
                                            <li class="dropdown active">
                                                <a data-toggle="dropdown" class="dropdown-toggle disabled" href="index-2.html">Beranda</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="index-2.html">Home V1</a></li>
                                                    <li><a href="home-v2.html">Home V2</a></li>
                                                    <li><a href="home-v3.html">Home V3</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a data-toggle="dropdown" class="dropdown-toggle disabled" href="books-media-list-view.html">Buku &amp; Media</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="books-media-list-view.html">Books &amp; Media List View</a></li>
                                                    <li><a href="books-media-gird-view-v1.html">Books &amp; Media Grid View V1</a></li>
                                                    <li><a href="books-media-gird-view-v2.html">Books &amp; Media Grid View V2</a></li>
                                                    <li><a href="books-media-detail-v1.html">Books &amp; Media Detail V1</a></li>
                                                    <li><a href="books-media-detail-v2.html">Books &amp; Media Detail V2</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a data-toggle="dropdown" class="dropdown-toggle disabled" href="news-events-list-view.html">Berita &amp; Acara</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="news-events-list-view.html">News &amp; Events List View</a></li>
                                                    <li><a href="news-events-detail.html">News &amp; Events Detail</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a data-toggle="dropdown" class="dropdown-toggle disabled" href="#">HALAMAN</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="cart.html">Cart</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                    <li><a href="signin.html">Signin/Register</a></li>
                                                    <li><a href="404.html">404/Error</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="services.html">Layanan</a></li>
                                            <li><a href="contact.html">KONTAK</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="mobile-menu hidden-lg hidden-md">
                                <a href="#mobile-menu"><i class="fa fa-navicon"></i></a>
                                <div id="mobile-menu">
                                    <ul>
                                        <li class="mobile-title">
                                            <h4>Navigation</h4>
                                            <a href="#" class="close"></a>
                                        </li>
                                        <li>
                                            <a href="index-2.html">Home</a>
                                            <ul>
                                                <li><a href="index-2.html">Home V1</a></li>
                                                <li><a href="home-v2.html">Home V2</a></li>
                                                <li><a href="home-v3.html">Home V3</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="books-media-list-view.html">Books &amp; Media</a>
                                            <ul>
                                                <li><a href="books-media-list-view.html">Books &amp; Media List View</a></li>
                                                <li><a href="books-media-gird-view-v1.html">Books &amp; Media Grid View V1</a></li>
                                                <li><a href="books-media-gird-view-v2.html">Books &amp; Media Grid View V2</a></li>
                                                <li><a href="books-media-detail-v1.html">Books &amp; Media Detail V1</a></li>
                                                <li><a href="books-media-detail-v2.html">Books &amp; Media Detail V2</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="news-events-list-view.html">News &amp; Events</a>
                                            <ul>
                                                <li><a href="news-events-list-view.html">News &amp; Events List View</a></li>
                                                <li><a href="news-events-detail.html">News &amp; Events Detail</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Pages</a>
                                            <ul>
                                                <li><a href="cart.html">Cart</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="signin.html">Signin/Register</a></li>
                                                <li><a href="404.html">404/Error</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="blog.html">Blog</a>
                                            <ul>
                                                <li><a href="blog.html">Blog Grid View</a></li>
                                                <li><a href="blog-detail.html">Blog Detail</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="services.html">Services</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </header>
            <!-- End: Header Section -->
        @endif