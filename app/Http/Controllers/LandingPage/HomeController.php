<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function beranda()
    {
        return view('landing-page.beranda.index');
    }

    public function perusahaan()
    {
        return view('landing-page.perusahaan.index');
    }

    public function produk()
    {
        return view('landing-page.produk.index');
    }

    public function kontak()
    {
        return view('landing-page.kontak.index');
    }
}
