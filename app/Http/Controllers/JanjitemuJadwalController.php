<?php

namespace App\Http\Controllers;

use App\Models\JanjitemuJadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Components\GridView;

class JanjitemuJadwalController extends Controller
{
    public $layout = 'layouts.backend.main';

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = JanjitemuJadwal::query();

        $allJanjitemuJadwal = $query->get();

        return view('janjitemu-jadwal.index',[
            'layout' => $this->layout,
            'allJanjitemuJadwal' => $allJanjitemuJadwal
        ]);
    }

    public function read(Request $request)
    {
        $id = $request->get('id');
        $model = JanjitemuJadwal::findOrFail($id);
        $allJadwalRincian = $model->getAllJadwalRincian();

        return view('janjitemu-jadwal.read',[
            'layout' => $this->layout,
            'model' => $model,
            'allJadwalRincian' => $allJadwalRincian,
        ]);
    }

    public function create(Request $request)
    {
        $model = new JanjitemuJadwal();

        $referrer = URL::previous();

        if($request->post('process') == 1 AND $model->loadAttributes($request->all())) {

            $referrer = $request->input('referrer');

            $model->setIdFaskes();
            $model->setIdPoli();

            if($model->validate() AND $model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');
            }
        }

        return view('janjitemu-jadwal.create',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function createByJadwal(Request $request)
    {
        $model = new JanjitemuJadwal();

        $referrer = URL::previous();

        if($request->post('process') == 1 AND $model->loadAttributes($request->all())) {

            $referrer = $request->input('referrer');

            $model->setIdFaskes();
            $model->setIdPoli();

            if($model->validate() AND $model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');
            }
        }

        return view('janjitemu-jadwal.create',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $model = JanjitemuJadwal::findOrFail($id);

        $referrer = URL::previous();

        if($request->post('process') == 1 AND $model->loadAttributes($request->all())) {

            $referrer = $request->input('referrer');

            if($model->validate() AND $model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');;
            }
        }

        return view('janjitemu-jadwal.update',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        $model = JanjitemuJadwal::findOrFail($id);

        if($model->delete()) {
            return redirect(URL::previous())->with('success','Data berhasil dihapus');
        } else {
            return redirect(URL::previous())->with('error','Data GAGAL dihapus');
        }
    }
}
