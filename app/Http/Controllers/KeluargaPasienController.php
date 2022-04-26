<?php

namespace App\Http\Controllers;

use App\Models\KeluargaPasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Components\GridView;

class KeluargaPasienController extends Controller
{
    public $layout = 'layouts.backend.main';

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = KeluargaPasien::query();

        $allKeluargaPasien = $query->get();

        return view('keluarga-pasien.index',[
            'layout' => $this->layout,
            'allKeluargaPasien' => $allKeluargaPasien
        ]);
    }

    public function read(Request $request)
    {
        $id = $request->get('id');
        $model = KeluargaPasien::findOrFail($id);
       
       

        return view('keluarga-pasien.read',[
            'layout' => $this->layout,
            'model' => $model,
            
            
        ]);
    }

    public function create(Request $request)
    {
        $model = new KeluargaPasien();

        $referrer = URL::previous();

        if($request->post('process') == 1 AND $model->loadAttributes($request->all())) {

            $referrer = $request->input('referrer');

            if($model->validate() AND $model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');
            }
        }

        return view('keluarga-pasien.create',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $model = KeluargaPasien::findOrFail($id);

        $model->setFormTanggalLahir();

        $referrer = URL::previous();

        if($request->post('process') == 1 AND $model->loadAttributes($request->all())) {

            $referrer = $request->input('referrer');

            $model->setSaveTanggalLahir();

            if($model->validate() AND $model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');;
            }
        }
      
        return view('keluarga-pasien.update',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        $model = KeluargaPasien::findOrFail($id);

        if($model->delete()) {
            return redirect(URL::previous())->with('success','Data berhasil dihapus');
        } else {
            return redirect(URL::previous())->with('error','Data GAGAL dihapus');
        }
    }
}
