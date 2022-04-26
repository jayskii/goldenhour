<?php

namespace App\Models;

use App\Components\Html;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property  string $id
 * @property  string $nama
 * @method static findOrFail($id)
 */

class JenisKelamin extends BaseModel
{
    use SoftDeletes;

    protected $table = 'ref_jenis_kelamin';


    protected $fillable = [
        'id',
        'nama',
    ];

    /**
     * @param  array $params
     * @return  \Illuminate\Database\Eloquent\Builder
     */
    public static function query($params=[])
    {
        $query = parent::query();

        if(@$params['id'] != null) {
            $query->where('id', @$params['id']);
        }

        if(@$params['nama'] != null) {
            $query->where('nama', @$params['nama']);
        }

        return $query;
    }

    /**
     * @param  array $params
     * @return  MstSpesialisasi[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function get($params=[])
    {
        $query = static::query($params);
        return $query->get();
    }

    /**
     * @param  $params
     * @return  int
     */
    public static function sum($params=[])
    {
        $query = static::query($params);

        return $query->sum(@$params['attribute']);
    }

    /**
     * @param  $params
     * @return  int
     */
    public static function count($params=[])
    {
        $query = static::query($params);
        return $query->count();
    }

    public function getLinkReadIcon()
    {
        return Html::a('<i class="fa fa-eye"></i>', [
            '/jenis-kelamin/read',
            'id' => $this->id        ]);
    }

    public function getLinkUpdateIcon()
    {
        return Html::a('<i class="fa fa-pencil"></i>', [
            '/jenis-kelamin/update',
            'id' => $this->id        ]);
    }

    public function getLinkDeleteIcon()
    {
        return Html::a('<i class="fa fa-trash"></i>', [
            '/jenis-kelamin/delete/',
            'id' => $this->id        ], [
            'onclick'=>'return confirm(\'Yakin akan menghapus data?\')'
        ]);
    }

    public function getLinkReadButton()
    {
        return Html::a('<i class="fa fa-eye"></i> Lihat', url("jenis-kelamin/read?id=$this->id"),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function getLinkUpdateButton()
    {
        return Html::a('<i class="fa fa-pencil"></i> Ubah', url("jenis-kelamin/update?id=$this->id"),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function getLinkDeleteButton()
    {
        return Html::a('<i class="fa fa-trash"></i> Hapus', url("jenis-kelamin/delete?id=$this->id"),[
            'class' => 'btn btn-success btn-flat',
            'onclick'=>'return confirm("Yakin akan menghapus data?")'
        ]);
    }

    public function getLinkIndexButton()
    {
        return Html::a('<i class="fa fa-list"></i> Index', url('jenis-kelamin/index'),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public static function findArraySelect()
    {
        $array = [];
        foreach(JenisKelamin::all() as $data) {
            $array[$data->id] = $data->nama;
        }
        return $array;
    }
}