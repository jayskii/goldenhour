<?php

use App\Models\MstDokter;use App\Models\MstFaskes;use App\Models\MstPasien;use App\Models\MstPoli;use App\Models\RefHari;

/* @var  $model \App\Models\JanjitemuJanjitemu */
/* @var  $url string */

$datetime = DateTime::createFromFormat('Y-m-d',date('Y-m-d'));

?>

@extends($layout)

@section('content')

<?= Form::open(['url' => url('/janjitemu-janjitemu/create-by-jadwal')]); ?>

<div class="card card-default">
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
            <?= Form::label('id_dokter', 'Dokters', ['class' => 'control-label']); ?>
            <?= Form::select('id_dokter', MstDokter::findArraySelect(), $model->id_dokter, [
                'class'=>'form-control',
                'placeholder' => '- Pilih Dokter -'
            ]); ?>
        </div>

        <?php /*
        <div class="form-group">
            <?= Form::label('id_faskes', 'Faskes', ['class' => 'control-label']); ?>
            <?= Form::select('id_faskes', MstFaskes::findArraySelect(), $model->id_faskes, ['class'=>'form-control']); ?>
        </div>

        <?php if($model->id_faskes !== null) { ?>
        <div class="form-group">
            <?= Form::label('id_poli', 'Poli', ['class' => 'control-label']); ?>
            <?= Form::select('id_poli', MstPoli::findArraySelect(['id_faskes'=>$model->id_faskes]), $model->id_faskes, ['class'=>'form-control']); ?>
        </div>
        <?php } ?>

        <?php if($model->id_poli !== null) { ?>
        <div class="form-group">
            <?= Form::label('id_dokter', 'Poli', ['class' => 'control-label']); ?>
            <?= Form::select('id_dokter', Dok::findArraySelect(['id_faskes'=>$model->id_faskes]), $model->id_faskes, ['class'=>'form-control']); ?>
        </div>
        <?php } ?>
        */ ?>

        <?= Form::hidden('referrer', $referrer); ?>
        <?= Form::hidden('process', 1); ?>
    </div>

    <div class="card-footer">
        <?= Form::submit('Tampilkan Jadwal', ['class'=>'btn btn-primary btn-flat']); ?>
    </div>
</div>

<?php if($model->id_dokter !== null) { ?>
<div class="card card-default">
    <div class="card-header">
        <h2 class="card-title">Jadwal</h2>
    </div>
    <div class="card-body">
        <?php for($i=1;$i<=10;$i++) { ?>
            <div style="font-weight: bold">
                <?php
                    $id_hari = $datetime->format('N');
                    $query = \App\Models\JanjitemuJadwalRincian::query([
                        'id_dokter' => $model->id_dokter,
                        'id_hari' => $id_hari
                    ]);
                    $query->orderBy('jam_mulai','asc');
                    $allJanjiTemuRincian = $query->get();
                ?>
                <?= RefHari::findNama(['id'=>$id_hari]); ?>,
                <?= $datetime->format('d-m-Y'); ?>
            </div>
            <?php

            ?>
            <div style="margin-bottom: 20px;">
                <?php if(count($allJanjiTemuRincian) != 0) { ?>
                <?php foreach($allJanjiTemuRincian as $data) { ?>
                <?php $waktu_janjitemu_rencana = $data->getWaktuJanjiTemuRencana(['tanggal'=>$datetime->format('Y-m-d')]); ?>
                <div>
                    <?= Form::radio('waktu_janjitemu_rencana', $datetime->format('Y-m-d').' '.$waktu_janjitemu_rencana, null); ?>
                    <?= substr($waktu_janjitemu_rencana,10,6); ?>
                </div>
                <?php } ?>
                <?php } else { ?>
                <div>Jadwal Tidak Tersedia</div>
                <?php } ?>
            </div>
            <?php $datetime->modify('+1 day'); ?>
        <?php } ?>
    </div>
</div>
<?php } ?>

<?php if($model->id_dokter !== null) { ?>
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Keluhan</h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <?= Form::label('id_pasien', 'Pasien', ['class' => 'control-label']); ?>
            <?= Form::select('id_pasien', MstPasien::findArraySelect(), $model->id_pasien, ['class'=>'form-control']); ?>
        </div>

        <div class="form-group">
            <?= Form::label('keluhan_utama', 'Keluhan Utama', ['class' => 'control-label']); ?>
            <?= Form::textarea('keluhan_utama', $model->keluhan_utama, ['class'=>'form-control']); ?>
        </div>


        <?= Form::hidden('process', 1); ?>
    </div>
    <div class="card-footer">
        <?= Form::submit('Kirim', ['class'=>'btn btn-primary btn-flat']); ?>
    </div>
</div>
<?php } ?>

<?= Form::hidden('referrer', $referrer); ?>

<?= Form::close(); ?>

@endsection
