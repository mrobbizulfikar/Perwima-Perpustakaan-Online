        @if(Request::is(['admin', 'admin/*']))
            <footer class="footer footer-black  footer-white ">
                <div class="container-fluid">
                <div class="row">
                    <nav class="footer-nav">
                    <ul>
                        <li>
                        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>
                        </li>
                        <li>
                        <a href="http://blog.creative-tim.com/" target="_blank">Blog</a>
                        </li>
                        <li>
                        <a href="https://www.creative-tim.com/license" target="_blank">Licenses</a>
                        </li>
                    </ul>
                    </nav>
                    <div class="credits ml-auto">
                    <span class="copyright">
                        ©
                        <script>
                        document.write(new Date().getFullYear())
                        </script>, made with <i class="fa fa-heart heart"></i> by PERWIMA
                    </span>
                    </div>
                </div>
                </div>
            </footer>
        @else
            <!-- Start: Footer -->
            <footer class="site-footer" id="footer">
                <div class="container">
                    <div id="footer-widgets">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 widget-container">
                                <div id="text-2" class="widget widget_text">
                                    <h3 class="footer-widget-title">Tentang Perwima</h3>
                                    <span class="underline left"></span>
                                    <div class="textwidget">
                                        Perpustakaan tempat mencari, mengulik, & mengkaji ilmu pengetahuan.
                                    </div>
                                    <address>
                                        <div class="info">
                                            <i class="fa fa-location-arrow"></i>
                                            <span>Jalan 210 Koridor Lantai 2 SMK Wikrama Bogor</span>
                                        </div>
                                        <div class="info">
                                            <i class="fa fa-envelope"></i>
                                            <span><a href="mailto:support@perwima.com">support@perwima.com</a></span>
                                        </div>
                                        <div class="info">
                                            <i class="fa fa-phone"></i>
                                            <span><a href="tel:+62-813-8459-3009">+62-813-8459-3009</a></span>
                                        </div>
                                    </address>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6 widget-container">
                                <!-- <div id="nav_menu-2" class="widget widget_nav_menu">
                                    <h3 class="footer-widget-title">Quick Links</h3>
                                    <span class="underline left"></span>
                                    <div class="menu-quick-links-container">
                                        <ul id="menu-quick-links" class="menu">
                                            <li><a href="#">Library News</a></li>
                                            <li><a href="#">History</a></li>
                                            <li><a href="#">Meet Our Staff</a></li>
                                            <li><a href="#">Board of Trustees</a></li>
                                            <li><a href="#">Budget</a></li>
                                            <li><a href="#">Annual Report</a></li>
                                        </ul>
                                    </div>
                                </div> -->
                            </div>
                            <div class="clearfix hidden-lg hidden-md hidden-xs tablet-margin-bottom"></div>
                            <div class="col-md-2 col-sm-6 widget-container">
                                <div id="text-4" class="widget widget_text">
                                    <h3 class="footer-widget-title">Jam Operasi</h3>
                                    <span class="underline left"></span>
                                    <div class="timming-text-widget">
                                        <time datetime="2017-02-13">Senin - Jumat:</time>
                                        <time datetime="2017-02-13">9 am - 9 pm</time>
                                        <time datetime="2017-02-13">&nbsp;</time>
                                        <time datetime="2017-02-13">Sabtu:</time>
                                        <time datetime="2017-02-13">9 am - 5 pm</time>
                                        <time datetime="2017-02-13">&nbsp;</time>
                                        <time datetime="2017-02-13">Minggu: Tutup</time>
                                    </div>
                                </div>			
                            </div>
                            <div class="col-md-4 col-sm-6 widget-container">
                                <div class="widget twitter-widget">
                                    <h3 class="footer-widget-title">Kabar Terbaru</h3>
                                    <span class="underline left"></span>
                                    <div id="twitter-feed">
                                        <ul>
                                            <li>
                                                <p><a href="#">@perwima</a> -.</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>			
                            </div>
                        </div>
                    </div>                
                </div>
                <div class="sub-footer">
                    <div class="container">
                        <div class="row">
                            <div class="footer-text col-md-3">
                                <p><a target="_blank" href="https://www.smkwikrama.sch.id/">PERWIMA</a></p>
                            </div>
                            <div class="col-md-9 pull-right">
                                <ul>
                                    <li><a href="{{ route('home') }}">Beranda</a></li>
                                    <li><a href="{{ route('home') }}/#bookandmedia">Buku & Media</a></li>
                                    <li><a href="{{ route('home') }}/#newsandevent">Berita & Acara</a></li>
                                    <li><a href="{{ route('home') }}/#page">Halaman</a></li>
                                    <li><a href="{{ route('home') }}/#footer">Layanan</a></li>
                                    <li><a href="{{ route('home') }}/#footer">Kontak</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        @endif