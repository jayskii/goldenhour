<?php

/* @var  $model \App\Models\MstOrang */
/* @var  $url string */

use App\Components\Referensi;

?>

<?= Form::open(['url' => $url]); ?>

<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Form MST Orang</h2>
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
            <?= Form::label('alamat', 'Alamat', ['class' => 'control-label']); ?>
            <?= Form::text('alamat', $model->alamat, ['class'=>'form-control']); ?>
        </div>

        <div class="form-group">
            <?= Form::label('id_jenis_kelamin', 'Jenis Kelamin', ['class' => 'control-label']); ?>
            <?= Form::select('id_jenis_kelamin', Referensi::findArrayJenisKelamin(), $model->id_jenis_kelamin, [
                'class'=>'form-control',
                'placeholder' => '- Pilih Jenis Kelamin -'
                ]); ?>
        </div>

        <div class="form-group">
            <?= Form::label('tempat_lahir', 'Tempat Lahir', ['class' => 'control-label']); ?>
            <?= Form::text('tempat_lahir', $model->tempat_lahir, ['class'=>'form-control']); ?>
        </div>

        <div class="form-group">
            <?= Form::label('tanggal_lahir', 'Tanggal Lahir', ['class' => 'control-label']); ?>
            <?= Form::text('tanggal_lahir', $model->tanggal_lahir, ['class'=>'date form-control', 'autocomplete'=>'off']); ?>
        </div>

        <div class="form-group">
            <?= Form::label('no_telepon', 'Nomor Telepon', ['class' => 'control-label']); ?>
            <?= Form::text('no_telepon', $model->no_telepon, ['class'=>'form-control']); ?>
        </div>
                
        <div class="form-group">
            <?= Form::label('email', 'Email', ['class' => 'control-label']); ?>
            <?= Form::text('email', $model->email, ['class'=>'form-control']); ?>
        </div>
                
        <div class="form-group">
            <?= Form::label('nik', 'Nik', ['class' => 'control-label']); ?>
            <?= Form::text('nik', $model->nik, ['class'=>'form-control']); ?>
        </div>
                
        <div class="form-group">
            <?= Form::label('nomor_asuransi', 'Nomor Asuransi', ['class' => 'control-label']); ?>
            <?= Form::text('nomor_asuransi', $model->nomor_asuransi, ['class'=>'form-control']); ?>
        </div>
        
        <?= Form::hidden('referrer', $referrer); ?>        <?= Form::hidden('process', 1); ?>
    </div>

    <div class="card-footer">
        <?= Form::submit('Kirim', ['class'=>'btn btn-success btn-flat']); ?>
    </div>
</div>

<!-- <script type="text/javascript">
    $('.date').datepicker({  
       format: 'dd-mm-yyyy',
       autoclose : 'true'
    });  
</script> -->

<?= Form::close(); ?>