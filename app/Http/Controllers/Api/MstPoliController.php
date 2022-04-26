<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JanjitemuJadwalRincian;
use Illuminate\Http\Request;
use App\Models\MstPoli;

class MstPoliController extends Controller
{
    public function index(Request $request)
    {
        $data = MstPoli::get([
            'id_faskes' => $request->get('id_faskes'),
            'id_spesialisasi' => $request->get('id_spesialisasi'),
        ]);

        return response()->json(['message' => 'Success','data' => $data]);
    }

    

    public function show($id)
    {
      $poli = MstPoli::find($id);
      return response()->json(['message' => 'success','data' => $poli]);
    }

    public function store(Request $request)
    {
        $poli = MstPoli::create($request->all());
        return response()->json(['message' => 'Success','data' => $poli]);
    }

    // public function update(Request $request,$id)
    // {
    //     $poli = MstPoli::
    // }
}
