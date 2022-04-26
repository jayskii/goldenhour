<?php

/* @var  $model \App\Models\JanjitemuJanjitemu */

?>

@extends($layout)

@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Detail Janji Temu</h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
                        
            {{-- <tr>
                <th style="width: 180px">Nama</th>
                <td><?= $model->nama ?></td>
            </tr> --}}
                        
            <tr>
                <th style="width: 180px">nama Pasien</th>
                <td><?= $model->pasien->nama ?></td>
            </tr>
                        
            <tr>
                <th style="width: 180px">Faskes</th>
                <td><?= $model->faskes->nama ?></td>
            </tr>
                        
            <tr>
                <th style="width: 180px">Poli</th>
                <td><?= $model->poli->nama ?></td>
            </tr>
                        
            <tr>
                <th style="width: 180px">Dokter</th>
                <td><?= $model->dokter->nama ?></td>
            </tr>
                        
            <tr>
                <th style="width: 180px">Keluhan Utama</th>
                <td><?= $model->keluhanUtama->nama ?></td>
            </tr>
                        
            <tr>
                <th style="width: 180px">Waktu Tunggu Mulai</th>
                <td><?= $model->waktu_janjitemu_rencana ?></td>
            </tr>
                        
            {{-- <tr>
                <th style="width: 180px">Waktu Tunggu Selesai</th>
                <td><?= $model->waktu_tunggu_selesai ?></td>
            </tr>
                        
            <tr>
                <th style="width: 180px">Waktu Tunggu Durasi</th>
                <td><?= $model->waktu_tunggu_durasi ?></td>
            </tr>
                        
            <tr>
                <th style="width: 180px">Waktu Janjitemu Mulai</th>
                <td><?= $model->waktu_janjitemu_mulai ?></td>
            </tr>
                        
            <tr>
                <th style="width: 180px">Waktu Janjitemu Selesai</th>
                <td><?= $model->waktu_janjitemu_selesai ?></td>
            </tr>
                        
            <tr>
                <th style="width: 180px">Waktu Janjitemu Durasi</th>
                <td><?= $model->waktu_janjitemu_durasi ?></td>
            </tr> --}}
            
        </table>
    </div>
    <div class="card-footer">
        <?= $model->getLinkUpdateButton(); ?>
        <?= $model->getLinkIndexButton(); ?>
    </div>
</div>

@endsection