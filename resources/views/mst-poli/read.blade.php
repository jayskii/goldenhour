<?php


/* @var  $model \App\Models\MstPoli */

?>

@extends($layout)

@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Detail Poli</h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
                        
            <tr>
                <th style="width: 180px">Nama</th>
                <td><?= $model->nama ?></td>
            </tr>
                        
            <tr>
                <th style="width: 180px">Faskes</th>
                <td><?= $model->faskes->nama ?></td>
            </tr>

            <tr>
                <th style="width: 180px">Spesialisasi</th>
                <td><?= $model->spesialisasi->nama ?></td>
            </tr>
            
        </table>
    </div>
    <div class="card-footer">
        <?= $model->getLinkUpdateButton(); ?>
        <?= $model->getLinkIndexButton(); ?>
    </div>
</div>

@endsection