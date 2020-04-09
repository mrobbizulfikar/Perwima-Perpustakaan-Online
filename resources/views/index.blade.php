@extends('layouts.app')

@section('head')
@endsection

@section('content')
        <!-- Start: Slider Section -->
        <div data-ride="carousel" class="carousel slide" id="home-v1-header-carousel">
            
            <!-- Carousel slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <figure>
                        <img alt="Home Slide" src="{{ asset('libraria_template/images/header-slider/home-v1/header-slide.jpg') }}" />
                    </figure>
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>Perpustakaan Wikrama</h3>
                            <h2>Perwima</h2>
                            <p>Tempat meraih berbagai macam ilmu pengetahuan.</p>
                            <div class="slide-buttons hidden-sm hidden-xs">
                                <a href="#search" class="btn btn-primary">Jelajah</a>
                                <a href="#info" class="btn btn-default">Info</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <figure>
                        <img alt="Home Slide" src="{{ asset('libraria_template/images/header-slider/home-v2/header-slide.jpg') }}" />
                    </figure>
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>Temukan Buku yang Kamu Inginkan</h3>
                            <h2>Jelajahi Ruang Ilmu</h2>
                            <p>Banyak variasi buku yang dapat kamu temukan di Perwima ini teman!</p>
                            <div class="slide-buttons hidden-sm hidden-xs">
                                <a href="#search" class="btn btn-primary">Jelajah</a>
                                <a href="#info" class="btn btn-default">Info</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <figure>
                        <img alt="Home Slide" src="{{ asset('libraria_template/images/header-slider/home-v3/header-slide.jpg') }}" />
                    </figure>
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>Tuntut Ilmu Kapan Saja &amp; Dimana Saja</h3>
                            <h2>Tindas Rasa Penasaran</h2>
                            <p>Relaksasikan Pikiran, Berpetualang Dalam Pengetahuan!</p>
                            <div class="slide-buttons hidden-sm hidden-xs">
                                <a href="#search" class="btn btn-primary">Jelajah</a>
                                <a href="#info" class="btn btn-default">Info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Controls -->
            <a class="left carousel-control" href="#home-v1-header-carousel" data-slide="prev"></a>
            <a class="right carousel-control" href="#home-v1-header-carousel" data-slide="next"></a>
        </div>
        <!-- End: Slider Section -->
        
        @include('partials.sections.search')
        
        <!-- Start: Welcome Section -->
        <section class="welcome-section" id="info">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="welcome-wrap">
                            <div class="welcome-text">
                                <h2 class="section-title">Selamat Datang di Perwima</h2>
                                <span class="underline left"></span>
                                <p class="lead">Aplikasi Website Perpustakaan Wikrama (PERWIMA)</p>
                                <p>Perpustakaan SMK Wikrama Bogor berada di Kampus SMK Wikrama Bogor Kelurahan Sindangsari, Kecamatan Bogor Timur, Kota Bogor  didirikan pada tahun 1996.  Secara fisik perpustakaan sekolah terletak di lantai 2 (dua) gedung Pajajaran yang merupakan gedung pertama yang dibangun, tepatnya berada di area bangunan seluas 96 m<sup>2</sup>. Lokasi ini berada di pusat kegiatan pembelajaran yang mudah dijangkau oleh peserta didik, pendidik dan tenaga kependidikan. Semenjak didirikan, keberadaan ruang perpustakaan SMK Wikrama Bogor memberikan manfaat bagi sivitas akademik sekolah bahkan masyarakat sekitar sekolah.</p>
                                <!-- <a class="btn btn-primary" href="https://www.instagram.com/perpustakaan_wikrama/" target="_blank">Info</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="facts-counter">
                            <ul>
                                <li class="bg-green">
                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="eaudio"></i>
                                        </div>
                                        <span>Novel<strong class="fact-counter">{{ $novel->count() }}</strong></span>
                                    </div>
                                </li>
                                <li class="bg-light-green">
                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="ebook"></i>
                                        </div>
                                        <span>Sains<strong class="fact-counter">{{ $science->count() }}</strong></span>
                                    </div>
                                </li>
                                <li class="bg-yellow">
                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="magazine"></i>
                                        </div>
                                        <span>Tutorial<strong class="fact-counter">{{ $tutorial->count() }}</strong></span>
                                    </div>
                                </li>
                                <li class="bg-red">
                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="books"></i>
                                        </div>
                                        <span>Majalah<strong class="fact-counter">{{ $magazine->count() }}</strong></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="welcome-image"></div>
        </section>
        <!-- End: Welcome Section -->
        
        <!-- Start: Category Filter -->
        <section class="category-filter section-padding" id="newreleases">
            <div class="container">
                <div class="center-content">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <h2 class="section-title">Rilisan Terbaru</h2>
                            <span class="underline center"></span>
                            <p class="lead">Berdasarkan 4 kategori utama.</p>
                        </div>
                    </div>
                </div>
                <div class="filter-buttons">
                    <div class="filter btn" data-filter="all">Semua</div>
                    <div class="filter btn" data-filter=".novel">Novel</div>
                    <div class="filter btn" data-filter=".science">Sains</div>
                    <div class="filter btn" data-filter=".magazine">Majalah</div>
                    <div class="filter btn" data-filter=".tutorial">Tutorial</div>
                </div>
            </div>
            <div id="category-filter">
                <ul class="category-list">
                    @foreach($book as $ft)
                        @if($ft->category_id == 1)
                            <li class="category-item novel">
                        @elseif($ft->category_id == 2)
                            <li class="category-item science">
                        @elseif($ft->category_id == 3)
                            <li class="category-item magazine">
                        @elseif($ft->category_id == 4)
                            <li class="category-item tutorial">
                        @endif
                            <figure>
                                <img src="{{ asset('media/images/book/' . $ft->image) }}" alt="New Releaase" />
                                <figcaption class="bg-orange">
                                    <div class="info-block">
                                        <h4>{{ $ft->title }}</h4>
                                        <span class="author"><strong>Pengarang:</strong> {{ $ft->author }}</span>
                                        <span class="author"><strong>ISBN:</strong> {{ $ft->isbn }}</span>
                                        <div class="rating">
                                            <span></span>
                                        </div>
                                        <p>{{ $ft->description }}.</p>
                                        <a href="{{ route('book.detail', $ft->isbn) }}">Selengkapnya <i class="fa fa-long-arrow-right"></i></a>
                                        <ol>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-envelope"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-share-alt"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </li>
                                        </ol>
                                    </div>
                                </figcaption>
                            </figure>
                        </li>
                    @endforeach
                </ul>
                <!-- <div class="center-content">
                    <a href="#" class="btn btn-primary">View More</a>
                </div> -->
                <div class="clearfix"></div>
            </div>
        </section>
        <!-- Start: Category Filter -->
        
        <!-- Start: Features -->
        <section class="features" id="bookandmedia">
            <div class="container">
                <ul>
                    <li class="bg-green">
                        <div class="feature-box">
                            <i class="green"></i>
                            <h3>Novel</h3>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p> -->
                            <a class="green" href="#">
                                Lihat Lebih Banyak <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                    <li class="bg-light-green">
                        <div class="feature-box">
                            <i class="light-green"></i>
                            <h3>Sains</h3>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p> -->
                            <a class="light-green" href="#">
                                Lihat Lebih Banyak <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                    <li class="bg-yellow">
                        <div class="feature-box">
                            <i class="yellow"></i>
                            <h3>Tutorial</h3>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p> -->
                            <a class="yellow" href="#">
                                Lihat Lebih Banyak <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                    <li class="bg-red">
                        <div class="feature-box">
                            <i class="red"></i>
                            <h3>Majalah</h3>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p> -->
                            <a class="red" href="#">
                                Lihat Lebih Banyak <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                    <li class="bg-violet">
                        <div class="feature-box">
                            <i class="violet"></i>
                            <h3>Audio</h3>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p> -->
                            <a class="green" href="#">
                                Lihat violet Banyak <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                    <li class="bg-blue">
                        <div class="feature-box">
                            <i class="blue"></i>
                            <h3>DVD</h3>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros.</p> -->
                            <a class="blue" href="#">
                                Lihat Lebih Banyak <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>                    
                </ul>
            </div>
        </section>
        <!-- End: Features -->
        
        <!-- Start: Meet Staff -->
        <section class="team section-padding" id="ourteam">
            <div class="container">
                <div class="center-content">
                    <h2 class="section-title">Tim Kami</h2>
                    <span class="underline center"></span>
                    <p class="lead">Berikut sepintas tentang orang-orang gajelas.</p>
                </div>
                <div class="team-list">
                    <div class="team-member">
                        <figure>
                            <img src="{{ asset('media/images/team/zulfi.jpg') }}" alt="team" />
                        </figure>
                        <div class="content-block">
                            <div class="member-info">
                                <h4>M. Robbi Zulfikar</h4>
                                <span class="designation">CEO - Founder</span>
                                <ul class="social">
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-skype"></i>
                                        </a>
                                    </li>
                                </ul>
                                <p>Penemu Roma Kelapa.</p>
                                <a class="btn btn-primary" href="https://www.instagram.com/mrobbizulfikar/" target="_blank">INFO</a>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <figure>
                            <img src="{{ asset('media/images/team/akbar.jpg') }}" alt="team" />
                        </figure>
                        <div class="content-block">
                            <div class="member-info">
                                <h4>M. Akbar Fadilah</h4>
                                <span class="designation">Supreme Librarian Artist</span>
                                <ul class="social">
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-skype"></i>
                                        </a>
                                    </li>
                                </ul>
                                <p>Fakboi Universitas Harvard.</p>
                                <a class="btn btn-primary" href="https://www.instagram.com/akbarfdlhh/" target="_blank">INFO</a>
                            </div>
                        </div>
                    </div>
                    <div class="team-member">
                        <figure>
                            <img src="{{ asset('media/images/team/adis.jpeg') }}" alt="team" />
                        </figure>
                        <div class="content-block">
                            <div class="member-info">
                                <h4>Adiska Aulia E.</h4>
                                <span class="designation">Master of College</span>
                                <ul class="social">
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-skype"></i>
                                        </a>
                                    </li>
                                </ul>
                                <p>11-12 sama Toa.</p>
                                <a class="btn btn-primary" href="https://www.instagram.com/adiskaaerwin/" target="_blank">INFO</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End: Meet Staff -->
        
        <!-- Start: Latest Blog -->
        <section class="latest-blog section-padding banner" id="newsandevent">
            <div class="container">
                <div class="center-content">
                    <h2 class="section-title">Berita & Acara</h2>
                    <span class="underline center"></span>
                    <p class="lead">Daftar berita dan acara terbaru dari Perwima.</p>
                </div>
                <div class="tabs-container">
                    <div class="tabs-menu">
                        <ul>
                            @foreach($news as $fn)
                                <li class="">
                                    <a href="#" class="">
                                        <div class="title">
                                            <i class="red"></i>
                                            <h3>#{{ $fn->id }}</h3>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tabs-list">
                        @foreach($news as $fn)
                            <div class="tab-content">
                                <article>
                                    <figure>
                                        <img src="{{ asset('media/images/news/' . $fn->image) }}" alt="Latest Blog">
                                        <figcaption>
                                            <a href="#.">
                                                <span class="date">{{ Carbon\Carbon::parse($fn->event_date)->format('d') }}</span>
                                                <span class="month">{{ Carbon\Carbon::parse($fn->event_date)->format('M') }}</span>
                                            </a>
                                        </figcaption>
                                    </figure>
                                    <div class="post-detail">
                                        <div class="info-bar">
                                            <div class="share">
                                                <a href="#">
                                                    <i class="fa fa-share-alt"></i> Bagikan
                                                </a>
                                            </div>
                                        </div>
                                        <h4>{{ $fn->title }}</h4>
                                        <div class="author">
                                            <a href="#">
                                                <i class="fa fa-map-marker"></i> Perpustakaan Wikrama
                                            </a>
                                        </div>
                                        <p>{{ $fn->description }}.</p>
                                        <a class="btn btn-dark-gray">Selengkapnya</a>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- End: Latest Blog -->
        
        <!-- Start: Our Community Section -->
        <section class="community-testimonial">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-title">Apa Kata Mereka?</h2>
                    <span class="underline center"></span>
                    <p class="lead">Ulasan atau komentar yang diberikan.</p>
                </div>
                <div class="owl-carousel">
                    <div class="single-testimonial-box">
                        <div class="top-portion">
                            <img src="{{ asset('libraria_template/images/testimonial-image-01.jpg') }}" alt="Testimonial Image" />
                            <div class="user-comment">
                                <div class="arrow-left"></div>
                                <blockquote cite="#">
                                    Sangat lengkap koleksi bukunya, fasilitas cukup nyaman untuk kegiatan literasi. Ingin rasanya untuk membaca kembali di Perpustakaan Wikrama ini
                                </blockquote>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom-portion">
                            <a href="#" class="author">
                                Ramdan Fauzi <small>(Pelajar)</small>
                            </a>
                            <div class="social-share-links">
                                <ul>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="single-testimonial-box">
                        <div class="top-portion">
                            <img src="{{ asset('libraria_template/images/testimonial-image-02.jpg') }}" alt="Testimonial Image" />
                            <div class="user-comment">
                                <div class="arrow-left"></div>
                                <blockquote cite="#">
                                    Sangat lengkap koleksi bukunya, fasilitas cukup nyaman untuk kegiatan literasi. Ingin rasanya untuk membaca kembali di Perpustakaan Wikrama ini
                                </blockquote>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom-portion">
                            <a href="#" class="author">
                                Ofi <small>(Pelajar)</small>
                            </a>
                            <div class="social-share-links">
                                <ul>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="single-testimonial-box">
                        <div class="top-portion">
                            <img src="{{ asset('libraria_template/images/testimonial-image-01.jpg') }}" alt="Testimonial Image" />
                            <div class="user-comment">
                                <div class="arrow-left"></div>
                                <blockquote cite="#">
                                    Sangat lengkap koleksi bukunya, fasilitas cukup nyaman untuk kegiatan literasi. Ingin rasanya untuk membaca kembali di Perpustakaan Wikrama ini
                                </blockquote>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom-portion">
                            <a href="#" class="author">
                                Akbar Yusuf <small>(Pelajar)</small>
                            </a>
                            <div class="social-share-links">
                                <ul>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="single-testimonial-box">
                        <div class="top-portion">
                            <img src="{{ asset('libraria_template/images/testimonial-image-02.jpg') }}" alt="Testimonial Image" />
                            <div class="user-comment">
                                <div class="arrow-left"></div>
                                <blockquote cite="#">
                                    Sangat lengkap koleksi bukunya, fasilitas cukup nyaman untuk kegiatan literasi. Ingin rasanya untuk membaca kembali di Perpustakaan Wikrama ini
                                </blockquote>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom-portion">
                            <a href="#" class="author">
                                Renita Nur P <small>(Pelajar)</small>
                            </a>
                            <div class="social-share-links">
                                <ul>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="single-testimonial-box">
                        <div class="top-portion">
                            <img src="{{ asset('libraria_template/images/testimonial-image-01.jpg') }}" alt="Testimonial Image" />
                            <div class="user-comment">
                                <div class="arrow-left"></div>
                                <blockquote cite="#">
                                    Sangat lengkap koleksi bukunya, fasilitas cukup nyaman untuk kegiatan literasi. Ingin rasanya untuk membaca kembali di Perpustakaan Wikrama ini
                                </blockquote>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom-portion">
                            <a href="#" class="author">
                                Akbar Yusuf <small>(Pelajar)</small>
                            </a>
                            <div class="social-share-links">
                                <ul>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="single-testimonial-box">
                        <div class="top-portion">
                            <img src="{{ asset('libraria_template/images/testimonial-image-02.jpg') }}" alt="Testimonial Image" />
                            <div class="user-comment">
                                <div class="arrow-left"></div>
                                <blockquote cite="#">
                                    Sangat lengkap koleksi bukunya, fasilitas cukup nyaman untuk kegiatan literasi. Ingin rasanya untuk membaca kembali di Perpustakaan Wikrama ini
                                </blockquote>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom-portion">
                            <a href="#" class="author">
                                Mukhlis R <small>(Pelajar)</small>
                            </a>
                            <div class="social-share-links">
                                <ul>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="single-testimonial-box">
                        <div class="top-portion">
                            <img src="{{ asset('libraria_template/images/testimonial-image-01.jpg') }}" alt="Testimonial Image" />
                            <div class="user-comment">
                                <div class="arrow-left"></div>
                                <blockquote cite="#">
                                    Sangat lengkap koleksi bukunya, fasilitas cukup nyaman untuk kegiatan literasi. Ingin rasanya untuk membaca kembali di Perpustakaan Wikrama ini
                                </blockquote>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom-portion">
                            <a href="#" class="author">
                                Faiz Alamsyah <small>(Pelajar)</small>
                            </a>
                            <div class="social-share-links">
                                <ul>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="single-testimonial-box">
                        <div class="top-portion">
                            <img src="{{ asset('libraria_template/images/testimonial-image-02.jpg') }}" alt="Testimonial Image" />
                            <div class="user-comment">
                                <div class="arrow-left"></div>
                                <blockquote cite="#">
                                    Sangat lengkap koleksi bukunya, fasilitas cukup nyaman untuk kegiatan literasi. Ingin rasanya untuk membaca kembali di Perpustakaan Wikrama ini
                                </blockquote>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom-portion">
                            <a href="#" class="author">
                                Daris Dzakwan K <small>(Pelajar)</small>
                            </a>
                            <div class="social-share-links">
                                <ul>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End: Our Community Section -->
        
        @include('partials.sections.socialnetwork')
@endsection

@push('script')
@endpush