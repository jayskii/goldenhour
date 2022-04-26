<?php
/* @var  $gridView \App\Components\GridView */

use App\Models\RiwayatPenyakit;

?>

@extends($layout)

@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Riwayat Penyakit Pasien</h2>
    </div>
    <div class="card-body">
        <div style="margin-bottom: 20px">
            <a href="<?=url('/riwayat-penyakit/create'); ?>" class="btn btn-primary btn-flat">
                <i class="fa fa-plus-circle"></i> Tambah Data
            </a>
        </div>
        <div style="overflow: auto">
            <table class="table table-bordered table-condensed">
                <tr>
                    <th style="width: 50px;">No</th>

                    <th style="text-align: center;">
                        Nama Pasien
                    </th>

                    <th style="text-align: center;">
                        Alergi
                    </th>

                    <th style="text-align: center;">
                        Riwayat Penyakit
                    </th>

                    <th style="text-align: center;">
                        Obat Yang Dilarang
                    </th>

                    <th style="text-align: center;">
                        Obat Yang Masih Di Konsumsi
                    </th>

                    <th style="text-align: center; width: 85px;">OPSI</th>
                </tr>

                <?php
                ?>
                <?php $i=1; foreach($allRiwayatPenyakit as $data) { ?>
                <tr>
                    <td style="text-align: center"><?= $i; ?></td>


                    <td style="text-align: left;">
                        <?= @$data->pasien->nama ?>
                    </td>


                    <td style="text-align: left;">
                        <?= $data->alergi ?>
                    </td>

                    <td style="text-align: left;">
                        <?= $data->penyakit_riwayat ?>
                    </td>

                    <td style="text-align: left;">
                        <?= $data->obat_dilarang ?>
                    </td>

                    <td style="text-align: left;">
                        <?= $data->obat_dikonsumsi ?>
                    </td>

                    <td style="text-align: center">
                        <?= $data->getLinkReadIcon(); ?>
                        <?= $data->getLinkUpdateIcon(); ?>
                        <?= $data->getLinkDeleteIcon(); ?>
                    </td>
                </tr>
                <?php $i++; } ?>
            </table>
        </div>
    </div>
</div>


@endsection
