@extends('layouts.app')

@section('head')
@endsection

@section('content')
        <!-- Start: Page Banner -->
        <section class="page-banner services-banner">
            <div class="container">
                <div class="banner-header">
                    <h2>Detail Buku</h2>
                    <span class="underline center"></span>
                    <p class="lead">Cukup mudah bukan untuk mencari buku yang kamu inginkan?</p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="{{ route('home') }}">Beranda</a></li>
                        <li>Buku & Media</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End: Page Banner -->

        <!-- Start: Products Section -->
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="booksmedia-detail-main">
                        <div class="container">
                            <div class="row">
                               
                               @include('partials.sections.search')
                               
                            </div>
                            <div class="row">
                                <div class="col-md-9 col-md-push-3">
                                    <div class="booksmedia-detail-box">
                                        <div class="single-book-box">                                                
                                            <div class="post-thumbnail">
                                                <div class="book-list-icon yellow-icon"></div>
                                                <img alt="Book" src="{{ asset('media/images/book/' . $book->image) }}" class="img-fluid" style="max-width: 600px" />
                                            </div>
                                            <div class="post-detail">
                                                <div class="books-social-sharing">
                                                    <ul>
                                                        <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                                        <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                                        <li><a href="#" target="_blank"><i class="fa fa-rss"></i></a></li>
                                                        <li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="optional-links">
                                                    <ul>
                                                        <li>
                                                            <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Add To Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Like">
                                                                <i class="fa fa-heart"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Mail"><i class="fa fa-envelope"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Search">
                                                                <i class="fa fa-search"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Print">
                                                                <i class="fa fa-print"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <header class="entry-header">
                                                    <h2 class="entry-title">{{ $book->title }}</h2>
                                                    <ul>
                                                        <li><strong>Author:</strong> {{ $book->author }}</li>
                                                        <li><strong>ISBN:</strong> {{ $book->isbn }}</li>
                                                        <li>
                                                            <div class="rating">
                                                                <strong>Rating:</strong> 
                                                                <span>☆</span>
                                                                <span>☆</span>
                                                                <span>☆</span>
                                                                <span>☆</span>
                                                                <span>☆</span>
                                                            </div>
                                                        </li>
                                                        <li><strong>Edisi (Tahun):</strong> {{ $book->year }}</li>
                                                        <li><strong>Penerbit:</strong> {{ $book->publisher }}</li>
                                                    </ul>
                                                </header>
                                                <!-- <div class="entry-content post-buttons">
                                                    <a href="#." class="btn btn-dark-gray">Place a Hold</a>
                                                    <a href="#." class="btn btn-dark-gray">View sample</a>
                                                    <a href="#." class="btn btn-dark-gray">Find Similar Titles</a>
                                                </div> -->
                                            </div>
                                        </div>
                                        <p><strong>Deskripsi:</strong> {{ $book->description }}. </p>
                                        <ul class="detail-page-listing">
                                            <li><strong>Kategori:</strong> {{ $book->category->name }}</li>
                                            <li><strong>Tebal:</strong> {{ $book->page }} halaman.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3 col-md-pull-9">
                                    <aside id="secondary" class="sidebar widget-area" data-accordion-group>                                        
                                        <div class="widget widget_recent_releases">
                                            <h4 class="widget-title">Terbaru</h4>
                                            <ul>
                                                <li><a href="#">Books</a></li>
                                                <li><a href="#">eBooks</a></li>
                                                <li><a href="#">DVDS</a></li>
                                                <li><a href="#">Magazines</a></li>
                                                <li><a href="#">Audio</a></li>
                                                <li><a href="#">eAudio</a></li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <!-- End: Products Section -->

        @include('partials.sections.socialnetwork')
@endsection

@push('script')
@endpush