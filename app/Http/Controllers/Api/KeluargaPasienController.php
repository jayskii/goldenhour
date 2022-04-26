<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KeluargaPasien;


class KeluargaPasienController extends Controller
{
    public function index(Request $request)
    {

        $data = KeluargaPasien::get([
            'id_pasien' => $request->get('id_pasien'),
        ]);

        return response()->json([
            'message' => 'Success',
            'data' => $data
        ]);
    }

    public function view($id)
    {
        $keluargaPasien = KeluargaPasien::find($id);

        if ($keluargaPasien == null) {
            return response()->json([
                'message' => 'Pasien tidak ditemukan',
            ], 404);
        }

        return response()->json(
            ['data' => $keluargaPasien],
            200
        );
    }

    public function create(Request $request)
    {
        $keluargaPasien = KeluargaPasien::create($request->all());
        return response()->json([
                'message' => 'Success', 'data' => $keluargaPasien
            ]);
    }

    public function update(Request $request, $id)
    {
        $keluargaPasien = KeluargaPasien::find($id);
        $keluargaPasien->update($request->all());
        return response()->json(
            [
                'message' => 'Success',
                'data' => $keluargaPasien
            ]
        );
    }

    public function delete($id)
    {
        $keluargaPasien = KeluargaPasien::findOrFail($id);
        $keluargaPasien->delete();
        return response()->json(
            [
                'message' => 'Success Delete',
                'data' => null
            ]
        );
    }
}
