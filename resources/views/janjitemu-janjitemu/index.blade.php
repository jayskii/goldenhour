<?php
/* @var  $gridView \App\Components\GridView */

?>

@extends($layout)

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Janji Temu</h2>
    </div>
    <div class="card-body">
        <div style="margin-bottom: 20px">
            <a href="<?=url('/janjitemu-janjitemu/create-by-jadwal'); ?>" class="btn btn-primary btn-flat">
                <i class="fa fa-plus-circle"></i> Tambah Melalui Jadwal
            </a>
            <a href="<?=url('/janjitemu-janjitemu/create'); ?>" class="btn btn-primary btn-flat">
                <i class="fa fa-plus-circle"></i> Tambah Langsung
            </a>
        </div>
        <div style="overflow: auto">
            <table class="table table-bordered table-condensed">
                <tr>
                    <th style="width: 50px;">No</th>


                    <th style="text-align: center;">
                        Pasien
                    </th>

                    <th style="text-align: center;">
                        Faskes
                    </th>

                    <th style="text-align: center;">
                        Poli
                    </th>

                    <th style="text-align: center;">
                        Dokter
                    </th>

                    <th style="text-align: center;">
                        Keluhan Utama
                    </th>

                    <th style="text-align: center;">
                        Waktu Janji Temu Rencana
                    </th>

                    <th style="text-align: center; width: 85px;">OPSI</th>
                </tr>

                <?php
                ?>
                <?php $i=1; foreach($allJanjitemuJanjitemu as $data) { ?>
                <tr>
                    <td style="text-align: center"><?= $i; ?></td>

                    <td style="text-align: left;">
                        <?= @$data->pasien->nama ?>
                    </td>

                    <td style="text-align: left">
                        <?= @$data->faskes->nama ?>
                    </td>

                    <td style="text-align: left">
                        <?= @$data->poli->nama ?>
                    </td>

                    <td style="text-align: left">
                        <?= @$data->dokter->nama ?>
                    </td>

                    <td style="text-align: left">
                        <?= $data->keluhanUtama->nama ?>
                    </td>

                    <td style="text-align: left">
                        <?= $data->waktu_janjitemu_rencana ?>
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
