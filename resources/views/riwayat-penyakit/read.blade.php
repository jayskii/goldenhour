<?php

/* @var  $model \App\Models\MstDokter */

?>

@extends($layout)

@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Detail Riwayat Penyakit</h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
                        
            <tr>
                <th style="width: 180px">Pasien</th>
                <td><?= $model->pasien->nama ?></td>
            </tr>
                        
            <tr>
                <th style="width: 180px">Alergi</th>
                <td><?= $model->alergi ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Riwayat Penyakit</th>
                <td><?= $model->penyakit_riwayat ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Obat Yang Dilarang</th>
                <td><?= $model->obat_dilarang ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Obat Yang Masih Di Konsumsi</th>
                <td><?= $model->obat_dikonsumsi ?></td>
            </tr>
           
            
        </table>
    </div>
    <div class="card-footer">
        <?= $model->getLinkUpdateButton(); ?>
        <?= $model->getLinkIndexButton(); ?>
    </div>
</div>

@endsection