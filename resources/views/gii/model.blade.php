<?php

use Illuminate\Support\Facades\Schema;


$allColumn = Schema::getColumnListing($table);
$modelName = str_replace('_', ' ',$table);
$modelName = ucwords($modelName);
$modelName = str_replace(' ','', $modelName);

$urlName = str_replace('_','-',$table);


print "<?php";

?>


namespace App\Models;

use App\Components\Html;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
<?php foreach($allColumn as $column) { ?>
 * @property string $<?= $column."\n"; ?>
<?php } ?>
<?php foreach($allColumn as $column) {?>
<?php if(substr($column,0,3) == 'id_') { ?>
<?php
$className = str_replace('id_', '', $column);
$className = str_replace('_',' ', $className);
$className = ucwords($className);
$className = str_replace(' ' ,'',$className);

$relationName = lcfirst($className);
?>
 * @property \App\Models\<?= $className; ?> <?= $relationName."\n"; ?>
<?php } ?>
<?php } ?>
 * <?= "@method"; ?> static findOrFail($id)
 */

class <?= $modelName; ?> extends BaseModel
{
    use SoftDeletes;

    protected $table = '<?= $table; ?>';
    <?php foreach($allColumn as $column) {?>
    <?php if(substr($column,0,3) == 'id_') { ?>
    <?php
        $className = str_replace('id_', '', $column);
        $className = str_replace('_',' ', $className);
        $className = ucwords($className);
        $className = str_replace(' ' ,'',$className);

        $relationName = lcfirst($className);
    ?>

    public function <?= $relationName; ?>() {
        return $this->hasOne(<?= $className; ?>::class, 'id', '<?= $column; ?>');
    }
    <?php } ?>
    <?php } ?>


    protected $fillable = [
<?php foreach($allColumn as $column) { ?>
        '<?= $column; ?>',
<?php } ?>
    ];

    /**
     * @param array $params
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function query($params=[])
    {
        $query = parent::query();
        <?php foreach($allColumn as $column) { ?>

        if(@$params['<?= $column; ?>'] != null) {
            $query->where('<?= $column; ?>', @$params['<?= $column; ?>']);
        }
        <?php } ?>

        return $query;
    }

    /**
     * @param array $params
     * @return <?= $modelName; ?>[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function get($params=[])
    {
        $query = static::query($params);
        return $query->get();
    }

    /**
     * @param $params
     * @return int
     */
    public static function sum($params=[])
    {
        $query = static::query($params);

        return $query->sum(@$params['attribute']);
    }

    /**
     * @param $params
     * @return int
     */
    public static function count($params=[])
    {
        $query = static::query($params);
        return $query->count();
    }

    public function getLinkReadIcon()
    {
        return Html::a('<i class="fa fa-eye"></i>', [
            '/<?= $urlName; ?>/read',
            'id' => <?= '$this->id'; ?>
        ]);
    }

    public function getLinkUpdateIcon()
    {
        return Html::a('<i class="fa fa-pencil"></i>', [
            '/<?= $urlName; ?>/update',
            'id' => <?= '$this->id'; ?>
        ]);
    }

    public function getLinkDeleteIcon()
    {
        return Html::a('<i class="fa fa-trash"></i>', [
            '/<?= $urlName; ?>/delete/',
            'id' => <?= '$this->id'; ?>
        ], [
            'onclick'=>'return confirm(\'Yakin akan menghapus data?\')'
        ]);
    }

    public function getLinkReadButton()
    {
        return Html::a('<i class="fa fa-eye"></i> Lihat', url("<?= $urlName; ?>/read?id=<?= '$this->id'; ?>"),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function getLinkUpdateButton()
    {
        return Html::a('<i class="fa fa-pencil"></i> Ubah', url("<?= $urlName; ?>/update?id=<?= '$this->id'; ?>"),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function getLinkDeleteButton()
    {
        return Html::a('<i class="fa fa-trash"></i> Hapus', url("<?= $urlName; ?>/delete?id=<?= '$this->id'; ?>"),[
            'class' => 'btn btn-success btn-flat',
            'onclick'=>'return confirm("Yakin akan menghapus data?")'
        ]);
    }

    public function getLinkIndexButton()
    {
        return Html::a('<i class="fa fa-list"></i> Index', url('<?= $urlName; ?>/index'),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }
}
