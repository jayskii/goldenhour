<?php

/* @var  $model \App\Models\MstPasien */

?>

@extends($layout)

@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Detail Pasien</h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered">

            <tr>
                <th style="width: 180px">Nama</th>
                <td><?= $model->nama ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Nomor KTP</th>
                <td><?= $model->nomor_ktp ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Jenis Kelamin</th>
                <td><?= $model->kelaminJenis->nama ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Golongan Darah</th>
                <td><?= $model->golonganDarah->nama ?></td>
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
                <th style="width: 180px">Telepon</th>
                <td><?= $model->telepon ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Handphone</th>
                <td><?= $model->handphone ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Email</th>
                <td><?= $model->email ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Nomor Asuransi</th>
                <td><?= $model->nomor_asuransi ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Alamat</th>
                <td><?= $model->alamat ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Created At</th>
                <td><?= $model->created_at ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Updated At</th>
                <td><?= $model->updated_at ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Deleted At</th>
                <td><?= $model->deleted_at ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Foto</th>
                <td>
                    @if ($model->foto != null)
                    <img src="{{ asset('/uploads/foto_pasien/'.$model->foto) }}" alt="FotoPasien" class="img-responsive" width="100px">
                    @else
                    <img src="{{ asset('/images/no-photo.jpg') }}" class="img-responsive" width="100px">
                   @endif
                </td>
            </tr>

        </table>
    </div>
    <div class="card-footer">
        <?= $model->getLinkUpdateButton(); ?>
        <?= $model->getLinkIndexButton(); ?>
    </div>
</div>

@endsection
