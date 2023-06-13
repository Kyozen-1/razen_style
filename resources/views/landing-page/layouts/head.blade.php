    @php
        use App\Models\Profil;
        use Carbon\Carbon;

        $profil = Profil::first();
    @endphp
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'Beranda | Razen Style')</title>
    <meta name="description" content="{{$profil->deskripsi}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/razen-style/logo/'.$profil->logo_kecil) }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>

    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="{{ asset('hurst/css/bootstrap.min.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('hurst/css/animate.min.css') }}">
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href="{{ asset('hurst/css/jquery-ui.min.css') }}">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{ asset('hurst/css/meanmenu.min.css') }}">
    <!-- nivo-slider css -->
    <link rel="stylesheet" href="{{ asset('hurst/lib/css/nivo-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('hurst/lib/css/preview.css') }}">
    <!-- slick css -->
    <link rel="stylesheet" href="{{ asset('hurst/css/slick.min.css') }}">
    <!-- lightbox css -->
    <link rel="stylesheet" href="{{ asset('hurst/css/lightbox.min.css') }}">
    <!-- material-design-iconic-font css -->
    <link rel="stylesheet" href="{{ asset('hurst/css/material-design-iconic-font.css') }}">
    <!-- All common css of theme -->
    <link rel="stylesheet" href="{{ asset('hurst/css/default.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('hurst/style.min.css') }}">
    <!-- shortcode css -->
    <link rel="stylesheet" href="{{ asset('hurst/css/shortcode.css') }}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('hurst/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset('hurst/js/vendor/modernizr-3.11.2.min.js') }}"></script>
    @yield('css')
