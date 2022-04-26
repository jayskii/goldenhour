<?php


/* @var  $model \App\Models\MstOrang */

?>

@extends($layout)

@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Detail Orang</h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered">

            <tr>
                <th style="width: 180px">Nama</th>
                <td><?= $model->nama ?></td>
            </tr>
                        
            <tr>
                <th style="width: 180px">Alamat</th>
                <td><?= $model->alamat ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Jenis Kelamin</th>
                <td><?= $model->id_jenis_kelamin ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Tempat Lahir</th>
                <td><?= $model->tempat_lahir ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Tanggal Lahir</th>
                <td><?= $model->tanggal_lahir ?></td>
            </tr>

             <tr>
                <th style="width: 180px">Nomor Telepon</th>
                <td><?= $model->no_telepon ?></td>
            </tr>
                        
            <tr>
                <th style="width: 180px">Email</th>
                <td><?= $model->email ?></td>
            </tr>
                        
            <tr>
                <th style="width: 180px">Nik</th>
                <td><?= $model->nik ?></td>
            </tr>
                        
            <tr>
                <th style="width: 180px">Nomor Asuransi</th>
                <td><?= $model->nomor_asuransi ?></td>
            </tr>  
        </table>
    </div>
    <div class="card-footer">
        <?= $model->getLinkUpdateButton(); ?>
        <?= $model->getLinkIndexButton(); ?>
    </div>
</div>

@endsection