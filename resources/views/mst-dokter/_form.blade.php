<?php

use App\Models\MstFaskes;use App\Models\MstPoli;use App\Models\MstSpesialisasi;

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
        <h2 class="card-title">Form MST Dokter</h2>
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
            <?= Form::label('Spesialisasi', 'Spesialisasi', ['class' => 'control-label']); ?>
            <?= Form::select('id_spesialisasi', MstSpesialisasi::findArraySelect(),$model->id_spesialisasi, ['class'=>'select2 form-control']); ?>
        </div>

        <div class="form-group">
            <?= Form::label('Faskes', 'Faskes', ['class' => 'control-label']); ?>
            <?= Form::select('id_faskes', MstFaskes::findArraySelect(),$model->id_faskes, ['class'=>' select2 form-control']); ?>
        </div>

        <div class="form-group">
            <?= Form::label('Poli', 'Poli', ['class' => 'control-label']); ?>
            <?= Form::select('id_poli', MstPoli::findArraySelect(),$model->id_faskes, ['class'=>'select2 form-control']); ?>
        </div>

        <div>
            <label>Foto Dokter</label>
            <div class="file-loading">
                <input type="file" name="foto" class="file-input">
            </div>
        </div>


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
