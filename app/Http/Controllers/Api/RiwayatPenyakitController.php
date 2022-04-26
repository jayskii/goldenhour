<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RiwayatPenyakit;


class RiwayatPenyakitController extends Controller
{
    public function index(Request $request)
    {
        /* $riwayatpenyakit = RiwayatPenyakit::paginate(10);
        return response()->json($riwayatpenyakit, 200); */

        $data = RiwayatPenyakit::get([
            'id_pasien' => $request->get('id_pasien'),
        ]);
        
        return response()->json([
            'message' => 'Success',
            'data' => $data
        ]);
    }

    public function view($id)
    {
        $riwayatPenyakit = RiwayatPenyakit::find($id);

        if ($riwayatPenyakit == null) {
            return response()->json([
                'message' => 'Pasien tidak ditemukan',
            ], 404);
        }

        return response()->json(
            ['data' => $riwayatPenyakit],
            200
        );
    }

    public function create(Request $request)
    {
        $riwayatPenyakit = RiwayatPenyakit::create($request->all());
        return response()->json
        ([
            'message' => 'Success', 'data' => $riwayatPenyakit
        ]);

    }

    public function update(Request $request,$id)
    {
        $riwayatPenyakit = RiwayatPenyakit::find($id);
        $riwayatPenyakit->update($request->all());
        return response()->json([
            'message' => 'Success',
            'data' => $riwayatPenyakit
        ], 200);
    }

    public function delete($id)
    {
        $riwayatPenyakit = RiwayatPenyakit::findOrFail($id);
        $riwayatPenyakit->delete();
        return response()->json(
            [
                'message' => 'Success Delete',
                'data' => null
            ]
            );
    }
}
