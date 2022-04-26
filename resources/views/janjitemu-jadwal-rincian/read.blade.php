<?php


/* @var  $model \App\Models\JanjitemuJadwalRincian */

?>

@extends($layout)

@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Detail Janji Temu Jadwal Rincian</h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
                        
            <tr>
                <th style="width: 180px">Nama</th>
                <td><?= $model->nama ?></td>
            </tr>
                        
            <tr>
                <th style="width: 180px">Jadwal</th>
                <td><?= $model->id_jadwal ?></td>
            </tr>
                        
            <tr>
                <th style="width: 180px">Hari</th>
                <td><?= $model->id_hari ?></td>
            </tr>
                        
            <tr>
                <th style="width: 180px">Jam Mulai</th>
                <td><?= $model->jam_mulai ?></td>
            </tr>
                        
            <tr>
                <th style="width: 180px">Jam Selesai</th>
                <td><?= $model->jam_selesai ?></td>
            </tr>
            
        </table>
    </div>
    <div class="card-footer">
        <?= $model->getLinkUpdateButton(); ?>
        <?= $model->getLinkIndexButton(); ?>
    </div>
</div>

@endsection