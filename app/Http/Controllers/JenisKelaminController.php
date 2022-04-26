<?php

namespace App\Http\Controllers;

use App\Models\JenisKelamin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Components\GridView;

class JenisKelaminController extends Controller
{
    public $layout = 'layouts.backend.main';

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = JenisKelamin::query();

        $allJenisKelamin = $query->get();

        return view('ref_jenis_kelamin.index',[
            'layout' => $this->layout,
            'allJenisKelamin' => $allJenisKelamin        ]);
    }

    public function read(Request $request)
    {
        $id = $request->get('id');
        $model = JenisKelamin::findOrFail($id);

        return view('ref_jenis_kelamin.read',[
            'layout' => $this->layout,
            'model' => $model
        ]);
    }

    public function create(Request $request)
    {
        $model = new JenisKelamin();

        $referrer = URL::previous();

        if($request->post('process') == 1 AND $model->loadAttributes($request->all())) {

            $referrer = $request->input('referrer');

            if($model->validate() AND $model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');
            }
        }

        return view('ref_jenis_kelamin.create',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $model = JenisKelamin::findOrFail($id);

        $referrer = URL::previous();

        if($request->post('process') == 1 AND $model->loadAttributes($request->all())) {

            $referrer = $request->input('referrer');

            if($model->validate() AND $model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');;
            }
        }

        return view('ref_jenis_kelamin.update',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        $model = JenisKelamin::findOrFail($id);

        if($model->delete()) {
            return redirect(URL::previous())->with('success','Data berhasil dihapus');
        } else {
            return redirect(URL::previous())->with('error','Data GAGAL dihapus');
        }
    }
}
