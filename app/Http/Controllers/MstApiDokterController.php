<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\MstDokter;

class MstApiDokterController extends Controller
{
    public function index()
    {
        $dokter = MstDokter::all();
        return response()->json(['message' => 'Success','data' => $dokter]);
    }

    public function show($id)
    {
      $dokter = MstDokter::find($id);
      return response()->json(['message' => 'success','data' => $dokter]);
    }

    public function store(Request $request)
    {
        $dokter = MstDokter::create($request->all());
        return response()->json(['message' => 'Success','data' => $dokter]);
    }

    // public function update(Request $request,$id)
    // {
    //     $dokter = MstDokter::
    // }
}
