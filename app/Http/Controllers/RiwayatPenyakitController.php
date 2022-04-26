<?php

namespace App\Http\Controllers;

use App\Models\RiwayatPenyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Components\GridView;

class RiwayatPenyakitController extends Controller
{
    public $layout = 'layouts.backend.main';

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = RiwayatPenyakit::query();

        $allRiwayatPenyakit = $query->get();

        return view('riwayat-penyakit.index',[
            'layout' => $this->layout,
            'allRiwayatPenyakit' => $allRiwayatPenyakit
        ]);
    }

    public function read(Request $request)
    {
        $id = $request->get('id');
        $model = RiwayatPenyakit::findOrFail($id);
       
       

        return view('riwayat-penyakit.read',[
            'layout' => $this->layout,
            'model' => $model,
            
            
        ]);
    }

    public function create(Request $request)
    {
        $model = new RiwayatPenyakit();

        $referrer = URL::previous();

        if($request->post('process') == 1 AND $model->loadAttributes($request->all())) {

            $referrer = $request->input('referrer');

            if($model->validate() AND $model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');
            }
        }

        return view('riwayat-penyakit.create',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $model = RiwayatPenyakit::findOrFail($id);

        $referrer = URL::previous();

        if($request->post('process') == 1 AND $model->loadAttributes($request->all())) {

            $referrer = $request->input('referrer');

            if($model->validate() AND $model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');;
            }
        }
      
        return view('riwayat-penyakit.update',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        $model = RiwayatPenyakit::findOrFail($id);

        if($model->delete()) {
            return redirect(URL::previous())->with('success','Data berhasil dihapus');
        } else {
            return redirect(URL::previous())->with('error','Data GAGAL dihapus');
        }
    }
}
