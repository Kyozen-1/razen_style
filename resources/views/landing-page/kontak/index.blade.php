@extends('landing-page.layouts.app')
@section('title', 'Kontak | Razen Style')

@section('content')
    @php
        use App\Models\LandingPageKontak;

        $kontak = LandingPageKontak::first();

        $section_1 = json_decode($kontak->section_1, true);
    @endphp
    <!-- HEADING-BANNER START -->
    <div class="heading-banner-area overlay-bg" style="background:rgba(0,0,0,0) url({{asset('images/landing-page/kontak/'.$section_1['gambar'])}}) no-repeat scroll center center/cover" id="heading-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-banner">
                        <div class="heading-banner-title">
                            <h2>Kontak</h2>
                        </div>
                        <div class="breadcumbs pb-15">
                            <ul>
                                <li><a href="{{ route('beranda') }}">Beranda</a></li>
                                <li>Kontak</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- HEADING-BANNER END -->
    <!-- contact-us-AREA START -->
    <div class="contact-us-area  pt-80 pb-80">
        <div class="container">
            <div class="contact-us customer-login bg-white">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="contact-details">
                            <h4 class="title-1 title-border text-uppercase mb-30">Detail Kontak</h4>
                            <ul>
                                <li>
                                    <i class="zmdi zmdi-pin"></i>
                                    <span>{{$profil->alamat}}</span>
                                </li>
                                <li>
                                    <i class="zmdi zmdi-phone"></i>
                                    <span>{{$profil->no_hp}}</span>
                                </li>
                                <li>
                                    <i class="zmdi zmdi-email"></i>
                                    <span>{{$profil->email}}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="send-message mt-60">
                            <form id="contact-form" action="{{ route('kontak-kami') }}" method="POST">
                                <h4 class="title-1 title-border text-uppercase mb-30">Kirim Pesan</h4>
                                @csrf
                                <input type="text" name="nama" placeholder="Masukan nama anda" />
                                <input type="text" name="email" placeholder="Masukkan email" />
                                <input type="text" name="no_hp" placeholder="Masukan Nomor HP" />
                                <input type="text" name="subjek" placeholder="Masukan subjek" />
                                <textarea class="custom-textarea" name="message" placeholder="Masukan pesan"></textarea>
                                <button class="button-one submit-button mt-20" data-text="submit message" type="submit">Kirim Pesan</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 mt-xs-30">
                        <div class="map-area">
                            <div class="gmap_canvas">
                                <iframe width="100%" height="800" id="gmap_canvas" src="https://maps.google.com/maps?q=razen%20teknologi&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                <a href="https://123movies-i.net">lethal weapon 1987 123movies</a><br><style>.mapouter{position:relative;text-align:right;height:800px;width:100%;}</style><a href="https://www.embedgooglemap.net">embedding google maps into website</a>
                                <style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}</style>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ABOUT-US-AREA END -->

@endsection

@section('js')
@endsection
