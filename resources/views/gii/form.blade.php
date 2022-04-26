<?php

use Illuminate\Support\Facades\Schema;

$allColumn = Schema::getColumnListing($table);
$modelName = str_replace('_', ' ',$table);
$modelName = ucwords($modelName);
$titleName = $modelName;
$modelName = str_replace(' ','', $modelName);

print "<?php";

?>


/* @var $model \App\Models\<?= $modelName; ?> */
/* @var $url string */

<?= "?>"; ?>


<?= '<?='; ?> Form::open(['url' => $url]); <?= '?>'; ?>


<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title">Form <?= $titleName ?></h2>
    </div>
    <div class="card-body">
        <?= '<?php'; ?> if(@$model->hasErrors()) { <?= '?>'; ?>

        <div class="alert alert-danger">
            Mohon untuk memperbaiki kesalahan berikut ini<br><br>
            <ul>
                <?= '<?php'; ?> foreach(@$model->getErrors() as $error) { <?= '?>'; ?>

                <li><?= '<?='; ?> $error; <?= '?>'; ?></li>
                <?= '<?php'; ?> } <?= '?>'; ?>

            </ul>
        </div>
        <?= '<?php'; ?> } <?= '?>'; ?>

        <?php foreach($allColumn as $column) { ?>
        <?php
            $columnName = str_replace('id_', '', $column);
            $columnName = str_replace('_', ' ', $columnName);
            $columnName = ucwords($columnName);
        ?>

        <div class="form-group">
            <?= '<?='; ?> Form::label('<?= $column; ?>', '<?= $columnName; ?>', ['class' => 'control-label']); <?= '?>'; ?>

            <?= '<?='; ?> Form::text('<?= $column; ?>', $model-><?= $column; ?>, ['class'=>'form-control']); <?= '?>'; ?>

        </div>
        <?php } ?>

        <?= '<?='; ?> Form::hidden('referrer', $referrer); <?= '?>'; ?>
        <?= '<?='; ?> Form::hidden('process', 1); <?= '?>'; ?>

    </div>

    <div class="card-footer">
        <?= '<?='; ?> Form::submit('Kirim', ['class'=>'btn btn-success btn-flat']); <?= '?>'; ?>

    </div>
</div>

<?= '<?='; ?> Form::close(); <?= '?>'; ?>
