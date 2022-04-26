<?php

use App\Models\MstPasien;
use App\Components\Referensi;


/* @var  $model \App\Models\MstDokter */
/* @var  $url string */

?>

<?= Form::open([
    'url' => $url,
    'method' => 'post',
    'enctype' => 'multipart/form-data',
    'multiple'
]); ?>

<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Form Data Keluarga Pasien</h2>
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
            <?= Form::label('Pasien', 'Pasien', ['class' => 'control-label']); ?>
            <?= Form::select('id_pasien', MstPasien::findArraySelect(),$model->id_pasien, ['class'=>'select2 form-control']); ?>
        </div>

        <div class="form-group">
            <?= Form::label('Nama', 'Nama', ['class' => 'control-label']); ?>
            <?= Form::text('nama', $model->nama, ['class'=>'form-control']); ?>
        </div>
        <div class="form-group">
            <?= Form::label('Hubungan Keluarga', 'Hubungan Keluarga', ['class' => 'control-label']); ?>
            <?= Form::text('status_hubungan', $model->status_hubungan, ['class'=>'form-control']); ?>
        </div>

        <div class="form-group">
            <?= Form::label('id_jenis_kelamin', 'Jenis Kelamin', ['class' => 'control-label']); ?>
            <?= Form::select('id_jenis_kelamin', Referensi::findArrayJenisKelamin(), $model->id_jenis_kelamin, [
                'class'=>'form-control',
                'placeholder' => '- Pilih Jenis Kelamin -'
            ]); ?>
        </div>
        <div class="form-group">
            <?= Form::label('tanggal_lahir', 'Tanggal Lahir', ['class' => 'control-label']); ?>
            <?= Form::text('tanggal_lahir', $model->tanggal_lahir, ['class'=>'date form-control', 'autocomplete'=>'off']); ?>
        </div>
        <div class="form-group">
            <?= Form::label('id_golongan_darah', 'Golongan Darah', ['class' => 'control-label']); ?>
            <?= Form::select('id_golongan_darah', Referensi::findArrayGolonganDarah(), $model->id_golongan_darah, [
                'class'=>'form-control',
                'placeholder' => '- Pilih Golongan Darah -'
            ]); ?>


        <?= Form::hidden('referrer', $referrer); ?>
        <?= Form::hidden('process', 1); ?>
    </div>

    <div class="card-footer">
        <?= Form::submit('Simpan', ['class'=>'btn btn-primary btn-flat']); ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        loadData()
        $('select2').select2();
    })
</script>

@section('js_footer')
<script type="text/javascript">
    $('.file-input').fileinput({
theme: "fas",
        showCancel: false,
        showPreview: true,
        allowedFileExtensions: ["png","jpg","jpeg"],
        maxFileSize: 1048, // 1 Mb
        elErrorContainer: "#errorBlock"
    });
</script>
@endsection

<?= Form::close(); ?>
