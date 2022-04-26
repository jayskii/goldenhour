<?php

$this->title = 'Tambah Mst Spesialisasi';

/* @var  $model \App\Models\MstSpesialisasi */

?>

@extends($layout)

@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title"><?= $this->title; ?></h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
                        
            <tr>
                <th style="width: 180px">Id</th>
                <td><?= $model->id ?></td>
            </tr>
                        
            <tr>
                <th style="width: 180px">Nama</th>
                <td><?= $model->nama ?></td>
            </tr>
            
        </table>
    </div>
    <div class="card-footer">
        <?= $model->getLinkUpdateButton(); ?>
        <?= $model->getLinkIndexButton(); ?>
    </div>
</div>

@endsection