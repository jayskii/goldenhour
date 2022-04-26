<?php

/* @var  $model \App\Models\MstDokter */

?>

@extends($layout)

@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Detail Data Keluarga Pasien</h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
                        
            <tr>
                <th style="width: 180px">Pasien</th>
                <td><?= $model->pasien->nama ?></td>
            </tr>
                        
            <tr>
                <th style="width: 180px">Nama Keluarga Pasien</th>
                <td><?= $model->nama ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Status Hubungan Keluarga</th>
                <td><?= $model->status_hubungan ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Jenis Kelamin</th>
                <td><?= $model->kelaminJenis->nama ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Tanggal Lahir</th>
                <td><?= $model->tanggal_lahir ?></td>
            </tr>
           
            <tr>
                <th style="width: 180px">Golongan Darah</th>
                <td><?= $model->golonganDarah->nama ?></td>
            </tr>
            
        </table>
    </div>
    <div class="card-footer">
        <?= $model->getLinkUpdateButton(); ?>
        <?= $model->getLinkIndexButton(); ?>
    </div>
</div>

@endsection