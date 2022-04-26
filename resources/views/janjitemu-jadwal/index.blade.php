<?php
/* @var  $gridView \App\Components\GridView */

?>

@extends($layout)

@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Janji Temu Jadwal</h2>
    </div>
    <div class="card-body">
        <div style="margin-bottom: 20px">
            <a href="<?=url('/janjitemu-jadwal/create'); ?>" class="btn btn-primary btn-flat">
                <i class="fa fa-plus-circle"></i> Tambah Data
            </a>
        </div>
        <div style="overflow: auto">
            <table class="table table-bordered table-condensed">
                <tr>
                    <th style="width: 50px;">No</th>

                    <th style="text-align: center;">
                        Dokter
                    </th>

                    <th style="text-align: center;">
                        Faskes
                    </th>

                    <th style="text-align: center;">
                        Poli
                    </th>



                    <th style="text-align: center; width: 85px;">OPSI</th>
                </tr>

                <?php
                ?>
                <?php $i=1; foreach($allJanjitemuJadwal as $data) { ?>
                <tr>
                    <td style="text-align: center"><?= $i; ?></td>

                    <td style="text-align: left;">
                        <?= $data->dokter->nama ?>
                    </td>

                    <td style="text-align: left;">
                        <?= $data->faskes->nama ?>
                    </td>

                    <td style="text-align: left;">
                        <?= $data->poli->nama ?>
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
