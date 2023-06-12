<?php

namespace App\Http\Controllers\RazenStyle\Admin;

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
use App\Models\Tim;
use App\Models\PivotTimMediaSosial;
use App\Models\MasterMediaSosial;

class TimController extends Controller
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
            $data = Tim::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function($data){
                    $button_show = '<a href="'.route('razen-style.admin.tim.show', ['id' => $data->id]).'" class="detail btn btn-icon waves-effect btn-info" title="Detail Data"><i class="fas fa-eye"></i></a>';
                    $button_edit = '<a href="'.route('razen-style.admin.tim.edit', ['id' => $data->id]).'" class="edit btn btn-icon waves-effect btn-warning" title="Edit Data"><i class="fas fa-edit"></i></a>';
                    $button_delete = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-icon waves-effect btn-danger" title="Delete Data"><i class="fas fa-trash"></i></button>';
                    $button = $button_show . ' ' . $button_edit . ' ' . $button_delete;
                    return $button;
                })
                ->addColumn('media_sosial', function($data){
                    $pivots = PivotTimMediaSosial::where('tim_id', $data->id)->get();
                    $list = '<ul>';
                    foreach ($pivots as $pivot) {
                        $list .='<li>'.$pivot->media_sosial->nama.': '.$pivot->tautan.'</li>';
                    }
                    $list .='</ul>';
                    return $list;
                })
                ->editColumn('foto', function($data){
                    return '<img src="'.asset('images/razen-style/tim/'.$data->foto).'" style="height:5rem;">';
                })
                ->editColumn('deskripsi', function($data) {
                    return strip_tags(substr($data->deskripsi,0, 20)) . '...';
                })
                ->rawColumns(['aksi', 'foto', 'media_sosial'])
                ->make(true);
        }
        return view('razen-style.admin.tim.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $media_sosial = MasterMediaSosial::pluck('nama', 'id');

        return view('razen-style.admin.tim.create', [
            'media_sosial' => $media_sosial
        ]);
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
            'nama' => 'required | max:255',
            'deskripsi' => 'required',
            'jabatan' => 'required | max:255',
            'foto' => 'required | mimes:png,jpg,jpeg,webp',
            'data_media_sosial' => 'required'
        ]);

        if($errors -> fails())
        {
            return back()->withErrors($errors)->withInput();
        }

        $fotoExtension = $request->foto->extension();
        $fotoName =  uniqid().'-'.date("ymd").'.'.$fotoExtension;
        $foto = Image::make($request->foto);
        $fotoSize = public_path('images/razen-style/tim/'.$fotoName);
        $foto->save($fotoSize, 60);

        $tim = new Tim;
        $tim->jabatan = $request->jabatan;
        $tim->nama = $request->nama;
        $tim->deskripsi = $request->deskripsi;
        $tim->foto = $fotoName;
        $tim->save();

        $data_media_sosial = $request->data_media_sosial;
        for ($i=0; $i < count($data_media_sosial); $i++) {
            $pivot = new PivotTimMediaSosial;
            $pivot->media_sosial_id = $data_media_sosial[$i]['master_media_sosial_id'];
            $pivot->tim_id = $tim->id;
            $pivot->tautan = $data_media_sosial[$i]['tautan'];
            $pivot->save();
        }

        Alert::success('Berhasil', 'Berhasil menambahkan data');
        return redirect()->route('razen-style.admin.tim.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tim = Tim::find($id);

        $get_pivot = PivotTimMediaSosial::where('tim_id', $id)->first();
        $pivot = [];
        if($get_pivot)
        {
            $pivot = [
                'status' => 'ada',
                'data' => PivotTimMediaSosial::where('tim_id', $id)->get()
            ];
        } else {
            $pivot = [
                'status' => 'tidak_ada',
                'data' => ''
            ];
        }

        return view('razen-style.admin.tim.detail', [
            'tim' => $tim,
            'pivot' => $pivot
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tim = Tim::find($id);

        $get_pivot = PivotTimMediaSosial::where('tim_id', $id)->first();
        $pivot = [];
        if($get_pivot)
        {
            $pivot = [
                'status' => 'ada',
                'data' => PivotTimMediaSosial::where('tim_id', $id)->get()
            ];
        } else {
            $pivot = [
                'status' => 'tidak_ada',
                'data' => ''
            ];
        }

        $media_sosial = MasterMediaSosial::pluck('nama', 'id');

        return view('razen-style.admin.tim.edit', [
            'tim' => $tim,
            'pivot' => $pivot,
            'media_sosial' => $media_sosial,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tim = Tim::find($id);
        $tim->jabatan = $request->jabatan;
        $tim->deskripsi = $request->deskripsi;
        $tim->nama = $request->nama;
        if($request->foto)
        {
            $timFoto = $tim->foto;
            File::delete(public_path('images/razen-style/tim/'.$timFoto));

            $fotoExtension = $request->foto->extension();
            $fotoName =  uniqid().'-'.date("ymd").'.'.$fotoExtension;
            $foto = Image::make($request->foto);
            $fotoSize = public_path('images/razen-style/tim/'.$fotoName);
            $foto->save($fotoSize, 60);

            $tim->foto = $fotoName;
        }
        $tim->save();

        if($request->edit_data_tim)
        {
            $edit_data_tim = array_values($request->edit_data_tim);
            for ($i=0; $i < count($edit_data_tim); $i++) {
                $pivot = PivotTimMediaSosial::find($edit_data_tim[$i]['pivot_tim_media_sosial_id']);
                $pivot->media_sosial_id = $edit_data_tim[$i]['master_media_sosial_id'];
                $pivot->tautan = $edit_data_tim[$i]['tautan'];
                $pivot->save();
            }
        }

        if($request->hapus_id_pivot)
        {
            $hapus_id_pivot = explode(',', $request->hapus_id_pivot);
            for ($i=0; $i < count($hapus_id_pivot); $i++) {
                PivotTimMediaSosial::find($hapus_id_pivot[$i])->delete();
            }
        }

        if($request->data_media_sosial)
        {
            $data_media_sosial = $request->data_media_sosial;
            for ($i=0; $i < count($data_media_sosial); $i++) {
                $pivot = new PivotTimMediaSosial;
                $pivot->tim_id = $id;
                $pivot->media_sosial_id = $data_media_sosial[$i]['master_media_sosial_id'];
                $pivot->tautan = $data_media_sosial[$i]['tautan'];
                $pivot->save();
            }
        }

        Alert::success('Berhasil', 'Berhasil merubah data');
        return redirect()->route('razen-style.admin.tim.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tim = Tim::find($id);

        $razenProjectSectionTim = $tim->foto;
        File::delete(public_path('images/razen-style/tim/'.$razenProjectSectionTim));

        $pivots = PivotTimMediaSosial::where('tim_id', $id)->get();
        foreach ($pivots as $pivot) {
            PivotTimMediaSosial::where('tim_id', $pivot->id)->delete();
        }
        $tim->delete();
    }
}
