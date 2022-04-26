<?php

namespace App\Http\Controllers;

use App\Models\MstOrang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Components\GridView;
use Carbon\Carbon;

class MstOrangController extends Controller
{
    public $layout = 'layouts.backend.main';

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = MstOrang::query();

        $allMstOrang = $query->get();

        return view('mst-orang.index',[
            'layout' => $this->layout,
            'allMstOrang' => $allMstOrang        ]);
    }

    public function read(Request $request)
    {
        $id = $request->get('id');
        $model = MstOrang::findOrFail($id);

        return view('mst-orang.read',[
            'layout' => $this->layout,
            'model' => $model
        ]);
    }

    public function create(Request $request)
    {
        $model = new MstOrang();

        $referrer = URL::previous();

        if($request->post('process') == 1 AND $model->loadAttributes($request->all())) {

            $referrer = $request->input('referrer');
            if ($request->tanggal_lahir != null) {
                $changeFormat = Carbon::createFromFormat('d-m-Y', $request->tanggal_lahir)->format('Y-m-d');
                // return $changeFormat;die;
                $model->tanggal_lahir = $changeFormat;
            }
            // dd($request->all());


            if($model->validate() AND $model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');
            }
        }

        return view('mst-orang.create',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $model = MstOrang::findOrFail($id);

        $referrer = URL::previous();

        if($request->post('process') == 1 AND $model->loadAttributes($request->all())) {

            $referrer = $request->input('referrer');

            if($model->validate() AND $model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');;
            }
        }

        

        return view('mst-orang.update',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        $model = MstOrang::findOrFail($id);

        if($model->delete()) {
            return redirect(URL::previous())->with('success','Data berhasil dihapus');
        } else {
            return redirect(URL::previous())->with('error','Data GAGAL dihapus');
        }
    }
}
