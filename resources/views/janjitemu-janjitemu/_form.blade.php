<?php

use App\Models\MstDokter;use App\Models\MstPasien;

/* @var  $model \App\Models\JanjitemuJanjitemu */
/* @var  $url string */

?>

<?= Form::open(['url' => $url]); ?>

<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Form Janjitemu Janjitemu</h2>
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
            <?= Form::label('id_pasien', 'Pasien', ['class' => 'control-label']); ?>
            <?= Form::select('id_pasien', MstPasien::findArraySelect(), $model->id_pasien, ['class'=>'form-control']); ?>
        </div>

        <div class="form-group">
            <?= Form::label('id_dokter', 'Dokter', ['class' => 'control-label']); ?>
            <?= Form::select('id_dokter', MstDokter::findArraySelect(), $model->id_dokter, ['class'=>'form-control']); ?>
        </div>

        <div class="form-group">
            <?= Form::label('keluhan_utama', 'Keluhan Utama', ['class' => 'control-label']); ?>
            <?= Form::textarea('keluhan_utama', $model->keluhanUtama->nama, ['class'=>'form-control']); ?>
        </div>

        <div class="form-group">
            <?= Form::label('waktu_janjitemu_rencana', 'Waktu Janji Temu Rencana', ['class' => 'control-label']); ?>
            <?= Form::text('waktu_janjitemu_rencana', $model->waktu_janjitemu_rencana, ['class'=>'form-control']); ?>
        </div>

        <?= Form::hidden('referrer', $referrer); ?>
        <?= Form::hidden('process', 1); ?>
    </div>

    <div class="card-footer">
        <?= Form::submit('Kirim', ['class'=>'btn btn-success btn-flat']); ?>
    </div>
</div>

<?= Form::close(); ?>
