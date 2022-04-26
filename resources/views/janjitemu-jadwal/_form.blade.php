<?php

use App\Models\MstDokter;

/* @var  $model \App\Models\JanjitemuJadwal */
/* @var  $url string */

?>

<?= Form::open(['url' => $url]); ?>

<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Form Janjitemu Jadwal</h2>
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
            <?= Form::label('id_dokter', 'Dokter', ['class' => 'control-label']); ?>
            <?= Form::select('id_dokter', MstDokter::findArraySelect(), $model->id_dokter, ['class'=>'form-control']); ?>
        </div>

        <?= Form::hidden('referrer', $referrer); ?>
        <?= Form::hidden('process', 1); ?>
    </div>

    <div class="card-footer">
        <?= Form::submit('Kirim', ['class'=>'btn btn-success btn-flat']); ?>
    </div>
</div>

<?= Form::close(); ?>
