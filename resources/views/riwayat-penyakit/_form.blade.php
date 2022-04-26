<?php

use App\Models\MstPasien;


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
        <h2 class="card-title">Form Riwayat Penyakit Pasien</h2>
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
            <?= Form::label('Alergi', 'Alergi', ['class' => 'control-label']); ?>
            <?= Form::text('alergi', $model->alergi, ['class'=>'form-control']); ?>
        </div>
        <div class="form-group">
            <?= Form::label('Riwayat Penyakit', 'Riwayat Penyakit', ['class' => 'control-label']); ?>
            <?= Form::text('penyakit_riwayat', $model->penyakit_riwayat, ['class'=>'form-control']); ?>
        </div>
        <div class="form-group">
            <?= Form::label('Obat Yang Dilarang', 'Obat Yang Dilarang', ['class' => 'control-label']); ?>
            <?= Form::text('obat_dilarang', $model->obat_dilarang, ['class'=>'form-control']); ?>
        </div>
        <div class="form-group">
            <?= Form::label('Obat Yang Masih Di Konsumsi', 'Obat Yang Masih Di Konsumsi', ['class' => 'control-label']); ?>
            <?= Form::text('obat_dikonsumsi', $model->obat_dikonsumsi, ['class'=>'form-control']); ?>
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
