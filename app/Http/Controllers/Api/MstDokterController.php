<?php

namespace App\Http\Controllers\Api;

use App\Components\Helper;
use App\Http\Controllers\Controller;
use App\Models\JanjitemuJadwalRincian;
use Illuminate\Http\Request;
use App\Models\MstDokter;

class MstDokterController extends Controller
{
    public function index(Request $request)
    {
        $data = MstDokter::get([
            'id_faskes' => $request->get('id_faskes'),
            'id_spesialisasi' => $request->get('id_spesialisasi'),
            'id_poli' => $request->get('id_poli'),
        ]);

        return response()->json(['message' => 'Success', 'data' => $data]);
    }

    public function janjitemuTanggal()
    {
        $datetime = \DateTime::createFromFormat('d-m-Y', date('d-m-Y'));
        $datetime->modify('+1 day');

        $list = [];
        for ($i = 1; $i <= 31; $i++) {
            $list[] = [
                "hari" => \App\Components\Helper::getHari($datetime->format('N')),
                "tanggal" => $datetime->format('d-m-Y'),
                "displayTanggal" => $datetime->format('j ') . '' . \App\Components\Helper::getBulanSingkat($datetime->format('n')),
            ];

            $datetime->modify('+1 day');
        }

        return response()->json([
            'message' => 'Success',
            'data' => $list
        ]);
    }

    public function janjitemuJadwalRincian(Request $request)
    {
        $id_dokter = $request->get('id_dokter');
        $tanggal = $request->get('tanggal');

        if ($tanggal == null) {
            $tanggal = date('d-m-Y');
        }

        $datetime = \DateTime::createFromFormat('d-m-Y', $tanggal);
        $id_hari = $datetime->format('N');
        $query = JanjitemuJadwalRincian::query([
            'id_dokter' => $id_dokter,
            'id_hari' => $id_hari
        ]);

        $query->orderBy('jam_mulai', 'asc');
        $allJadwalRincian = $query->get();
        $data = [];

        /* @var $allJadwalRincian \App\Models\JanjitemuJadwalRincian[] */
        foreach ($allJadwalRincian as $jadwalRincian) {
            $waktuJanjiTemuRencana = $jadwalRincian->getWaktuJanjiTemuRencana(['tanggal' => $tanggal]);
            $display = substr($waktuJanjiTemuRencana, 11, 5);
            $data[] = [
                'display_waktu_janjitemu_rencana' => $display,
                'waktu_janjitemu_rencana' => $waktuJanjiTemuRencana,
            ];
        }

        return response()->json(['message' => 'Success', 'data' => $data]);
    }

    public function show($id)
    {
        $dokter = MstDokter::find($id);
        return response()->json(['message' => 'success', 'data' => $dokter]);
    }

    public function store(Request $request)
    {
        $dokter = MstDokter::create($request->all());
        return response()->json(['message' => 'Success', 'data' => $dokter]);
    }

    // public function update(Request $request,$id)
    // {
    //     $dokter = MstDokter::
    // }
}
