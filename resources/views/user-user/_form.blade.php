<?php

use App\Models\MstFaskes;use App\Models\MstPasien;

/* @var  $model \App\Models\UserUser */
/* @var  $url string */

?>

<?= Form::open(['url' => $url]); ?>

<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Form User User</h2>
    </div>
    <div class="card-body">

        <div class="form-group">
            <?= Form::label('username', 'Username', ['class' => 'control-label']); ?>
            <?= Form::text('username', $model->username, ['class'=>'form-control']); ?>
        </div>

        <div class="form-group">
            <?= Form::label('password', 'Password', ['class' => 'control-label']); ?>
            <?= Form::password('password', ['class'=>'form-control']); ?>
        </div>

        <?php if($model->id_user_role == 2) { ?>
        <div class="form-group">
            <?= Form::label('id_pasien', 'Pasien', ['class' => 'control-label']); ?>
            <?= Form::select('id_pasien', MstPasien::findArraySelect(), $model->id_pasien, ['class'=>'form-control']); ?>
        </div>
        <?php } ?>

        <?php if($model->id_user_role == 3) { ?>
        <div class="form-group">
            <?= Form::label('id_faskes', 'Faskes', ['class' => 'control-label']); ?>
            <?= Form::select('id_faskes', MstFaskes::findArraySelect(), $model->id_faskes, ['class'=>'form-control']); ?>
        </div>
        <?php } ?>

        <?= Form::hidden('referrer', $referrer); ?>
        <?= Form::hidden('process', 1); ?>
    </div>

    <div class="card-footer">
        <?= Form::submit('Kirim', ['class'=>'btn btn-success btn-flat']); ?>
    </div>
</div>

<?= Form::close(); ?>
