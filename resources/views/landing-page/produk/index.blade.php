@extends('landing-page.layouts.app')
@section('title', 'Produk | Razen Style')

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
                        <h2>Produk</h2>
                    </div>
                    <div class="breadcumbs pb-15">
                        <ul>
                            <li><a href="{{ route('beranda') }}">Beranda</a></li>
                            <li>Produk</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- HEADING-BANNER END -->

<!-- PRODUCT-AREA START -->
<div class="product-area pt-80 pb-80 product-style-2">
    <div class="container">
        <!-- Shop-Content End -->
        <div class="shop-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-option mb-30 clearfix">
                        <div class="showing text-end">
                            <p class="mb-0 d-none d-md-block">Showing {{$products->from}}-{{$products->to}} of {{$products->total}} Results</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <!-- Single-product start -->
                        @foreach ($products->data as $produk)
                            <div class="col-xl-3 col-md-4">
                                <div class="single-product">
                                    <div class="product-img">
                                        @if ($produk->label)
                                            <span class="pro-label new-label">{{$produk->label[0]->nama}}</span>
                                        @endif
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
                        <!-- Single-product end -->
                    </div>
                </div>
                <div class="col-md-12">
                    <!-- Pagination start -->
                    <div class="shop-pagination  text-center">
                        <div class="pagination">
                            <ul>
                                @if ($products->prev_page_url)
                                    <li><a href="{{$products->prev_page_url}}"><i class="zmdi zmdi-long-arrow-left"></i></a></li>
                                @endif
                                @foreach ($products->links as $link)
                                    @if ($link->url != null)
                                        <li><a @if($link->active == true) class="active" @endif href="{{$link->url}}">{{$link->label}}</a></li>
                                    @endif
                                @endforeach
                                @if ($products->next_page_url)
                                    <li><a href="{{$products->prev_page_url}}"><i class="zmdi zmdi-long-arrow-right"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <!-- Pagination end -->
                </div>
            </div>
        </div>
        <!-- Shop-Content End -->
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
