<?php

namespace App\Http\Controllers;

use App\Models\JanjitemuJadwalRincian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Components\GridView;

class JanjitemuJadwalRincianController extends Controller
{
    public $layout = 'layouts.backend.main';

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = JanjitemuJadwalRincian::query();

        $allJanjitemuJadwalRincian = $query->get();

        return view('janjitemu-jadwal-rincian.index',[
            'layout' => $this->layout,
            'allJanjitemuJadwalRincian' => $allJanjitemuJadwalRincian        ]);
    }

    public function read(Request $request)
    {
        $id = $request->get('id');
        $model = JanjitemuJadwalRincian::findOrFail($id);

        return view('janjitemu-jadwal-rincian.read',[
            'layout' => $this->layout,
            'model' => $model
        ]);
    }

    public function create(Request $request)
    {
        $model = new JanjitemuJadwalRincian();

        $model->id_jadwal = $request->get('id_jadwal');

        $referrer = URL::previous();

        if($request->post('process') == 1 AND $model->loadAttributes($request->all())) {

            $referrer = $request->input('referrer');

            if($model->validate() AND $model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');
            }
        }

        return view('janjitemu-jadwal-rincian.create',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $model = JanjitemuJadwalRincian::findOrFail($id);

        $referrer = URL::previous();

        if($request->post('process') == 1 AND $model->loadAttributes($request->all())) {

            $referrer = $request->input('referrer');

            if($model->validate() AND $model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');;
            }
        }

        return view('janjitemu-jadwal-rincian.update',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        $model = JanjitemuJadwalRincian::findOrFail($id);

        if($model->delete()) {
            return redirect(URL::previous())->with('success','Data berhasil dihapus');
        } else {
            return redirect(URL::previous())->with('error','Data GAGAL dihapus');
        }
    }
}
