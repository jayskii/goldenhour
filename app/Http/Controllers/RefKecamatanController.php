<?php

namespace App\Http\Controllers;

use App\Models\RefKecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Components\GridView;

class RefKecamatanController extends Controller
{
    public $layout = 'layouts.backend.main';

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = RefKecamatan::query();

        $allRefKecamatan = $query->get();

        return view('ref-kecamatan.index',[
            'layout' => $this->layout,
            'allRefKecamatan' => $allRefKecamatan        ]);
    }

    public function read(Request $request)
    {
        $id = $request->get('id');
        $model = RefKecamatan::findOrFail($id);

        return view('ref-kecamatan.read',[
            'layout' => $this->layout,
            'model' => $model
        ]);
    }

    public function create(Request $request)
    {
        $model = new RefKecamatan();

        $referrer = URL::previous();

        if($request->post('process') == 1 AND $model->loadAttributes($request->all())) {

            $referrer = $request->input('referrer');

            if($model->validate() AND $model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');
            }
        }

        return view('ref-kecamatan.create',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $model = RefKecamatan::findOrFail($id);

        $referrer = URL::previous();

        if($request->post('process') == 1 AND $model->loadAttributes($request->all())) {

            $referrer = $request->input('referrer');

            if($model->validate() AND $model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');;
            }
        }

        return view('ref-kecamatan.update',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        $model = RefKecamatan::findOrFail($id);

        if($model->delete()) {
            return redirect(URL::previous())->with('success','Data berhasil dihapus');
        } else {
            return redirect(URL::previous())->with('error','Data GAGAL dihapus');
        }
    }
}
