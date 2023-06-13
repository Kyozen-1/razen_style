<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profil;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Brand;
use App\Models\Tim;
use App\Models\PivotTimMediaSosial;
use App\Models\MasterMediaSosial;
use GuzzleHttp\Client as GuzzleHttpClient;

class HomeController extends Controller
{
    public function beranda()
    {
        $brands = Brand::all();
        $guzzleClient = new GuzzleHttpClient();

        $get_product_featured = $guzzleClient->get(env('RAZEN_URL').'api/product/razen-style/produk-featured');
        $product_featureds = json_decode($get_product_featured->getBody())->data;
        return view('landing-page.beranda.index', [
            'brands' => $brands,
            'product_featureds' => $product_featureds
        ]);
    }

    public function perusahaan()
    {
        $tims = Tim::all();
        return view('landing-page.perusahaan.index', [
            'tims' => $tims
        ]);
    }

    public function produk()
    {
        return view('landing-page.produk.index');
    }

    public function kontak()
    {
        $profil = Profil::first();
        return view('landing-page.kontak.index', [
            'profil' => $profil
        ]);
    }

    public function kontak_kami(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required | max:255',
            'email' => 'required | max:255',
            'no_hp' => 'required | max:255',
            'subjek' => 'required',
            'message' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'subjek' => $request->subjek,
            'body' => $request->message
        ];

        Mail::send('emails.kontak-kami', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('skadi1268@gmail.com', 'Kristoforus Fasco');
            $message->subject($data['subjek']);
        });

        Alert::success('Berhasil', 'Berhasil Mengirimkan pesan');
        return redirect()->route('kontak');
    }
}
