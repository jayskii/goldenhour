<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\RefKeluhanUtama;

class RefKeluhanUtamaController extends Controller
{
    public function index()
    {
        $query = RefKeluhanUtama::query();

        $allData = $query->get();

        return response()->json([
            'data' => $allData,
        ], 200);
    }
}
