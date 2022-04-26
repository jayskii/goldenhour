<?php

namespace App\Http\Controllers;

use App\Models\MstDokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Components\GridView;

class MstDokterController extends Controller
{
    public $layout = 'layouts.backend.main';

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = MstDokter::query();

        $allMstDokter = $query->get();

        return view('mst-dokter.index',[
            'layout' => $this->layout,
            'allMstDokter' => $allMstDokter
        ]);       
    }

    public function read(Request $request)
    {
        $id = $request->get('id');
        $model = MstDokter::findOrFail($id);

        return view('mst-dokter.read',[
            'layout' => $this->layout,
            'model' => $model
        ]);
    }

    public function create(Request $request)
    {
        $model = new MstDokter();

        $referrer = URL::previous();

        if($request->post('process') == 1 AND $model->loadAttributes($request->all())) {

            $referrer = $request->input('referrer');

            $foto = $request->file('foto');
            $nama_foto=null;

            if($foto !==null) {
                $tujuan_upload='uploads/foto_dokter';
                $nama_foto= time()."_".$foto->getClientOriginalName();
                $foto->move($tujuan_upload, $nama_foto);
            }

            $model->foto = $nama_foto;

            if($model->validate() AND $model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');
            }
        }


        return view('mst-dokter.create',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $model = MstDokter::findOrFail($id);

        $referrer = URL::previous();

        if($request->post('process') == 1 AND $model->loadAttributes($request->all())) {

            $referrer = $request->input('referrer');

            $foto = $request->file('foto');
            $nama_foto=null;

            if($foto !==null) {
                $tujuan_upload='uploads/foto_dokter';
                $nama_foto= time()."_".$foto->getClientOriginalName();
                $foto->move($tujuan_upload, $nama_foto);
            }

             if($foto !== null) {
                $model->foto = $nama_foto;
            }

            // $model->foto = $nama_foto;

            if($model->validate() AND $model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');;
            }
        }

        return view('mst-dokter.update',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        $model = MstDokter::findOrFail($id);

        if($model->delete()) {
            return redirect(URL::previous())->with('success','Data berhasil dihapus');
        } else {
            return redirect(URL::previous())->with('error','Data GAGAL dihapus');
        }
    }
}
