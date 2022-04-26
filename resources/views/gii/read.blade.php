<?php

use Illuminate\Support\Facades\Schema;

$allColumn = Schema::getColumnListing($table);
$modelName = str_replace('_', ' ',$table);
$modelName = ucwords($modelName);
$titleName = $modelName;
$modelName = str_replace(' ','', $modelName);

print "<?php";

?>


$this->title = 'Tambah <?= $titleName; ?>';

/* @var $model \App\Models\<?= $modelName; ?> */

<?= "?>"; ?>


<?= '@extends($layout)'; ?>


<?= '@section(\'content\')'; ?>


<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title"><?= "<?="; ?> $this->title; <?= "?>"; ?></h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <?php foreach($allColumn as $column) { ?>
            <?php
            $columnName = str_replace('id_', '', $column);
            $columnName = str_replace('_', ' ', $columnName);
            $columnName = ucwords($columnName);
            ?>

            <tr>
                <th style="width: 180px"><?= $columnName; ?></th>
                <td><?= "<?="; ?> $model-><?= $column; ?> <?= "?>"; ?></td>
            </tr>
            <?php } ?>

        </table>
    </div>
    <div class="card-footer">
        <?= "<?="; ?> $model->getLinkUpdateButton(); <?= "?>"; ?>

        <?= "<?="; ?> $model->getLinkIndexButton(); <?= "?>"; ?>

    </div>
</div>

<?= '@endsection'; ?>
