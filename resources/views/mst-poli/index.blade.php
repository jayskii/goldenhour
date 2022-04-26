<?php
/* @var  $gridView \App\Components\GridView */

?>

@extends($layout)

@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">MST Poli</h2>
    </div>
    <div class="card-body">
        <div style="margin-bottom: 20px">
            <a href="<?=url('/mst-poli/create'); ?>" class="btn btn-primary btn-flat">
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
                        Faskes
                    </th>

                    <th style="text-align: center;">
                        Spesialisasi
                    </th>

                    <th style="text-align: center; width: 85px;">OPSI</th>
                </tr>

                <?php
                ?>
                <?php $i=1; foreach($allMstPoli as $data) { ?>
                <tr>
                    <td style="text-align: center"><?= $i; ?></td>

                    <td style="text-align: left;">
                        <?= $data->nama ?>
                    </td>

                    <td style="text-align: left;">
                        <?= @$data->faskes->nama ?>
                    </td>

                    <td style="text-align: left;">
                        <?= @$data->spesialisasi->nama ?>
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
