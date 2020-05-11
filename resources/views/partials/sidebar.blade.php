    @if(Request::is(['admin', 'admin/*']))
        <div class="sidebar" data-color="black" data-active-color="danger">
            <!--
            Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
        -->
            <div class="logo">
                <a href="#" class="simple-text logo-mini">
                    <div class="logo-image-small">
                    <img src="{{ asset('paper_template/assets/img/logo-small.png') }}">
                    </div>
                </a>
                <a href="#" class="simple-text logo-normal">
                    Perwima - Admin
                    <!-- <div class="logo-image-big">
                    <img src="../assets/img/logo-big.png">
                    </div> -->
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="{{ Route::is('admin.index') ? 'active' : '' }}">
                        <a href="{{ route('admin.index') }}">
                            <i class="nc-icon nc-bank"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="{{ Route::is('admin.book.index') ? 'active' : '' }}">
                        <a href="{{ route('admin.book.index') }}">
                            <i class="nc-icon nc-book-bookmark"></i>
                            <p>Koleksi Buku</p>
                        </a>
                    </li>
                    <li class="{{ Route::is('admin.category.index') ? 'active' : '' }}">
                        <a href="{{ route('admin.category.index') }}">
                            <i class="nc-icon nc-bullet-list-67"></i>
                            <p>Kategori</p>
                        </a>
                    </li>
                    <li class="{{ Route::is('admin.transaction.index') ? 'active' : '' }}">
                        <a href="{{ route('admin.transaction.index') }}">
                            <i class="nc-icon nc-refresh-69"></i>
                            <p>Transaksi</p>
                        </a>
                    </li>
                    <li class="{{ Route::is('admin.history.index') ? 'active' : '' }}">
                        <a href="{{ route('admin.history.index') }}">
                            <i class="fa fa-clock-o"></i>
                            <p>Riwayat Transaksi</p>
                        </a>
                    </li>

                    <div class="logo"></div>

                    <li class="{{ Route::is('admin.news.index') ? 'active' : '' }}">
                        <a href="{{ route('admin.news.index') }}">
                            <i class="nc-icon nc-single-copy-04"></i>
                            <p>News</p>
                        </a>
                    </li>
                    
                    <div class="logo"></div>
                </ul>
            </div>
        </div>
    @else
    @endif