<?php

use App\Models\RefHari;

/* @var  $model \App\Models\JanjitemuJadwalRincian */
/* @var  $url string */

?>

<?= Form::open(['url' => $url]); ?>

<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Form Janjitemu Jadwal Rincian</h2>
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
            <?= Form::label('id_hari', 'Hari', ['class' => 'control-label']); ?>
            <?= Form::select('id_hari', RefHari::findArraySelect(),$model->id_hari, ['class'=>'form-control']); ?>
        </div>

        <div class="form-group">
            <?= Form::label('jam_mulai', 'Jam Mulai', ['class' => 'control-label']); ?>
            <?= Form::text('jam_mulai', $model->jam_mulai, ['class'=>'form-control']); ?>
        </div>

        <div class="form-group">
            <?= Form::label('jam_selesai', 'Jam Selesai', ['class' => 'control-label']); ?>
            <?= Form::text('jam_selesai', $model->jam_selesai, ['class'=>'form-control']); ?>
        </div>

        <div class="form-group">
            <?= Form::label('durasi_konsultasi', 'Durasi Per Konsultasi (Menit)', ['class' => 'control-label']); ?>
            <?= Form::text('durasi_konsultasi', $model->durasi_konsultasi, ['class'=>'form-control']); ?>
        </div>

        <?= Form::hidden('referrer', $referrer); ?>        <?= Form::hidden('process', 1); ?>
    </div>

    <div class="card-footer">
        <?= Form::submit('Kirim', ['class'=>'btn btn-success btn-flat']); ?>
    </div>
</div>

<?= Form::close(); ?>
