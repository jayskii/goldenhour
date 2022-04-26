<?php
/* @var  $gridView \App\Components\GridView */

use App\Models\KeluargaPasien;

?>

@extends($layout)

@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Data Keluarga Pasien</h2>
    </div>
    <div class="card-body">
        <div style="margin-bottom: 20px">
            <a href="<?=url('/keluarga-pasien/create'); ?>" class="btn btn-primary btn-flat">
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
                        Nama Keluarga Pasien
                    </th>

                    <th style="text-align: center;">
                        Status Hubungan
                    </th>

                    <th style="text-align: center;">
                        Jenis Kelamin
                    </th>

                    <th style="text-align: center;">
                        Tanggal Lahir
                    </th>

                    <th style="text-align: center;">
                        Golongan Darah
                    </th>

                    <th style="text-align: center; width: 85px;">OPSI</th>
                </tr>

                <?php
                ?>
                <?php $i=1; foreach($allKeluargaPasien as $data) { ?>
                <tr>
                    <td style="text-align: center"><?= $i; ?></td>


                    <td style="text-align: left;">
                        <?= @$data->pasien->nama ?>
                    </td>


                    <td style="text-align: left;">
                        <?= @$data->nama ?>
                    </td>


                    <td style="text-align: left;">
                        <?= $data->status_hubungan ?>
                    </td>

                    <td style="text-align: left;">
                        <?= $data->kelaminJenis->nama ?>
                    </td>

                    <td style="text-align: left;">
                        <?= $data->tanggal_lahir ?>
                    </td>

                    <td style="text-align: left;">
                        <?= $data->golonganDarah->nama ?>
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
