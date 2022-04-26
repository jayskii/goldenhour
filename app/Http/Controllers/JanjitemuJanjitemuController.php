<?php

namespace App\Http\Controllers;

use App\Models\JanjitemuJanjitemu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Components\GridView;

class JanjitemuJanjitemuController extends Controller
{
    public $layout = 'layouts.backend.main';

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = JanjitemuJanjitemu::query();

        $allJanjitemuJanjitemu = $query->get();

        return view('janjitemu-janjitemu.index',[
            'layout' => $this->layout,
            'allJanjitemuJanjitemu' => $allJanjitemuJanjitemu        ]);
    }

    public function read(Request $request)
    {
        $id = $request->get('id');
        $model = JanjitemuJanjitemu::findOrFail($id);

        return view('janjitemu-janjitemu.read',[
            'layout' => $this->layout,
            'model' => $model
        ]);
    }

    public function create(Request $request)
    {
        $model = new JanjitemuJanjitemu();

        $referrer = URL::previous();

        if($request->post('process') == 1 AND $model->loadAttributes($request->all())) {

            $referrer = $request->input('referrer');

            $model->setIdFaskes();
            $model->setIdPoli();

            if($model->validate() AND $model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');
            }
        }

        return view('janjitemu-janjitemu.create',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function createByJadwal(Request $request)
    {
        $model = new JanjitemuJanjitemu();
        $model->id_dokter = $request->post('id_dokter');

        $referrer = URL::previous();

        if($request->post('referrer') !== null) {
            $referrer = $request->post('referrer');
        }

        if($request->post('waktu_janjitemu_rencana') != null) {
            $model->loadAttributes($request->all());
            $model->setIdFaskes();
            $model->setIdPoli();
            if($model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');
            }
        }

        return view('janjitemu-janjitemu.create-by-jadwal',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $model = JanjitemuJanjitemu::findOrFail($id);

        $referrer = URL::previous();

        if($request->post('process') == 1 AND $model->loadAttributes($request->all())) {

            $referrer = $request->input('referrer');

            if($model->validate() AND $model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');;
            }
        }

        return view('janjitemu-janjitemu.update',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        $model = JanjitemuJanjitemu::findOrFail($id);

        if($model->delete()) {
            return redirect(URL::previous())->with('success','Data berhasil dihapus');
        } else {
            return redirect(URL::previous())->with('error','Data GAGAL dihapus');
        }
    }
}
