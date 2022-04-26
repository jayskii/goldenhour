<?php
/* @var  $gridView \App\Components\GridView */

?>

@extends($layout)

@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Janji Temu Jadwal Rincian</h2>
    </div>
    <div class="card-body">
        <div style="margin-bottom: 20px">

            <a href="<?=url('/janjitemu-jadwal-rincian/create'); ?>" class="btn btn-primary btn-flat">
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
                        Jadwal
                    </th>

                    <th style="text-align: center;">
                        Hari
                    </th>

                    <th style="text-align: center;">
                        Jam Mulai
                    </th>

                    <th style="text-align: center;">
                        Jam Selesai
                    </th>

                   <th style="text-align: center; width: 85px;">OPSI</th>
                </tr>

                <?php
                ?>
                <?php $i=1; foreach($allJanjitemuJadwalRincian as $data) { ?>
                <tr>
                    <td style="text-align: center"><?= $i; ?></td>

                    <td style="text-align: center;">
                        <?= $data->nama ?>
                    </td>

                    <td style="text-align: center;">
                        <?= $data->id_jadwal ?>
                    </td>

                    <td style="text-align: center;">
                        <?= $data->id_hari ?>
                    </td>

                    <td style="text-align: center;">
                        <?= $data->jam_mulai ?>
                    </td>

                    <td style="text-align: center;">
                        <?= $data->jam_selesai ?>
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
