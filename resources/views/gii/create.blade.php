<?php

use Illuminate\Support\Facades\Schema;

$allColumn = Schema::getColumnListing($table);
$modelName = str_replace('_', ' ',$table);
$urlName = str_replace('_', '-',$table);
$viewName = str_replace('_', '-', $table);
$modelName = ucwords($modelName);
$titleName = $modelName;
$modelName = str_replace(' ','', $modelName);

print "<?php";

?>


//$this->title = 'Tambah <?= $titleName; ?>';

/* @var $model \App\Models\<?= $modelName; ?> */

<?= "?>"; ?>


<?= '@extends($layout)'; ?>


<?= '@section(\'content\')'; ?>


    <?= '@include'; ?>('<?= $viewName; ?>._form',[
        'model' => $model,
        'url' => url('/<?= $urlName; ?>/create')
    ])

<?= '@endsection'; ?>
