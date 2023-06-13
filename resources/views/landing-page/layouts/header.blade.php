@php
    use App\Models\Profil;
    use Carbon\Carbon;

    $profil = Profil::first();
@endphp
<!-- HEADER-AREA START -->
<header id="sticky-menu" class="header header-2">
    <div class="header-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 offset-md-4 col-7">
                    <div class="logo text-md-center">
                        <a href="{{ route('beranda') }}"><img src="{{ asset('images/razen-style/logo/'.$profil->logo) }}" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MAIN-MENU START -->
    <div class="menu-toggle menu-toggle-2 hamburger hamburger--emphatic d-none d-md-block">
        <div class="hamburger-box">
            <div class="hamburger-inner"></div>
        </div>
    </div>
    <div class="main-menu  d-none d-md-block">
        <nav>
            <ul>
                <li><a href="{{ route('beranda') }}">Beranda</a></li>
                <li><a href="{{ route('perusahaan') }}">Perusahaan</a></li>
                <li><a href="https://shop.razen.co.id/stores/razen-style" target="blank">E-Commerce</a></li>
                <li><a href="#">E-Learning</a></li>
                <li><a href="{{ route('produk') }}">Produk</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="{{ route('kontak') }}">Kontak</a></li>
            </ul>
        </nav>
    </div>
    <!-- MAIN-MENU END -->
</header>
<!-- HEADER-AREA END -->
<!-- Mobile-menu start -->
<div class="mobile-menu-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 d-block d-md-none">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul>
                            <li><a href="{{ route('beranda') }}">Beranda</a></li>
                            <li><a href="{{ route('perusahaan') }}">Perusahaan</a></li>
                            <li><a href="#">E-Commerce</a></li>
                            <li><a href="https://shop.razen.co.id/stores/razen-style" target="blank">E-Learning</a></li>
                            <li><a href="{{ route('produk') }}">Produk</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="{{ route('kontak') }}">Kontak</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile-menu end -->
