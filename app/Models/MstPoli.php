<?php

namespace App\Models;

use App\Components\Html;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property  string $id
 * @property  string $nama
 * @property  string $id_faskes
 * @property  \App\Models\Faskes faskes
 * @method static findOrFail($id)
 */

class MstPoli extends BaseModel
{
    // use SoftDeletes;

    protected $table = 'mst_poli';

    protected $fillable = [
        'id',
        'nama',
        'id_faskes',
        'id_spesialisasi',
    ];

    protected $appends = [
        'nama_faskes',
        'nama_spesialisasi',
    ];

    public function faskes() {
        return $this->hasOne(MstFaskes::class, 'id', 'id_faskes');
    }

    public function spesialisasi() {
        return $this->hasOne(MstSpesialisasi::class, 'id', 'id_spesialisasi');
    }

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

        if(@$params['id_faskes'] != null) {
            $query->where('id_faskes', @$params['id_faskes']);
        }

        return $query;
    }

    /**
     * @param  array $params
     * @return  MstPoli[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
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
            '/mst-poli/read',
            'id' => $this->id        ]);
    }

    public function getLinkUpdateIcon()
    {
        return Html::a('<i class="fa fa-pencil-alt"></i>', [
            '/mst-poli/update',
            'id' => $this->id        ]);
    }

    public function getLinkDeleteIcon()
    {
        return Html::a('<i class="fa fa-trash"></i>', [
            '/mst-poli/delete/',
            'id' => $this->id        ], [
            'onclick'=>'return confirm(\'Yakin akan menghapus data?\')'
        ]);
    }

    public function getLinkReadButton()
    {
        return Html::a('<i class="fa fa-eye"></i> Lihat', url("mst-poli/read?id=$this->id"),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function getLinkUpdateButton()
    {
        return Html::a('<i class="fa fa-pencil"></i> Ubah', url("mst-poli/update?id=$this->id"),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function getLinkDeleteButton()
    {
        return Html::a('<i class="fa fa-trash"></i> Hapus', url("mst-poli/delete?id=$this->id"),[
            'class' => 'btn btn-success btn-flat',
            'onclick'=>'return confirm("Yakin akan menghapus data?")'
        ]);
    }

    public function getLinkIndexButton()
    {
        return Html::a('<i class="fa fa-list"></i> Index', url('mst-poli/index'),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public static function findArraySelect($params = [])
    {
        $array = [];

        $query = MstPoli::query([
            'id_faskes' => @$params['id_faskes']
        ]) ;

        foreach($query->get() as $data) {
            $array[$data->id] = $data->nama;
        }

        return $array;
    }

    public function getNamaFaskesAttribute()
    {
        return @$this->faskes->nama;
    }

    public function getNamaSpesialisasiAttribute()
    {
        return "Spesialis " . @$this->spesialisasi->nama;
    }
}
