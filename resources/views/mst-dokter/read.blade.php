<?php

/* @var  $model \App\Models\MstDokter */
use App\Models\MstDokter;
?>

@extends($layout)

@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Detail Dokter</h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
                        
            {{-- <tr>
                <th style="width: 180px">Orang</th>
                <td><?= $model->id_orang ?></td>
            </tr> --}}
                        
            <tr>
                <th style="width: 180px">Nama</th>
                <td><?= $model->nama ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Fasilitas Kesehatan</th>
                <td><?= $model->faskes->nama ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Spesialisasi</th>
                <td><?= $model->spesialisasi->nama ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Poliklinik</th>
                <td><?= $model->poli->nama ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Foto</th>
                <td>
                    @if ($model->foto != null)
                    <img src="{{ asset('/uploads/foto_dokter/'.$model->foto) }}" alt="FotoDokter" class="img-responsive" width="100px">
                    @else
                    <img src="{{ asset('/images/logo-dokter.png') }}" class="img-responsive" width="100px">
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

@endsection