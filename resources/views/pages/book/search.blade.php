@extends('layouts.app')

@section('head')
@endsection

@section('content')
        <!-- Start: Page Banner -->
        <section class="page-banner services-banner">
            <div class="container">
                <div class="banner-header">
                    <h2>Pencarian Buku & Media</h2>
                    <span class="underline center"></span>
                    <p class="lead">Cukup mudah bukan untuk mencari buku yang kamu inginkan?</p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="index-2.html">Beranda</a></li>
                        <li>Pencarian</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End: Page Banner -->

        <!-- Start: Products Section -->
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="books-full-width">
                        <div class="container">
                            @include('partials.sections.search')
                            
                            <!-- <div class="filter-options margin-list">
                                <div class="row">                                            
                                    <div class="col-md-3 col-sm-3">
                                        <select name="orderby">
                                            <option selected="selected">Sort by Title</option>
                                            <option>Sort by popularity</option>
                                            <option>Sort by rating</option>
                                            <option>Sort by newness</option>
                                            <option>Sort by price</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <select name="orderby">
                                            <option selected="selected">Sort by Author</option>
                                            <option>Sort by popularity</option>
                                            <option>Sort by rating</option>
                                            <option>Sort by newness</option>
                                            <option>Sort by price</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-3">
                                        <select name="orderby">
                                            <option selected="selected">Language</option>
                                            <option>Sort by popularity</option>
                                            <option>Sort by rating</option>
                                            <option>Sort by newness</option>
                                            <option>Sort by price</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-3">
                                        <select name="orderby">
                                            <option selected="selected">Publishing Date</option>
                                            <option>Sort by popularity</option>
                                            <option>Sort by rating</option>
                                            <option>Sort by newness</option>
                                            <option>Sort by price</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-12 pull-right">
                                        <div class="filter-toggle">
                                            <a href="books-media-gird-view-v2.html" class="active"><i class="glyphicon glyphicon-th-large"></i></a>
                                            <a href="books-media-list-view.html"><i class="glyphicon glyphicon-th-list"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="booksmedia-fullwidth">
                                <ul>
                                    @foreach($book as $fb)
                                        <li>
                                            <div class="book-list-icon yellow-icon"></div>
                                            <figure>
                                                <a href="{{ route('book.detail', $fb->isbn) }}"><img src="{{ asset('media/images/book/' . $fb->image) }}" alt="Book"></a>
                                                <figcaption>
                                                    <header>
                                                        <h4><a href="{{ route('book.detail', $fb->isbn) }}">{{ $fb->title }}</a></h4>
                                                        <p><strong>Pengarang:</strong>  {{ $fb->author }}</p>
                                                        <p><strong>ISBN:</strong>  {{ $fb->isbn }}</p>
                                                    </header>
                                                    <p>{{ $fb->description }}.</p>
                                                    <!-- <div class="actions">
                                                        <ul>
                                                            <li>
                                                                <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Add TO CART">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Like">
                                                                    <i class="fa fa-heart"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Mail">
                                                                    <i class="fa fa-envelope"></i>
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
                                                            <li>
                                                                <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Share">
                                                                    <i class="fa fa-share-alt"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div> -->
                                                </figcaption>
                                            </figure>                                                
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            {{ $book->appends(Request::except('page'))->links() }}
                    </div>
                </main>
            </div>
        </div>
        <!-- End: Products Section -->

@include('partials.sections.socialnetwork')

@endsection

@push('script')
@endpush