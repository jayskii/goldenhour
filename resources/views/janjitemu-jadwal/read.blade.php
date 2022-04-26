<?php

/* @see \App\Http\Controllers\JanjitemuJadwalController::read() */
/* @var  $model \App\Models\JanjitemuJadwal */
/* @var $allJadwalRincian \App\Models\JanjitemuJadwalRincian[] */

?>

@extends($layout)

@section('content')

<div class="card card-default">
    <div class="card-header">
        <h2 class="card-title">Detail Janji Temu Jadwal</h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th style="width: 180px">Dokter</th>
                <td><?= @$model->dokter->nama ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Faskes</th>
                <td><?= @$model->faskes->nama ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Poli</th>
                <td><?= @$model->poli->nama ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer">
        <?= $model->getLinkUpdateButton(); ?>
        <?= $model->getLinkIndexButton(); ?>
    </div>
</div>

<div class="card card-default">
    <div class="card-header">
        <h2 class="card-title">Jadwal Hari Janji Temu</h2>
    </div>
    <div class="card-body">
        <div style="margin-bottom: 20px">
            <a href="<?= url('/janjitemu-jadwal-rincian/create?id_jadwal='.$model->id) ?>" class="btn btn-primary btn-flat">
                <i class="fa fa-plus"></i> Tambah Hari
            </a>
        </div>

        <table class="table table-bordered">
            <tr>
                <th style="text-align: center; width: 50px">No</th>
                <th>Hari</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Durasi Per Konsultasi</th>
                <th style="width: 100px"></th>
            </tr>
            <?php $i=1; foreach($allJadwalRincian as $data) { ?>
            <tr>
                <td style="text-align: center"><?= $i; ?></td>
                <td>
                    <?= $data->hari->nama; ?>
                </td>
                <td>
                    <?= $data->jam_mulai; ?>
                </td>
                <td>
                    <?= $data->jam_selesai; ?>
                </td>
                <td>
                    <?= $data->durasi_konsultasi; ?> Menit
                </td>
                <td style="text-align: center">
                    <?= $data->getLinkUpdateIcon(); ?>
                    <?= $data->getLinkDeleteIcon(); ?>
                </td>
            </tr>
            <?php $i++; } ?>
        </table>
    </div>

@endsection
