<?php
/* @var  $gridView \App\Components\GridView */

use App\Models\MstOrang;

?>

@extends($layout)

@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">MST Dokter</h2>
    </div>
    <div class="card-body">
        <div style="margin-bottom: 20px">
            <a href="<?=url('/mst-dokter/create'); ?>" class="btn btn-primary btn-flat">
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
                        Fasilitas Kesehatan
                    </th>

                    <th style="text-align: center;">
                        Spesialisasi
                    </th>

                    <th style="width: 150px;">
                        Foto
                    </th>

                    <th style="text-align: center; width: 85px;">OPSI</th>
                </tr>

                <?php
                ?>
                <?php $i=1; foreach($allMstDokter as $data) { ?>
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

                    <td style="width: 50px;">
                        @if ($data->foto != null)
                        <img src="{{ asset('/uploads/foto_dokter/'.$data->foto) }}" alt="FotoDokter" class="img-responsive" width="100px">
                        @else
                        <img src="{{ asset('/images/logo-dokter.png') }}" class="img-responsive" width="100px">
                       @endif
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
