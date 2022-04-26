<?php

namespace App\Http\Controllers;

use App\Components\Session;
use App\Models\MstPoli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Components\GridView;

class MstPoliController extends Controller
{
    public $layout = 'layouts.backend.main';

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = MstPoli::query();

        if(Session::isFaskes()) {
            $query->where('id_faskes','=',Session::getIdFaskes());
        }

        $allMstPoli = $query->get();

        return view('mst-poli.index',[
            'layout' => $this->layout,
            'allMstPoli' => $allMstPoli
        ]);
    }

    public function read(Request $request)
    {
        $id = $request->get('id');
        $model = MstPoli::findOrFail($id);

        return view('mst-poli.read',[
            'layout' => $this->layout,
            'model' => $model
        ]);
    }

    public function create(Request $request)
    {
        $model = new MstPoli();

        $model->id_faskes = $request->get('id_faskes');

        $referrer = URL::previous();

        if($request->post('process') == 1 AND $model->loadAttributes($request->all())) {

            $referrer = $request->input('referrer');

            if($model->validate() AND $model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');
            }
        }

        return view('mst-poli.create',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $model = MstPoli::findOrFail($id);

        $referrer = URL::previous();

        if($request->post('process') == 1 AND $model->loadAttributes($request->all())) {

            $referrer = $request->input('referrer');

            if($model->validate() AND $model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');;
            }
        }

        return view('mst-poli.update',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        $model = MstPoli::findOrFail($id);

        if($model->delete()) {
            return redirect(URL::previous())->with('success','Data berhasil dihapus');
        } else {
            return redirect(URL::previous())->with('error','Data GAGAL dihapus');
        }
    }
}
