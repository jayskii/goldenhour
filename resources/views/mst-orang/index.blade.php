<?php
/* @var  $gridView \App\Components\GridView */
use Carbon\Carbon;
?>

@extends($layout)

@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">MST Orang</h2>
    </div>
    <div class="card-body">
        <div style="margin-bottom: 20px">
            <a href="<?=url('/mst-orang/create'); ?>" class="btn btn-primary btn-flat">
                <i class="fa fa-plus-circle"></i> Tambah Data
            </a>
        </div>
        <div style="overflow: auto">
            <table class="table table-bordered table-condensed">
                <tr>
                    <th style="width: 50px;">No</th>

                    <th style="text-align: center;">
                        Nama
                    </th>

                    <th style="text-align: center;">
                        Alamat
                    </th>

                    <th style="text-align: center;">
                        Jenis Kelamin
                    </th>

                    <th style="text-align: center;">
                        Tempat Lahir
                    </th>

                    <th style="text-align: center;">
                        Tanggal Lahir
                    </th>

                    <th style="text-align: center;">
                        Nomor Telepon
                    </th>

                    <th style="text-align: center;">
                        Email
                    </th>

                    <th style="text-align: center;">
                        Nik
                    </th>

                    <th style="text-align: center;">
                        Nomor Asuransi
                    </th>

                    <th style="text-align: center; width: 50;">OPSI</th>
                </tr>

                <?php
                ?>
                <?php $i=1; foreach($allMstOrang as $data) { ?>
                <tr>
                    <td style="text-align: center"><?= $i; ?></td>

                    <td style="text-align: center;">
                        <?= $data->nama ?>
                    </td>

                    <td style="text-align: center;">
                        <?= $data->alamat ?>
                    </td>

                    <td style="text-align: center;">
                        <?= $data->id_jenis_kelamin ?>
                    </td>

                    <td style="text-align: center;">
                        <?= $data->tempat_lahir ?>
                    </td>

                    <td style="text-align: center;">
                        <?= $data->tanggal_lahir ?>
                    </td>

                   <td style="text-align: center;">
                        <?= $data->no_telepon ?>
                    </td>

                    <td style="text-align: center;">
                        <?= $data->email ?>
                    </td>


                    <td style="text-align: center;">
                        <?= $data->nik ?>
                    </td>

                    <td style="text-align: center;">
                        <?= $data->nomor_asuransi ?>
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