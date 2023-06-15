@extends('landing-page.layouts.app')
@section('title', 'Produk Detail | Produk | Razen Style')

@section('content')
    @php
    use App\Models\LandingPageProduk;

    $produk = LandingPageProduk::first();

    $section_1 = json_decode($produk->section_1, true);
    @endphp
    <!-- HEADING-BANNER START -->
    <div class="heading-banner-area overlay-bg" id="heading-banner-area" style="background:rgba(0,0,0,0) url({{asset('images/landing-page/produk/'.$section_1['gambar'])}}) no-repeat scroll center center/cover">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-banner">
                        <div class="heading-banner-title">
                            <h2>Produk Detail</h2>
                        </div>
                        <div class="breadcumbs pb-15">
                            <ul>
                                <li><a href="{{ route('beranda') }}">Beranda</a></li>
                                <li><a href="{{ route('produk') }}">Produk</a></li>
                                <li>Produk Detail</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- HEADING-BANNER END -->

    <!-- PRODUCT-AREA START -->
        <div class="product-area single-pro-area pt-80 pb-80 product-style-2">
            <div class="container">
                <div class="row shop-list single-pro-info no-sidebar">
                    <!-- Single-product start -->
                    <div class="col-lg-12">
                        <div class="single-product clearfix">
                            <!-- Single-pro-slider Big-photo start -->
                            <div class="single-pro-slider single-big-photo view-lightbox slider-for">
                                <div>
                                    <img src="{{ asset('hurst/img/single-product/medium/1.jpg') }}" alt="" />
                                    <a class="view-full-screen" href="{{ asset('hurst/img/single-product/large/1.jpg') }}"  data-lightbox="roadtrip" data-title="My caption">
                                        <i class="zmdi zmdi-zoom-in"></i>
                                    </a>
                                </div>
                                <div>
                                    <img src="{{ asset('hurst/img/single-product/medium/2.jpg') }}" alt="" />
                                    <a class="view-full-screen" href="{{ asset('hurst/img/single-product/large/2.jpg') }}"  data-lightbox="roadtrip" data-title="My caption">
                                        <i class="zmdi zmdi-zoom-in"></i>
                                    </a>
                                </div>
                                <div>
                                    <img src="{{ asset('hurst/img/single-product/medium/3.jpg') }}" alt="" />
                                    <a class="view-full-screen" href="{{ asset('hurst/img/single-product/large/3.jpg') }}"  data-lightbox="roadtrip" data-title="My caption">
                                        <i class="zmdi zmdi-zoom-in"></i>
                                    </a>
                                </div>
                                <div>
                                    <img src="{{ asset('hurst/img/single-product/medium/4.jpg') }}" alt="" />
                                    <a class="view-full-screen" href="{{ asset('hurst/img/single-product/large/4.jpg') }}"  data-lightbox="roadtrip" data-title="My caption">
                                        <i class="zmdi zmdi-zoom-in"></i>
                                    </a>
                                </div>
                                <div>
                                    <img src="{{ asset('hurst/img/single-product/medium/5.jpg') }}" alt="" />
                                    <a class="view-full-screen" href="{{ asset('hurst/img/single-product/large/5.jpg') }}"  data-lightbox="roadtrip" data-title="My caption">
                                        <i class="zmdi zmdi-zoom-in"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- Single-pro-slider Big-photo end -->
                            <div class="product-info">
                                <div class="fix">
                                    <h4 class="post-title floatleft">dummy Product name</h4>
                                    <span class="pro-rating floatright">
                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                        <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                        <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                        <span>( 27 Rating )</span>
                                    </span>
                                </div>
                                <div class="fix mb-20">
                                    <span class="pro-price">$ 56.20</span>
                                </div>
                                <div class="product-description">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have be suffered alteration in some form, by injected humou or randomised words which donot look even slightly believable. If you are going to use a passage of Lorem Ipsum. </p>
                                </div>
                                <!-- color start -->
                                <div class="color-filter single-pro-color mb-20 clearfix">
                                    <ul>
                                        <li><span class="color-title text-capitalize">color</span></li>
                                        <li><a class="active" href="#"><span class="color color-1"></span></a></li>
                                        <li><a href="#"><span class="color color-2"></span></a></li>
                                        <li><a href="#"><span class="color color-7"></span></a></li>
                                        <li><a href="#"><span class="color color-3"></span></a></li>
                                        <li><a href="#"><span class="color color-4"></span></a></li>
                                    </ul>
                                </div>
                                <!-- color end -->
                                <!-- Size start -->
                                <div class="size-filter single-pro-size mb-35 clearfix">
                                    <ul>
                                        <li><span class="color-title text-capitalize">size</span></li>
                                        <li><a href="#">M</a></li>
                                        <li><a class="active" href="#">S</a></li>
                                        <li><a href="#">L</a></li>
                                        <li><a href="#">SL</a></li>
                                        <li><a href="#">XL</a></li>
                                    </ul>
                                </div>
                                <!-- Size end -->
                                <div class="clearfix">
                                    <div class="cart-plus-minus">
                                        <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                    </div>
                                    <div class="product-action clearfix">
                                        <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                        <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                        <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                        <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                    </div>
                                </div>
                                <!-- Single-pro-slider Small-photo start -->
                                <div class="single-pro-slider single-sml-photo slider-nav">
                                    <div>
                                        <img src="{{ asset('hurst/img/single-product/small/1.jpg') }}" alt="" />
                                    </div>
                                    <div>
                                        <img src="{{ asset('hurst/img/single-product/small/2.jpg') }}" alt="" />
                                    </div>
                                    <div>
                                        <img src="{{ asset('hurst/img/single-product/small/3.jpg') }}" alt="" />
                                    </div>
                                    <div>
                                        <img src="{{ asset('hurst/img/single-product/small/4.jpg') }}" alt="" />
                                    </div>
                                    <div>
                                        <img src="{{ asset('hurst/img/single-product/small/5.jpg') }}" alt="" />
                                    </div>
                                </div>
                                <!-- Single-pro-slider Small-photo end -->
                            </div>
                        </div>
                    </div>
                    <!-- Single-product end -->
                </div>
                <!-- single-product-tab start -->
                <div class="single-pro-tab">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="single-pro-tab-menu">
                                <!-- Nav tabs -->
                                <ul class="nav d-block">
                                    <li><a href="#description" data-bs-toggle="tab">Description</a></li>
                                    <li><a class="active" href="#reviews"  data-bs-toggle="tab">Reviews</a></li>
                                    <li><a href="#information" data-bs-toggle="tab">Information</a></li>
                                    <li><a href="#tags" data-bs-toggle="tab">Tags</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane" id="description">
                                    <div class="pro-tab-info pro-description">
                                        <h3 class="tab-title title-border mb-30">dummy Product name</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at est bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at est bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at est bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                    </div>
                                </div>
                                <div class="tab-pane active" id="reviews">
                                    <div class="pro-tab-info pro-reviews">
                                        <div class="customer-review mb-60">
                                            <h3 class="tab-title title-border mb-30">Customer review</h3>
                                            <ul class="product-comments clearfix">
                                                <li class="mb-30">
                                                    <div class="pro-reviewer">
                                                        <img src="{{ asset('hurst/img/reviewer/1.jpg') }}" alt="" />
                                                    </div>
                                                    <div class="pro-reviewer-comment">
                                                        <div class="fix">
                                                            <div class="floatleft mbl-center">
                                                                <h5 class="text-uppercase mb-0"><strong>Gerald Barnes</strong></h5>
                                                                <p class="reply-date">27 Jun, 2021 at 2:30pm</p>
                                                            </div>
                                                            <div class="comment-reply floatright">
                                                                <a href="#"><i class="zmdi zmdi-mail-reply"></i></a>
                                                                <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                            </div>
                                                        </div>
                                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at est bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                                    </div>
                                                </li>
                                                <li class="threaded-comments">
                                                    <div class="pro-reviewer">
                                                        <img src="{{ asset('hurst/img/reviewer/1.jpg') }}" alt="" />
                                                    </div>
                                                    <div class="pro-reviewer-comment">
                                                        <div class="fix">
                                                            <div class="floatleft mbl-center">
                                                                <h5 class="text-uppercase mb-0"><strong>Gerald Barnes</strong></h5>
                                                                <p class="reply-date">27 Jun, 2021 at 2:30pm</p>
                                                            </div>
                                                            <div class="comment-reply floatright">
                                                                <a href="#"><i class="zmdi zmdi-mail-reply"></i></a>
                                                                <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                            </div>
                                                        </div>
                                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at est bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="leave-review">
                                            <h3 class="tab-title title-border mb-30">Leave your reviw</h3>
                                            <div class="your-rating mb-30">
                                                <p class="mb-10"><strong>Your Rating</strong></p>
                                                <span>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                </span>
                                                <span class="separator">|</span>
                                                <span>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                </span>
                                                <span class="separator">|</span>
                                                <span>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                </span>
                                                <span class="separator">|</span>
                                                <span>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                </span>
                                                <span class="separator">|</span>
                                                <span>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                </span>
                                            </div>
                                            <div class="reply-box">
                                                <form action="#">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input type="text" placeholder="Your name here..." name="name" />
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" placeholder="Subject..." name="name" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <textarea class="custom-textarea" name="message" placeholder="Your review here..." ></textarea>
                                                            <button type="submit" data-text="submit review" class="button-one submit-button mt-20">submit review</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="information">
                                    <div class="pro-tab-info pro-information">
                                        <h3 class="tab-title title-border mb-30">Product information</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at est bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at est bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at est bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tags">
                                    <div class="pro-tab-info pro-information">
                                        <h3 class="tab-title title-border mb-30">tags</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at est bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at est bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at est bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single-product-tab end -->
            </div>
        </div>
        <!-- PRODUCT-AREA END -->
@endsection

@section('js')
    <script>
        $('#quick_view_btn').click(function(){
            $('#modal-img').attr('src', $(this).attr('data-img'));
            $('#modal-nama').text($(this).attr('data-nama'));
            $('#modal-harga').text($(this).attr('data-harga'));
            $('#modal-link').attr('href', $(this).attr('data-link'));
            $('#modal-deskripsi').html($(this).attr('data-deskripsi'));
        });
    </script>
@endsection
