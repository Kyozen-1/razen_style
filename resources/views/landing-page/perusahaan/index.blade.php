@extends('landing-page.layouts.app')
@section('title', 'Perusahaan | Razen Style')

@section('content')
    @php
        use App\Models\LandingPagePerusahaan;
        use App\Models\Tim;
        use App\Models\PivotTimMediaSosial;
        use App\Models\MasterMediaSosial;

        $perusahaan = LandingPagePerusahaan::first();

        $section_1 = json_decode($perusahaan->section_1, true);
        $section_2 = json_decode($perusahaan->section_2, true);
        $section_3 = json_decode($perusahaan->section_3, true);
    @endphp
    <!-- HEADING-BANNER START -->
    <div class="heading-banner-area overlay-bg" id="heading-banner-area" style="background:rgba(0,0,0,0) url({{asset('images/landing-page/perusahaan/'.$section_1['gambar'])}}) no-repeat scroll center center/cover">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-banner">
                        <div class="heading-banner-title">
                            <h2>Perusahaan</h2>
                        </div>
                        <div class="breadcumbs pb-15">
                            <ul>
                                <li><a href="{{ route('beranda') }}">Beranda</a></li>
                                <li>Perusahaan</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- HEADING-BANNER END -->
    <!-- ABOUT-US-AREA START -->
    <div class="about-us-area  pt-80 pb-80" id="about-us-area">
        <div class="container">
            <div class="about-us bg-white">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-photo">
                            <img src="{{ asset('images/landing-page/perusahaan/'.$section_2['gambar']) }}" alt="" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-brief bg-dark-white">
                            <h4 class="title-1 title-border text-uppercase mb-30">{{$section_2?$section_2['judul'] : ''}}</h4>
                            {!! $section_2?$section_2['deskripsi'] : '' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ABOUT-US-AREA END -->
    <!-- TEAM-MEMBER-AREA END -->
    <div class="team-member-area pb-80" id="team-member-area">
        <div class="container">
            <!-- Section-title start -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2 class="title-border">{{$section_3?$section_3['judul']:'' }}</h2>
                    </div>
                </div>
            </div>
            <!-- Section-title end -->
            <div class="team-member">
                <div class="row">
                    @foreach ($tims as $tim)
                        <div class="col-lg-3 col-md-6">
                            <div class="single-member text-center bg-white mt-25">
                                <img src="{{ asset('images/razen-style/tim/'.$tim->foto) }}" alt="" />
                                <h3 class="text-uppercase mt-20">{{$tim->nama}}</h3>
                                <h4 class="text-uppercase text-gray">{{$tim->jabatan}}</h4>
                                <p class="text-gray">{{$tim->deskripsi}}</p>
                                <div class="team-social">
                                    <ul>
                                        @php
                                            $pivots = PivotTimMediaSosial::where('tim_id', $tim->id)->get();
                                        @endphp
                                        @foreach ($pivots as $pivot)
                                            <li><a href="{{$pivot->tautan}}"><i class="{{$pivot->media_sosial->kode_ikon}}"></i></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- TEAM-MEMBER-AREA END -->
@endsection
