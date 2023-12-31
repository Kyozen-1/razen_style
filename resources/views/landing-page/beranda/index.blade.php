@extends('landing-page.layouts.app')
@section('title', 'Beranda | Razen Style')

@section('content')
    @php
        use App\Models\LandingPageBeranda;
        use App\Models\LandingPageBannerBeranda;
        use Carbon\Carbon;

        $banners = LandingPageBannerBeranda::all();

        $beranda = LandingPageBeranda::first();

        $section_2 = json_decode($beranda->section_2, true);
        $section_3 = json_decode($beranda->section_3, true);
        $section_5 = json_decode($beranda->section_5, true);
        $section_6 = json_decode($beranda->section_6, true);
    @endphp
    <!-- SLIDER-AREA START  -->
    <section class="slider-area slider-style-2" id="slider-area">
        <div class="bend niceties preview-2">
            <div id="ensign-nivoslider" class="slides">
                @foreach ($banners as $banner)
                    <img src="{{ asset('images/landing-page/beranda/'.$banner->gambar) }}" alt="" title="#slider-direction-{{$banner->id}}"  />
                @endforeach
            </div>
            @foreach ($banners as $banner)
                <div id="slider-direction-{{$banner->id}}" class="slider-direction">
                    <div class="slider-progress"></div>
                    <div class="slider-content t-lfl s-tb slider-1">
                        <div class="title-container s-tb-c title-compress">
                            <div class="layer-1">
                                <div class="wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <h3 class="slider-title3 text-uppercase mb-0" >{!! $banner->judul !!}</h3>
                                </div>
                                <div class="wow fadeInUpBig" data-wow-duration="2.5s" data-wow-delay="0.5s">
                                    <p class="slider-pro-brief">{!! $banner->deskripsi !!}</p>
                                </div>
                                <div class="wow fadeInUpBig" data-wow-duration="3s" data-wow-delay="0.5s">
                                    <a href="https://shop.razen.co.id/stores/razen-style" class="button-one style-2 text-uppercase mt-20" data-text="Toko Sekarang" target="blank">Toko Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- SLIDER-AREA END -->
    <!-- BANNER-AREA START -->
    <div class="banner-area pt-80" id="banner-area">
        <div class="container">
            <div class="row">
                @if ($product_new)
                    <div class="col-md-5">
                        <!-- Single-banner start -->
                        <div class="single-banner banner-1 banner-4">
                            <a class="banner-thumb" href="#"><img src="{{ env('RAZEN_URL') }}storage/{{json_decode($product_new->gambar)[0]}}" alt="" /></a>
                            <span class="pro-label new-label">{{$product_new->label[0]->nama}}</span>
                            <span class="price">Rp. {{number_format($product_new->harga, 2, ',', '.')}}</span>
                            <div class="banner-brief">
                                <h2 class="banner-title"><a href="#">{{$product_new->nama}}</a></h2>
                                <p class="mb-0">
                                    @php
                                        $kategori_produk = $product_new->kategori_produk;
                                    @endphp
                                    @for ($i = 0; $i < count($kategori_produk); $i++)
                                        {{$kategori_produk[$i]->nama . ", "}}
                                    @endfor
                                </p>
                            </div>
                            <a href="{{preg_replace('#/+#','/',env('RAZEN_URL').$product_new->link)}}" class="button-one font-16px" data-text="Beli Sekarang">Beli Sekarang</a>
                        </div>
                        <!-- Single-banner end -->
                    </div>
                @endif

                @if ($product_new)
                <div class="col-md-7">
                @else
                <div class="col-md-12">
                @endif
                    <!-- Single-banner start -->
                    <div class="single-banner banner-3">
                        <a class="banner-thumb" href="#"><img src="{{ asset('images/landing-page/beranda/'.$section_2['gambar']) }}" alt="" /></a>
                        <div class="banner-brief">
                            <h2 class="banner-title">
                                <a class="text-uppercase" href="#">{{$section_2?$section_2['judul']:'' }}</a>
                            </h2>
                        </div>
                    </div>
                    <!-- Single-banner end -->
                </div>
            </div>
        </div>
    </div>
    <!-- BANNER-AREA END -->
    <!-- PRODUCT-AREA START -->
    <div class="product-area pt-80 pb-30 product-style-2" id="product-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2 class="title-border">{{$section_3?$section_3['judul']:'' }}</h2>
                    </div>
                    <div class="product-slider style-2 arrow-left-right">
                        @foreach ($product_featureds->data as $item)
                            <div class="col-12">
                                <div class="single-product">
                                    <div class="product-img">
                                        <span class="pro-label new-label">{{$item->label[0]->nama}}</span>
                                        <span class="pro-price-2">Rp. {{number_format($item->harga, 2, ',', '.')}}</span>
                                        <a href="{{route('produk-detail', ['id' => $item->id])}}"><img src="{{ env('RAZEN_URL') }}storage/{{json_decode($item->gambar)[0]}}" alt="" /></a>
                                    </div>
                                    <div class="product-info clearfix text-center">
                                        <div class="fix">
                                            <h4 class="post-title"><a href="{{route('produk-detail', ['id' => $item->id])}}">{{$item->nama}}</a></h4>
                                        </div>
                                        {{-- <div class="fix">
                                            <span class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                            </span>
                                        </div> --}}
                                        <div class="product-action clearfix" style="text-align: center !important;">
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#productModal"
                                                id="quick_view_btn"
                                                title="Quick View"
                                                data-nama="{{$item->nama}}"
                                                data-img="{{ env('RAZEN_URL') }}storage/{{json_decode($item->gambar)[0]}}"
                                                data-harga="Rp. {{number_format($item->harga, 2, ',', '.')}}"
                                                data-link="{{preg_replace('#/+#','/',env('RAZEN_URL').$item->link)}}"
                                                data-deskripsi="{{$item->deskripsi}}"
                                                ><i class="zmdi zmdi-zoom-in"></i></a>
                                            <a href="{{preg_replace('#/+#','/',env('RAZEN_URL').$item->link)}}" data-bs-toggle="tooltip" data-placement="top" title="Buka Toko" target="blank"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT-AREA END -->
    <!-- DISCOUNT-PRODUCT START -->
    @if ($product_discount)
    <div class="discount-product-area discount-2" id="discount-product-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="row">
                        <div class="discount-product-slider dots-bottom-right">
                            @foreach ($product_discount as $item)
                                <!-- single-discount-product start -->
                                <div class="col-lg-12">
                                    <div class="discount-product">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5 col-sm-6">
                                                <a href="{{ route('produk-detail', ['id'=>$item->id]) }}">
                                                    <img src="{{ env('RAZEN_URL') }}storage/{{json_decode($item->gambar)[0]}}" alt="" />
                                                </a>
                                            </div>
                                            <div class="col-lg-7 col-md-7 col-sm-6">
                                                <div class="discount-info">
                                                    @php
                                                        $persen_diskon = (($item->harga - $item->harga_diskon) / $item->harga) * 100;
                                                    @endphp
                                                    <h1 class="text-dark-red">Diskon {{$persen_diskon}}%</h1>
                                                    <p>{!!$item->deskripsi!!}</p>
                                                    <a class="button-2 text-dark-red text-uppercase" href="{{preg_replace('#/+#','/',env('RAZEN_URL').$item->link)}}">Dapatkan Diskon <i class="zmdi zmdi-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-discount-product end -->
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- up-comming-product start -->
                <div class="col-lg-4 col-md-4">
                    <div class="up-comming-product">
                        <div class="up-comming-img">
                            <a href="#"><img src="{{ env('RAZEN_URL') }}storage/{{json_decode($product_discount[0]->gambar)[0]}}" alt="" /></a>
                        </div>
                        <div class="up-comming-info text-center">
                            <div class="up-comming-brief">
                                <h4 class="post-title"><a href="#">{{$product_discount[0]->nama}}</a></h4>
                                <h4 class="comming-pro-price">Rp. {{number_format($product_discount[0]->harga_diskon,2, ',','.')}} </h4>
                            </div>
                            <div class="count-down">
                                @if ($product_discount[0]->end_date_diskon)
                                    <div data-countdown="{{date("Y/m/d", strtotime($product_discount[0]->end_date_diskon))}}"></div>
                                @else
                                    <h4 class="post-title">SELAMANYA</h4>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- up-comming-product end -->
            </div>
        </div>
    </div>
    @endif
    <!-- DISCOUNT-PRODUCT END -->
    <!-- PURCHASE-ONLINE-AREA START -->
    <div class="purchase-online-area pt-80 product-style-2" id="purchase-online-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2 class="title-border">{{$section_5?$section_5['judul']:'' }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12  text-center">
                    <!-- Nav tabs -->
                    <ul class="tab-menu nav clearfix">
                        @foreach ($product_koleksi as $item)
                            <li><a @if($loop->first) class="active" @endif href="#{{$item->slug}}" data-bs-toggle="tab">{{$item->nama_koleksi}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-12">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        @foreach ($product_koleksi as $item)
                            <div class="tab-pane @if($loop->first) active @endif" id="{{$item->slug}}">
                                <div class="row">
                                    @foreach ($item->data as $produk)
                                        <div class="col-xl-3 col-lg-4 col-md-6">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <span class="pro-label new-label">{{$produk->label[0]->nama}}</span>
                                                    <span class="pro-price-2">Rp. {{number_format($produk->harga, 2, ',', '.')}}</span>
                                                    <a href="{{route('produk-detail', ['id' => $produk->id])}}"><img src="{{ env('RAZEN_URL') }}storage/{{json_decode($produk->gambar)[0]}}" alt="" /></a>
                                                </div>
                                                <div class="product-info clearfix text-center">
                                                    <div class="fix">
                                                        <h4 class="post-title"><a href="{{route('produk-detail', ['id' => $produk->id])}}">{{$produk->nama}}</a></h4>
                                                    </div>
                                                    {{-- <div class="fix">
                                                        <span class="pro-rating">
                                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                        </span>
                                                    </div> --}}
                                                    <div class="product-action clearfix" style="text-align: center !important;">
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#productModal"
                                                            id="quick_view_btn"
                                                            title="Quick View"
                                                            data-nama="{{$produk->nama}}"
                                                            data-img="{{ env('RAZEN_URL') }}storage/{{json_decode($produk->gambar)[0]}}"
                                                            data-harga="Rp. {{number_format($produk->harga, 2, ',', '.')}}"
                                                            data-link="{{preg_replace('#/+#','/',env('RAZEN_URL').$produk->link)}}"
                                                            data-deskripsi="{{$produk->deskripsi}}"
                                                            ><i class="zmdi zmdi-zoom-in"></i></a>
                                                        <a href="{{preg_replace('#/+#','/',env('RAZEN_URL').$produk->link)}}" data-bs-toggle="tooltip" data-placement="top" title="Buka Toko" target="blank"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                        <div class="tab-pane" id="best-seller">
                            <div class="row">
                                <!-- Single-product start -->
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <span class="pro-label new-label">new</span>
                                            <span class="pro-price-2">$ 56.20</span>
                                            <a href="single-product.html"><img src="{{ asset('hurst/img/product/8.jpg') }}" alt="" /></a>
                                        </div>
                                        <div class="product-info clearfix text-center">
                                            <div class="fix">
                                                <h4 class="post-title"><a href="#">dummy Product name</a></h4>
                                            </div>
                                            <div class="fix">
                                                <span class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                </span>
                                            </div>
                                            <div class="product-action clearfix">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                                <!-- Single-product start -->
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <span class="pro-price-2">$ 56.20</span>
                                            <a href="single-product.html"><img src="{{ asset('hurst/img/product/10.jpg') }}" alt="" /></a>
                                        </div>
                                        <div class="product-info clearfix text-center">
                                            <div class="fix">
                                                <h4 class="post-title"><a href="#">dummy Product name</a></h4>
                                            </div>
                                            <div class="fix">
                                                <span class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                </span>
                                            </div>
                                            <div class="product-action clearfix">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                                <!-- Single-product start -->
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <span class="pro-label sale-label">sale</span>
                                            <span class="pro-price-2">$ 56.20</span>
                                            <a href="single-product.html"><img src="{{ asset('hurst/img/product/11.jpg') }}" alt="" /></a>
                                        </div>
                                        <div class="product-info clearfix text-center">
                                            <div class="fix">
                                                <h4 class="post-title"><a href="#">dummy Product name</a></h4>
                                            </div>
                                            <div class="fix">
                                                <span class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                </span>
                                            </div>
                                            <div class="product-action clearfix">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                                <!-- Single-product start -->
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <span class="pro-price-2">$ 56.20</span>
                                            <a href="single-product.html"><img src="{{ asset('hurst/img/product/9.jpg') }}" alt="" /></a>
                                        </div>
                                        <div class="product-info clearfix text-center">
                                            <div class="fix">
                                                <h4 class="post-title"><a href="#">dummy Product name</a></h4>
                                            </div>
                                            <div class="fix">
                                                <span class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                </span>
                                            </div>
                                            <div class="product-action clearfix">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                                <!-- Single-product start -->
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <span class="pro-label sale-label">sale</span>
                                            <span class="pro-price-2">$ 56.20</span>
                                            <a href="single-product.html"><img src="{{ asset('hurst/img/product/7.jpg') }}" alt="" /></a>
                                        </div>
                                        <div class="product-info clearfix text-center">
                                            <div class="fix">
                                                <h4 class="post-title"><a href="#">dummy Product name</a></h4>
                                            </div>
                                            <div class="fix">
                                                <span class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                </span>
                                            </div>
                                            <div class="product-action clearfix">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                                <!-- Single-product start -->
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <span class="pro-label new-label">new</span>
                                            <span class="pro-price-2">$ 56.20</span>
                                            <a href="single-product.html"><img src="{{ asset('hurst/img/product/4.jpg') }}" alt="" /></a>
                                        </div>
                                        <div class="product-info clearfix text-center">
                                            <div class="fix">
                                                <h4 class="post-title"><a href="#">dummy Product name</a></h4>
                                            </div>
                                            <div class="fix">
                                                <span class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                </span>
                                            </div>
                                            <div class="product-action clearfix">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                                <!-- Single-product start -->
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <span class="pro-price-2">$ 56.20</span>
                                            <a href="single-product.html"><img src="{{ asset('hurst/img/product/3.jpg') }}" alt="" /></a>
                                        </div>
                                        <div class="product-info clearfix text-center">
                                            <div class="fix">
                                                <h4 class="post-title"><a href="#">dummy Product name</a></h4>
                                            </div>
                                            <div class="fix">
                                                <span class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                </span>
                                            </div>
                                            <div class="product-action clearfix">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                                <!-- Single-product start -->
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <span class="pro-price-2">$ 56.20</span>
                                            <a href="single-product.html"><img src="{{ asset('hurst/img/product/2.jpg') }}" alt="" /></a>
                                        </div>
                                        <div class="product-info clearfix text-center">
                                            <div class="fix">
                                                <h4 class="post-title"><a href="#">dummy Product name</a></h4>
                                            </div>
                                            <div class="fix">
                                                <span class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                </span>
                                            </div>
                                            <div class="product-action clearfix">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                            </div>
                        </div>
                        <div class="tab-pane" id="most-view">
                            <div class="row">
                                <!-- Single-product start -->
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <span class="pro-label new-label">new</span>
                                            <span class="pro-price-2">$ 56.20</span>
                                            <a href="single-product.html"><img src="{{ asset('hurst/img/product/11.jpg') }}" alt="" /></a>
                                        </div>
                                        <div class="product-info clearfix text-center">
                                            <div class="fix">
                                                <h4 class="post-title"><a href="#">dummy Product name</a></h4>
                                            </div>
                                            <div class="fix">
                                                <span class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                </span>
                                            </div>
                                            <div class="product-action clearfix">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                                <!-- Single-product start -->
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <span class="pro-label sale-label">sale</span>
                                            <span class="pro-price-2">$ 56.20</span>
                                            <a href="single-product.html"><img src="{{ asset('hurst/img/product/2.jpg') }}" alt="" /></a>
                                        </div>
                                        <div class="product-info clearfix text-center">
                                            <div class="fix">
                                                <h4 class="post-title"><a href="#">dummy Product name</a></h4>
                                            </div>
                                            <div class="fix">
                                                <span class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                </span>
                                            </div>
                                            <div class="product-action clearfix">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                                <!-- Single-product start -->
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <span class="pro-label new-label">new</span>
                                            <span class="pro-price-2">$ 56.20</span>
                                            <a href="single-product.html"><img src="{{ asset('hurst/img/product/9.jpg') }}" alt="" /></a>
                                        </div>
                                        <div class="product-info clearfix text-center">
                                            <div class="fix">
                                                <h4 class="post-title"><a href="#">dummy Product name</a></h4>
                                            </div>
                                            <div class="fix">
                                                <span class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                </span>
                                            </div>
                                            <div class="product-action clearfix">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                                <!-- Single-product start -->
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <span class="pro-label new-label">new</span>
                                            <span class="pro-price-2">$ 56.20</span>
                                            <a href="single-product.html"><img src="{{ asset('hurst/img/product/8.jpg') }}" alt="" /></a>
                                        </div>
                                        <div class="product-info clearfix text-center">
                                            <div class="fix">
                                                <h4 class="post-title"><a href="#">dummy Product name</a></h4>
                                            </div>
                                            <div class="fix">
                                                <span class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                </span>
                                            </div>
                                            <div class="product-action clearfix">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                                <!-- Single-product start -->
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <span class="pro-label sale-label">sale</span>
                                            <span class="pro-price-2">$ 56.20</span>
                                            <a href="single-product.html"><img src="{{ asset('hurst/img/product/7.jpg') }}" alt="" /></a>
                                        </div>
                                        <div class="product-info clearfix text-center">
                                            <div class="fix">
                                                <h4 class="post-title"><a href="#">dummy Product name</a></h4>
                                            </div>
                                            <div class="fix">
                                                <span class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                </span>
                                            </div>
                                            <div class="product-action clearfix">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                                <!-- Single-product start -->
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <span class="pro-label new-label">new</span>
                                            <span class="pro-price-2">$ 56.20</span>
                                            <a href="single-product.html"><img src="{{ asset('hurst/img/product/6.jpg') }}" alt="" /></a>
                                        </div>
                                        <div class="product-info clearfix text-center">
                                            <div class="fix">
                                                <h4 class="post-title"><a href="#">dummy Product name</a></h4>
                                            </div>
                                            <div class="fix">
                                                <span class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                </span>
                                            </div>
                                            <div class="product-action clearfix">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                                <!-- Single-product start -->
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <span class="pro-price-2">$ 56.20</span>
                                            <a href="single-product.html"><img src="{{ asset('hurst/img/product/4.jpg') }}" alt="" /></a>
                                        </div>
                                        <div class="product-info clearfix text-center">
                                            <div class="fix">
                                                <h4 class="post-title"><a href="#">dummy Product name</a></h4>
                                            </div>
                                            <div class="fix">
                                                <span class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                </span>
                                            </div>
                                            <div class="product-action clearfix">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                                <!-- Single-product start -->
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <span class="pro-label new-label">new</span>
                                            <span class="pro-price-2">$ 56.20</span>
                                            <a href="single-product.html"><img src="{{ asset('hurst/img/product/3.jpg') }}" alt="" /></a>
                                        </div>
                                        <div class="product-info clearfix text-center">
                                            <div class="fix">
                                                <h4 class="post-title"><a href="#">dummy Product name</a></h4>
                                            </div>
                                            <div class="fix">
                                                <span class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                </span>
                                            </div>
                                            <div class="product-action clearfix">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                            </div>
                        </div>
                        <div class="tab-pane" id="discounts">
                            <div class="row">
                                <!-- Single-product start -->
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <span class="pro-label sale-label">sale</span>
                                            <span class="pro-price-2">$ 56.20</span>
                                            <a href="single-product.html"><img src="{{ asset('hurst/img/product/3.jpg') }}" alt="" /></a>
                                        </div>
                                        <div class="product-info clearfix text-center">
                                            <div class="fix">
                                                <h4 class="post-title"><a href="#">dummy Product name</a></h4>
                                            </div>
                                            <div class="fix">
                                                <span class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                </span>
                                            </div>
                                            <div class="product-action clearfix">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                                <!-- Single-product start -->
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <span class="pro-label new-label">new</span>
                                            <span class="pro-price-2">$ 56.20</span>
                                            <a href="single-product.html"><img src="{{ asset('hurst/img/product/4.jpg') }}" alt="" /></a>
                                        </div>
                                        <div class="product-info clearfix text-center">
                                            <div class="fix">
                                                <h4 class="post-title"><a href="#">dummy Product name</a></h4>
                                            </div>
                                            <div class="fix">
                                                <span class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                </span>
                                            </div>
                                            <div class="product-action clearfix">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                                <!-- Single-product start -->
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <span class="pro-price-2">$ 56.20</span>
                                            <a href="single-product.html"><img src="{{ asset('hurst/img/product/6.jpg') }}" alt="" /></a>
                                        </div>
                                        <div class="product-info clearfix text-center">
                                            <div class="fix">
                                                <h4 class="post-title"><a href="#">dummy Product name</a></h4>
                                            </div>
                                            <div class="fix">
                                                <span class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                </span>
                                            </div>
                                            <div class="product-action clearfix">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                                <!-- Single-product start -->
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <span class="pro-price-2">$ 56.20</span>
                                            <a href="single-product.html"><img src="{{ asset('hurst/img/product/7.jpg') }}" alt="" /></a>
                                        </div>
                                        <div class="product-info clearfix text-center">
                                            <div class="fix">
                                                <h4 class="post-title"><a href="#">dummy Product name</a></h4>
                                            </div>
                                            <div class="fix">
                                                <span class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                </span>
                                            </div>
                                            <div class="product-action clearfix">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                                <!-- Single-product start -->
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <span class="pro-price-2">$ 56.20</span>
                                            <a href="single-product.html"><img src="{{ asset('hurst/img/product/8.jpg') }}" alt="" /></a>
                                        </div>
                                        <div class="product-info clearfix text-center">
                                            <div class="fix">
                                                <h4 class="post-title"><a href="#">dummy Product name</a></h4>
                                            </div>
                                            <div class="fix">
                                                <span class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                </span>
                                            </div>
                                            <div class="product-action clearfix">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                                <!-- Single-product start -->
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <span class="pro-price-2">$ 56.20</span>
                                            <a href="single-product.html"><img src="{{ asset('hurst/img/product/9.jpg') }}" alt="" /></a>
                                        </div>
                                        <div class="product-info clearfix text-center">
                                            <div class="fix">
                                                <h4 class="post-title"><a href="#">dummy Product name</a></h4>
                                            </div>
                                            <div class="fix">
                                                <span class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                </span>
                                            </div>
                                            <div class="product-action clearfix">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                                <!-- Single-product start -->
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <span class="pro-label sale-label">sale</span>
                                            <span class="pro-price-2">$ 56.20</span>
                                            <a href="single-product.html"><img src="{{ asset('hurst/img/product/10.jpg') }}" alt="" /></a>
                                        </div>
                                        <div class="product-info clearfix text-center">
                                            <div class="fix">
                                                <h4 class="post-title"><a href="#">dummy Product name</a></h4>
                                            </div>
                                            <div class="fix">
                                                <span class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                </span>
                                            </div>
                                            <div class="product-action clearfix">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                                <!-- Single-product start -->
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <span class="pro-label new-label">new</span>
                                            <span class="pro-price-2">$ 56.20</span>
                                            <a href="single-product.html"><img src="{{ asset('hurst/img/product/11.jpg') }}" alt="" /></a>
                                        </div>
                                        <div class="product-info clearfix text-center">
                                            <div class="fix">
                                                <h4 class="post-title"><a href="#">dummy Product name</a></h4>
                                            </div>
                                            <div class="fix">
                                                <span class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                </span>
                                            </div>
                                            <div class="product-action clearfix">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single-product end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PURCHASE-ONLINE-AREA END -->
    <!-- BLGO-AREA START -->
    <div class="blog-area blog-2 pt-50" id="blog-area">
        <div class="container">
            <!-- Section-title start -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2 class="title-border">{{$section_6?$section_6['judul']:'' }}</h2>
                    </div>
                </div>
            </div>
            <!-- Section-title end -->
            <div class="row">
                <!-- Single-blog start -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog mt-30">
                        <div class="blog-photo">
                            <a href="#"><img src="{{ asset('hurst/img/blog/3.jpg') }}" alt="" /></a>
                            <div class="like-share text-center fix">
                                <a href="#"><i class="zmdi zmdi-favorite"></i><span>89 Like</span></a>
                                <a href="#"><i class="zmdi zmdi-comments"></i><span>59 Comments</span></a>
                                <a href="#"><i class="zmdi zmdi-share"></i><span>29 Share</span></a>
                            </div>
                        </div>
                        <div class="blog-info">
                            <div class="post-meta fix">
                                <div class="post-date floatleft"><span class="text-dark-red">30</span></div>
                                <div class="post-year floatleft">
                                    <p class="text-uppercase text-dark-red mb-0">June, 2021</p>
                                    <h4 class="post-title"><a href="#" tabindex="0">Farniture drawing 2021</a></h4>
                                </div>
                            </div>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered If you are going to use a passage  Lorem Ipsum, you alteration in some form.</p>
                            <a href="#" class="button-2 text-dark-red">Read more...</a>
                        </div>
                    </div>
                </div>
                <!-- Single-blog end -->
                <!-- Single-blog start -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog mt-30">
                        <div class="blog-photo">
                            <a href="#"><img src="{{ asset('hurst/img/blog/4.jpg') }}" alt="" /></a>
                            <div class="like-share text-center fix">
                                <a href="#"><i class="zmdi zmdi-favorite"></i><span>89 Like</span></a>
                                <a href="#"><i class="zmdi zmdi-comments"></i><span>59 Comments</span></a>
                                <a href="#"><i class="zmdi zmdi-share"></i><span>29 Share</span></a>
                            </div>
                        </div>
                        <div class="blog-info">
                            <div class="post-meta fix">
                                <div class="post-date floatleft"><span class="text-dark-red">30</span></div>
                                <div class="post-year floatleft">
                                    <p class="text-uppercase text-dark-red mb-0">June, 2021</p>
                                    <h4 class="post-title"><a href="#" tabindex="0">Farniture drawing 2021</a></h4>
                                </div>
                            </div>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered If you are going to use a passage  Lorem Ipsum, you alteration in some form.</p>
                            <a href="#" class="button-2 text-dark-red">Read more...</a>
                        </div>
                    </div>
                </div>
                <!-- Single-blog end -->
                <!-- Single-blog start -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog mt-30">
                        <div class="blog-photo">
                            <a href="#"><img src="{{ asset('hurst/img/blog/5.jpg') }}" alt="" /></a>
                            <div class="like-share text-center fix">
                                <a href="#"><i class="zmdi zmdi-favorite"></i><span>89 Like</span></a>
                                <a href="#"><i class="zmdi zmdi-comments"></i><span>59 Comments</span></a>
                                <a href="#"><i class="zmdi zmdi-share"></i><span>29 Share</span></a>
                            </div>
                        </div>
                        <div class="blog-info">
                            <div class="post-meta fix">
                                <div class="post-date floatleft"><span class="text-dark-red">30</span></div>
                                <div class="post-year floatleft">
                                    <p class="text-uppercase text-dark-red mb-0">June, 2021</p>
                                    <h4 class="post-title"><a href="#" tabindex="0">Farniture drawing 2021</a></h4>
                                </div>
                            </div>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered If you are going to use a passage  Lorem Ipsum, you alteration in some form.</p>
                            <a href="#" class="button-2 text-dark-red">Read more...</a>
                        </div>
                    </div>
                </div>
                <!-- Single-blog end -->
            </div>
        </div>
    </div>
    <!-- BLGO-AREA END -->
    <!-- BRAND-LOGO-AREA START -->
    <div class="brand-logo-area pt-80" id="brand-logo-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand">
                        <div class="brand-slider">
                            @foreach ($brands as $brand)
                                <div class="single-brand">
                                    <a href="#"><img src="{{ asset('images/razen-style/brand/'.$brand->gambar) }}" alt="" /></a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BRAND-LOGO-AREA END -->
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
