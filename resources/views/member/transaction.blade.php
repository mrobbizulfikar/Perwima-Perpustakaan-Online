@extends('layouts.app')

@section('head')
@endsection

@section('content')
        <!-- Start: Page Banner -->
        <section class="page-banner services-banner">
            <div class="container">
                <div class="banner-header">
                    <h2>PEMINJAMAN</h2>
                    <span class="underline center"></span>
                    <p class="lead">Daftar peminjaman yang dilakukan.</p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="{{ route('home') }}">Beranda</a></li>
                        <li>Transaksi</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End: Page Banner -->
        <!-- Start: Cart Section -->
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="cart-main">
                        <div class="container">
                            <div class="row">
                                <div class="cart-head">
                                    <div class="col-xs-12 col-sm-6 account-option">
                                        <strong>{{ Auth::user()->name }}</strong>
                                        <ul>
                                            <li><a href="#">Edit Akun</a></li>
                                            <li class="divider">|</li>
                                            <li><a href="#"></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 library-info">
                                        <ul>
                                            <li>
                                                <strong>Level :</strong>
                                                {{ Auth::user()->level }}
                                            </li>
                                            <li>
                                                <strong>Email :</strong>
                                                <a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-12">
                                    <div class="page type-page status-publish hentry">
                                        <div class="entry-content">
                                            <div class="woocommerce table-tabs" id="responsiveTabs">
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><b class="arrow-up"></b><a data-toggle="tab" href="#sectionA">Keranjang</a></li>
                                                    <!-- <li><b class="arrow-up"></b><a data-toggle="tab" href="#sectionB">Holds (4)</a></li>
                                                    <li><b class="arrow-up"></b><a data-toggle="tab" href="#sectionC">My Checkouts (0)</a></li>
                                                    <li><b class="arrow-up"></b><a data-toggle="tab" href="#sectionD">My eBooks (1)</a></li>
                                                    <li><b class="arrow-up"></b><a data-toggle="tab" href="#sectionE">My Lists</a></li>
                                                    <li><b class="arrow-up"></b><a data-toggle="tab" href="#sectionF">Fines/Fees ($0.00)</a></li> -->
                                                </ul>
                                                <div class="tab-content">
                                                    <div id="sectionA" class="tab-pane fade in">
                                                        <form method="post" action="http://libraria.demo.presstigers.com/cart-page.html">
                                                            <table class="table table-bordered shop_table cart">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th class="product-name">Identitas Buku</th>
                                                                        <!-- <th class="product-quantity">Action</th> -->
                                                                        <th class="">Deksripsi Buku</th>                                                                
                                                                        <th class="">Peminjaman</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($transaction as $ft)
                                                                        <tr class="cart_item">
                                                                            <td data-title="cbox" class="product-cbox">
                                                                                {{ $ft->id }}
                                                                            </td>
                                                                            <td data-title="Product" class="product-name">
                                                                                <span class="product-thumbnail">
                                                                                    <a href="#"><img src="{{ asset('media/images/book/'.$ft->book->image) }}" alt="cart-product-1" style="width:100px"></a>
                                                                                </span>
                                                                                <span class="product-detail">
                                                                                    <a href="#"><strong>{{ $ft->book->title }}</strong></a>
                                                                                    <span><strong>ISBN:</strong> {{ $ft->book->isbn }}</span>
                                                                                    <span><strong>Author:</strong> {{ $ft->book->author }}</span>
                                                                                </span>
                                                                            </td>
                                                                            <!-- <td data-title="action" class="product-action">
                                                                                <div class="dropdown">
                                                                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Edit Hold <b class="caret"></b></a>
                                                                                    <ul class="dropdown-menu">
                                                                                        <li><a href="#">Edit Hold</a></li>
                                                                                        <li><a href="#">Cancel Hold</a></li>
                                                                                        <li><a href="#">Add Another Hold</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="addition-action">
                                                                                    <small>Additional Actions:</small>
                                                                                    <ul>
                                                                                        <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-print" aria-hidden="true"></i></a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </td> -->
                                                                            <td class="product-price">
                                                                                <p>{{ $ft->book->description }}</p>
                                                                            </td>
                                                                            <td class="product-subtotal">
                                                                                <p>Tanggal Pinjam :</p>
                                                                                <p><i class="fa fa-calendar-check-o"></i> {{ $ft->borrow_date }}</p>
                                                                                <p>Tanggal Kembali</p>
                                                                                <p><i class="fa fa-calendar-times-o"></i> {{ $ft->return_date }}</p>
                                                                                <p>Denda Rp{{ $ft->fine }}</p>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                    <tr class="cart_item">
                                                                            <td data-title="Product" class="product-name text-right" colspan="4">
                                                                                <p class="h1">Total Denda</p>
                                                                                <p>Rp{{ $transaction->sum('fine') }}</p>
                                                                            </td>
                                                                            <!-- <td data-title="action" class="product-action">
                                                                                <div class="dropdown">
                                                                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Edit Hold <b class="caret"></b></a>
                                                                                    <ul class="dropdown-menu">
                                                                                        <li><a href="#">Edit Hold</a></li>
                                                                                        <li><a href="#">Cancel Hold</a></li>
                                                                                        <li><a href="#">Add Another Hold</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="addition-action">
                                                                                    <small>Additional Actions:</small>
                                                                                    <ul>
                                                                                        <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-print" aria-hidden="true"></i></a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </td> -->
                                                                        </tr>
                                                                </tbody>
                                                            </table>
                                                        </form>
                                                    </div>
                                                    <div id="sectionB" class="tab-pane fade in">
                                                        <h5>Lorem Ipsum Dolor</h5>
                                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                                                    </div>
                                                    <div id="sectionC" class="tab-pane fade in">
                                                        <h5>Lorem Ipsum Dolor</h5>
                                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                                                    </div>
                                                    <div id="sectionD" class="tab-pane fade in">
                                                        <h5>Lorem Ipsum Dolor</h5>
                                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                                                    </div>                                                    
                                                    <div id="sectionE" class="tab-pane fade in">
                                                        <h5>Lorem Ipsum Dolor</h5>
                                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .entry-content -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <!-- End: Cart Section -->

        @include('partials.sections.socialnetwork')
@endsection

@push('script')
@endpush