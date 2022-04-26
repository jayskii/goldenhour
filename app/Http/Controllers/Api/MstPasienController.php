<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MstPasien;


class MstPasienController extends Controller
{
    public function index()
    {
        $mstpasien = MstPasien::paginate(10);

        return response()->json($mstpasien, 200);

       
    }

    public function view($id)
    {
        $mstpasien = MstPasien::find($id);

        if ($mstpasien == null) {
            return response()->json([
                'message' => 'Pasien tidak ditemukan',
            ], 404);
        }

        return response()->json(
            ['data' => $mstpasien],
            200
        );
    }

    public function update(Request $request,$id)
    {
        $mstPasien = MstPasien::find($id);
        $mstPasien->update($request->all());
        return response()->json([
            'message' => 'Success',
            'data' => $mstPasien
        ], 200);
    }


}
