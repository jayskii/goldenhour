<?php

namespace App\Http\Controllers;

use App\Models\MstFaskes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Components\GridView;

class MstFaskesController extends Controller
{
    public $layout = 'layouts.backend.main';

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = MstFaskes::query();

        $allMstFaskes = $query->get();

        return view('mst-faskes.index',[
            'layout' => $this->layout,
            'allMstFaskes' => $allMstFaskes
        ]);
    }

    public function read(Request $request)
    {
        $id = $request->get('id');
        $model = MstFaskes::findOrFail($id);
        $allPoli = $model->getAllPoli();
        $allDokter = $model->getAllDokter();

        return view('mst-faskes.read',[
            'layout' => $this->layout,
            'model' => $model,
            'allPoli' => $allPoli,
            'allDokter' => $allDokter
        ]);
    }

    public function create(Request $request)
    {
        $model = new MstFaskes();

        $referrer = URL::previous();

        if($request->post('process') == 1 AND $model->loadAttributes($request->all())) {

            $referrer = $request->input('referrer');

            $foto = $request->file('foto');
            $nama_foto=null;

            if($foto !==null) {
                $tujuan_upload='uploads/foto_faskes';
                $nama_foto= time()."_".$foto->getClientOriginalName();
                $foto->move($tujuan_upload, $nama_foto);
            }

            $model->foto = $nama_foto;

            if($model->validate() AND $model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');
            }
        }

        return view('mst-faskes.create',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $model = MstFaskes::findOrFail($id);

        $referrer = URL::previous();

        if($request->post('process') == 1 AND $model->loadAttributes($request->all())) {

            $referrer = $request->input('referrer');

            $foto = $request->file('foto');
            $nama_foto=null;

            if($foto !==null) {
                $tujuan_upload='uploads/foto_faskes';
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

        return view('mst-faskes.update',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        $model = MstFaskes::findOrFail($id);

        if($model->delete()) {
            return redirect(URL::previous())->with('success','Data berhasil dihapus');
        } else {
            return redirect(URL::previous())->with('error','Data GAGAL dihapus');
        }
    }
}
