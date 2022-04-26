<?php

/* @see \App\Http\Controllers\MstFaskesController::read() */
/* @var  $model \App\Models\MstFaskes */
/* @var $allPoli \App\Models\MstPoli[] */
/* @var $allDokter \App\Models\MstDokter[] */

use App\Components\Helper;

?>

@extends($layout)

@section('content')

<div class="card card-default">
    <div class="card-header">
        <h2 class="card-title">Detail Faskes</h2>
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
                <th style="width: 180px">Foto Faskes</th>
                <td>
                    @if ($model->foto != null)
                    <img src="{{ asset('/uploads/foto_faskes/'.$model->foto) }}" alt="FotoFaskes" class="img-responsive" width="100px">
                    @else
                    <img src="{{ asset('/images/foto_faskes.jpg') }}" class="img-responsive" width="100px">
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

<div class="card card-default">
    <div class="card-header">
        <h2 class="card-title">Poli</h2>
    </div>
    <div class="card-body">
        <div style="margin-bottom: 20px">
            <a href="<?= url('/mst-poli/create?id_faskes='.$model->id) ?>" class="btn btn-primary btn-flat">
                <i class="fa fa-plus"></i> Tambah Poli
            </a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th style="width: 50px; text-align: center">No</th>
                <th>Nama</th>
                <th>Spesialisasi</th>
            </tr>
            <?php $i=1; foreach($allPoli as $poli) { ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $poli->nama; ?></td>
                <td><?= @$poli->spesialisasi->nama; ?></td>
            </tr>
            <?php $i++; } ?>
        </table>
    </div>
</div>

<div class="card card-default">
    <div class="card-header">
        <h2 class="card-title">Dokter</h2>
    </div>
    <div class="card-body">
        <div style="margin-bottom: 20px">
            <a href="<?= url('/mst-dokter/create?id_faskes='.$model->id) ?>" class="btn btn-primary btn-flat">
                <i class="fa fa-plus"></i> Tambah Dokter
            </a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th style="width: 50px; text-align: center">No</th>
                <th>Nama</th>
                <th>Spesialisasi</th>
            </tr>
            <?php $i=1; foreach($allDokter as $dokter) { ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $dokter->nama; ?></td>
                <td><?= @$dokter->spesialisasi->nama; ?></td>
            </tr>
            <?php $i++; } ?>
        </table>
    </div>
</div>
@endsection
