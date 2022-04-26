<?php
/* @var  $gridView \App\Components\GridView */

?>

@extends($layout)

@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">MST Faskes</h2>
    </div>
    <div class="card-body">
        <div style="margin-bottom: 20px">
            <a href="<?=url('/mst-faskes/create'); ?>" class="btn btn-primary btn-flat">
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
                        Jenis Faskes
                    </th>

                    <th style="text-align: center;">
                        Alamat
                    </th>

                    <th style="width: 50px;">
                        Foto Faskes
                    </th>

                    <th style="text-align: center; width: 85px;">OPSI</th>
                </tr>

                <?php
                ?>
                <?php $i=1; foreach($allMstFaskes as $data) { ?>
                <tr>
                    <td style="text-align: center"><?= $i; ?></td>

                    <td style="text-align: left;">
                        <?= $data->nama ?>
                    </td>

                    <td style="text-align: left;">
                        <?= @$data->faskesJenis->nama ?>
                    </td>

                    <td style="text-align: left;">
                        <?= $data->alamat ?>
                    </td>

                    <td style="width: 150px;">
                       @if ($data->foto != null)
                        <img src="{{ asset('/uploads/foto_faskes/'.$data->foto) }}" alt="FotoDokter" class="img-responsive" width="100px">
                        @else
                        <img src="{{ asset('/images/foto-faskes.jpg') }}" class="img-responsive" width="100px">
                       @endif
                    </td>

                    <!-- <td style="width: 150px;">
                        <img src="{{ asset('/uploads/foto_faskes/'.$data->foto) }}" alt="FotoDokter"
                         class="img-responsive" width="100px">
                    </td> -->

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
