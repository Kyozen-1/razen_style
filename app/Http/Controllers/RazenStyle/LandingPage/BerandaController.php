<?php

namespace App\Http\Controllers\RazenStyle\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use Validator;
use DataTables;
use Carbon\Carbon;
use Auth;
use App\Models\LandingPageBeranda;
use App\Models\LandingPageBannerBeranda;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $data = LandingPageBannerBeranda::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function($data){
                    $button_show = '<button type="button" name="detail" id="'.$data->id.'" class="detail btn btn-icon waves-effect btn-info" title="Detail Data"><i class="fas fa-eye"></i></button>';
                    $button_edit = '<button type="button" name="edit" id="'.$data->id.'"
                    class="edit btn btn-icon waves-effect btn-warning" title="Edit Data"><i class="fas fa-edit"></i></button>';
                    $button_delete = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-icon waves-effect btn-danger" title="Delete Data"><i class="fas fa-trash"></i></button>';
                    $button = $button_show . ' ' . $button_edit . ' ' . $button_delete;
                    return $button;
                })
                ->editColumn('gambar', function($data) {
                    return '<img src="'.asset('images/landing-page/beranda/'.$data->gambar).'" style="height:5rem;">';
                })
                ->editColumn('judul', function($data) {
                    return strip_tags(substr($data->judul,0, 20)) . '...';
                })
                ->editColumn('deskripsi', function($data) {
                    return strip_tags(substr($data->deskripsi,0, 20)) . '...';
                })
                ->rawColumns(['aksi', 'gambar'])
                ->make(true);
        }
        return view('razen-style.landing-page.beranda.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'gambar' => 'required | mimes:png,jpg,jpeg,webp',
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);

        if($errors -> fails())
        {
            return response()->json(['errors' => $errors->errors()->all()]);
        }

        $gambarExtension = $request->gambar->extension();
        $gambarName =  uniqid().'-'.date("ymd").'.'.$gambarExtension;
        $gambar = Image::make($request->gambar);
        $gambarSize = public_path('images/landing-page/beranda/'.$gambarName);
        $gambar->save($gambarSize, 60);

        $banner = new LandingPageBannerBeranda;
        $banner->judul = $request->judul;
        $banner->deskripsi = $request->deskripsi;
        $banner->gambar = $gambarName;
        $banner->save();

        return response()->json(['success' => 'Berhasil menambahkan Banner']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['result' => LandingPageBannerBeranda::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json(['result' => LandingPageBannerBeranda::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);

        if($errors -> fails())
        {
            return response()->json(['errors' => $errors->errors()->all()]);
        }

        $banner = LandingPageBannerBeranda::find($request->hidden_id);
        $banner->judul = $request->judul;
        $banner->deskripsi = $request->deskripsi;
        if($request->gambar)
        {
            File::delete(public_path('images/landing-page/beranda/'.$banner->gambar));

            $gambarExtension = $request->gambar->extension();
            $gambarName =  uniqid().'-'.date("ymd").'.'.$gambarExtension;
            $gambar = Image::make($request->gambar);
            $gambarSize = public_path('images/landing-page/beranda/'.$gambarName);
            $gambar->save($gambarSize, 60);

            $banner->gambar = $gambarName;
        }
        $banner->save();

        return response()->json(['success' => 'Berhasil Merubah Banner']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = LandingPageBannerBeranda::find($id);

        File::delete(public_path('images/landing-page/beranda/'.$banner->gambar));

        $banner->delete();
    }

    public function store_section_3(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'judul' => 'required',
        ]);

        if($errors -> fails())
        {
            Alert::error('Gagal Menyimpan!', $errors->errors()->all()[0]);
            return redirect()->route('razen-style.landing-page.beranda.index');
        }

        $cek = LandingPageBeranda::first();
        if($cek)
        {
            $beranda = LandingPageBeranda::find($cek->id);
        } else {
            $beranda = new LandingPageBeranda;
        }

        $array = [
            'judul' => $request->judul
        ];

        $beranda->section_3 = json_encode($array);
        $beranda->save();

        Alert::success('Berhasil', 'Berhasil Merubah Tampilan Section 3');
        return redirect()->route('razen-style.landing-page.beranda.index');
    }

    public function store_section_5(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'judul' => 'required',
        ]);

        if($errors -> fails())
        {
            Alert::error('Gagal Menyimpan!', $errors->errors()->all()[0]);
            return redirect()->route('razen-style.landing-page.beranda.index');
        }

        $cek = LandingPageBeranda::first();
        if($cek)
        {
            $beranda = LandingPageBeranda::find($cek->id);
        } else {
            $beranda = new LandingPageBeranda;
        }

        $array = [
            'judul' => $request->judul
        ];

        $beranda->section_5 = json_encode($array);
        $beranda->save();

        Alert::success('Berhasil', 'Berhasil Merubah Tampilan Section 5');
        return redirect()->route('razen-style.landing-page.beranda.index');
    }

    public function store_section_6(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'judul' => 'required',
        ]);

        if($errors -> fails())
        {
            Alert::error('Gagal Menyimpan!', $errors->errors()->all()[0]);
            return redirect()->route('razen-style.landing-page.beranda.index');
        }

        $cek = LandingPageBeranda::first();
        if($cek)
        {
            $beranda = LandingPageBeranda::find($cek->id);
        } else {
            $beranda = new LandingPageBeranda;
        }

        $array = [
            'judul' => $request->judul
        ];

        $beranda->section_6 = json_encode($array);
        $beranda->save();

        Alert::success('Berhasil', 'Berhasil Merubah Tampilan Section 6');
        return redirect()->route('razen-style.landing-page.beranda.index');
    }
}
