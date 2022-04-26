<?php

namespace App\Http\Controllers\Api;

use App\Components\Helper;
use App\Http\Controllers\Controller;
use App\Models\JanjitemuJanjitemu;
use App\Models\RefHari;
use Illuminate\Http\Request;
use App\Models\MstFaskes;

class JanjitemuJanjitemuController extends Controller
{

    public function index(Request $request)
    {
        $id_pasien = $request->get('id_pasien');
        $janjitemu = JanjitemuJanjitemu::where('id_pasien', $id_pasien)->get();

        return response()->json($janjitemu, 200);
    }

    public function view($id)
    {
        $janjitemu = JanjitemuJanjitemu::find($id);

        if ($janjitemu == null) {
            return response()->json([
                'message' => 'janji temu tidak ditemukan',
            ], 404);
        }

        return response()->json(
            ['data' => $janjitemu],
            200
        );
    }

    public function create(Request $request)
    {
        $model = new JanjitemuJanjitemu();
        $model->loadAttributes($request->all());
        $model->setIdFaskes();
        $model->setIdPoli();

        if ($model->save()) {
            return response()->json([
                'status' => 'success',
                'data' => $model
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'data' => $model
            ]);
        }
    }

    public function tanggal()
    {
        $datetime = \DateTime::createFromFormat('D-m-y', date('D-m-y'));

        $data = [];

        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'hari' => RefHari::findNama(['id' => $datetime->format('N')]),
                'display_tanggal' => $datetime->format('j') . ' ' . Helper::getBulanSingkat($datetime->format('n')),
                'tanggal' => $datetime->format('D-m-y')
            ];
            $datetime->modify('+1 day');
        }

        return response([
            'data' => $data
        ]);
    }

    public function janjiSelanjutnya($id_pasien)
    {
        $janjitemu = JanjitemuJanjitemu::where('id_pasien', $id_pasien)->first();

        if ($janjitemu == null) {
            return response()->json([
                'message' => 'janji temu tidak ditemukan',
            ], 404);
        }

        return response()->json(
            ['data' => $janjitemu],
            200
        );
    }
}
