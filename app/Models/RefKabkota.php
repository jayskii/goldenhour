<?php

namespace App\Models;

use App\Components\Html;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property  string $id
 * @property  string $id_provinsi
 * @property  string $nama
 * @property  \App\Models\Provinsi provinsi
 * @method static findOrFail($id)
 */

class RefKabkota extends BaseModel
{
    use SoftDeletes;

    protected $table = 'ref_kabkota';
                    
    public function provinsi() {
        return $this->hasOne(Provinsi::class, 'id', 'id_provinsi');
    }
                

    protected $fillable = [
        'id',
        'id_provinsi',
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
        
        if(@$params['id_provinsi'] != null) {
            $query->where('id_provinsi', @$params['id_provinsi']);
        }
        
        if(@$params['nama'] != null) {
            $query->where('nama', @$params['nama']);
        }
        
        return $query;
    }

    /**
     * @param  array $params
     * @return  RefKabkota[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
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
            '/ref-kabkota/read',
            'id' => $this->id        ]);
    }

    public function getLinkUpdateIcon()
    {
        return Html::a('<i class="fa fa-pencil"></i>', [
            '/ref-kabkota/update',
            'id' => $this->id        ]);
    }

    public function getLinkDeleteIcon()
    {
        return Html::a('<i class="fa fa-trash"></i>', [
            '/ref-kabkota/delete/',
            'id' => $this->id        ], [
            'onclick'=>'return confirm(\'Yakin akan menghapus data?\')'
        ]);
    }

    public function getLinkReadButton()
    {
        return Html::a('<i class="fa fa-eye"></i> Lihat', url("ref-kabkota/read?id=$this->id"),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function getLinkUpdateButton()
    {
        return Html::a('<i class="fa fa-pencil"></i> Ubah', url("ref-kabkota/update?id=$this->id"),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function getLinkDeleteButton()
    {
        return Html::a('<i class="fa fa-trash"></i> Hapus', url("ref-kabkota/delete?id=$this->id"),[
            'class' => 'btn btn-success btn-flat',
            'onclick'=>'return confirm("Yakin akan menghapus data?")'
        ]);
    }

    public function getLinkIndexButton()
    {
        return Html::a('<i class="fa fa-list"></i> Index', url('ref-kabkota/index'),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }
}
