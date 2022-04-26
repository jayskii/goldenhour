<?php

use App\Models\MstFaskes;use App\Models\MstSpesialisasi;

/* @var  $model \App\Models\MstPoli */
/* @var  $url string */

?>

<?= Form::open(['url' => $url]); ?>

<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Form Mst Poli</h2>
    </div>
    <div class="card-body">
        <?php if(@$model->hasErrors()) { ?>
        <div class="alert alert-danger">
            Mohon untuk memperbaiki kesalahan berikut ini<br><br>
            <ul>
                <?php foreach(@$model->getErrors() as $error) { ?>
                <li><?= $error; ?></li>
                <?php } ?>
            </ul>
        </div>
        <?php } ?>

        <div class="form-group">
            <?= Form::label('nama', 'Nama', ['class' => 'control-label']); ?>
            <?= Form::text('nama', $model->nama, ['class'=>'form-control']); ?>
        </div>

        <div class="form-group">
            <?= Form::label('id_faskes', 'Jenis Faskes', ['class' => 'control-label']); ?>
            <?= Form::select('id_faskes', MstFaskes::findArraySelect(), $model->id_faskes, ['class'=>'form-control']); ?>
        </div>

        <div class="form-group">
            <?= Form::label('id_spesialisasi', 'Spesialisasi', ['class' => 'control-label']); ?>
            <?= Form::select('id_spesialisasi', MstSpesialisasi::findArraySelect(), $model->id_spesialisasi, ['class'=>'form-control']); ?>
        </div>

        <?= Form::hidden('referrer', $referrer); ?>
        <?= Form::hidden('process', 1); ?>

    </div>

    <div class="card-footer">
        <?= Form::submit('Kirim', ['class'=>'btn btn-success btn-flat']); ?>
    </div>
</div>

<?= Form::close(); ?>
