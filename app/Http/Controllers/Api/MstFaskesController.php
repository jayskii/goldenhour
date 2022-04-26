<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MstFaskes;

class MstFaskesController extends Controller
{
    public function index()
    {
        $faskes = MstFaskes::all();

        return response()->json([
            'message' => 'Success',
            'data' => $faskes
        ]);
    }

    public function show($id)
    {
        $faskes = MstFaskes::find($id);
        return response()->json(['message' => 'success', 'data' => $faskes]);
    }

    public function store(Request $request)
    {
        $faskes = MstFaskes::create($request->all());
        return response()->json(['message' => 'Success', 'data' => $faskes]);
    }

    // public function update(Request $request,$id)
    // {
    //     $dokter = MstDokter::
    // }
}
