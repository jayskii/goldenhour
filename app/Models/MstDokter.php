<?php

namespace App\Models;

use App\Components\Html;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\MstOrang;

/**
 * @property  string $id
 * @property  string $id_orang
 * @property  string $nama
 * @property  \App\Models\Orang orang
 * @method static findOrFail($id)
 * @see MstDokter::spesialisasi()
 * @property MstSpesialisasi $spesialisasi
 */

class MstDokter extends BaseModel
{
    // use SoftDeletes;

    protected $table = 'mst_dokter';


    protected $fillable = [
        'id',
        'id_orang',
        'nama',
        'id_spesialisasi',
        'foto',
        'id_faskes',
        'id_poli'
    ];

    protected $appends = [
        'url_foto',
        'nama_faskes',
        'alamat_faskes',
        'nama_spesialisasi',
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

        if(@$params['id_faskes'] != null) {
            $query->where('id_faskes', @$params['id_faskes']);
        }

        if(@$params['id_poli'] != null) {
            $query->where('id_poli', @$params['id_poli']);
        }

        if(@$params['id_spesialisasi'] != null) {
            $query->where('id_spesialisasi', @$params['id_spesialisasi']);
        }

        if(@$params['id_orang'] != null) {
            $query->where('id_orang', @$params['id_orang']);
        }

        if(@$params['nama'] != null) {
            $query->where('nama', @$params['nama']);
        }

        return $query;
    }

    /**
     * @param  array $params
     * @return  MstDokter[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
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
            '/mst-dokter/read',
            'id' => $this->id        ]);
    }

    public function getLinkUpdateIcon()
    {
        return Html::a('<i class="fa fa-pencil-alt"></i>', [
            '/mst-dokter/update',
            'id' => $this->id        ]);
    }

    public function getLinkDeleteIcon()
    {
        return Html::a('<i class="fa fa-trash"></i>', [
            '/mst-dokter/delete/',
            'id' => $this->id        ], [
            'onclick'=>'return confirm(\'Yakin akan menghapus data?\')'
        ]);
    }

    public function getLinkReadButton()
    {
        return Html::a('<i class="fa fa-eye"></i> Lihat', url("mst-dokter/read?id=$this->id"),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function getLinkUpdateButton()
    {
        return Html::a('<i class="fa fa-pencil"></i> Ubah', url("mst-dokter/update?id=$this->id"),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function getLinkDeleteButton()
    {
        return Html::a('<i class="fa fa-trash"></i> Hapus', url("mst-dokter/delete?id=$this->id"),[
            'class' => 'btn btn-success btn-flat',
            'onclick'=>'return confirm("Yakin akan menghapus data?")'
        ]);
    }

    public function getLinkIndexButton()
    {
        return Html::a('<i class="fa fa-list"></i> Index', url('mst-dokter/index'),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function MstOrang()
    {
        return $this->hasOne(MstOrang::class,'id','id_orang');
    }

    public function spesialisasi()
    {
        return $this->hasOne(MstSpesialisasi::class,'id','id_spesialisasi');
    }

    public function faskes()
    {
        return $this->hasOne(MstFaskes::class,'id','id_faskes');
    }

    public function getNamaFaskesAttribute()
    {
        return @$this->faskes->nama;
    }

    public function getAlamatFaskesAttribute()
    {
        return @$this->faskes->alamat;
    }

    public function getNamaSpesialisasiAttribute()
    {
        return "Spesialis " . @$this->spesialisasi->nama;
    }

    public function poli()
    {
        return $this->hasOne(MstPoli::class,'id','id_poli');
    }

    public function getNamaIdOrang()
    {
        return $this->MstOrang->nama;
    }

    public function getUrlFotoAttribute()
    {
        if(is_file(public_path('uploads/foto_dokter/' . $this->foto)) == false){
            return asset('images/image-not-found.png'); 
        }

        return asset('/uploads/foto_dokter/'.$this->foto);
    }

    public static function findArraySelect()
    {
        $array = [];
        foreach(MstDokter::all() as $data) {
            $array[$data->id] = $data->nama.' - Spesialis '.@$data->spesialisasi->nama.' - '.@$data->faskes->nama;
        }

        return $array;
    }
}
