<?php

namespace App\Models;

use App\Components\Html;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property  string $id
 * @property  string $nama
 * @property  string $alamat
 * @property  string $id_provinsi
 * @property  string $id_kabkota
 * @property  string $id_kecamatan
 * @property  \App\Models\RefProvinsi $provinsi
 * @property  \App\Models\RefKabkota $kabkota
 * @property  \App\Models\RefKecamatan $kecamatan
 * @method static MstFaskes findOrFail($id)
 */

class MstFaskes extends BaseModel
{
    // use SoftDeletes;

    protected $table = 'mst_faskes';

    public function provinsi() {
        return $this->hasOne(RefProvinsi::class, 'id', 'id_provinsi');
    }

    public function kabkota() {
        return $this->hasOne(RefKabkota::class, 'id', 'id_kabkota');
    }

    public function kecamatan() {
        return $this->hasOne(RefKecamatan::class, 'id', 'id_kecamatan');
    }


    protected $fillable = [
        'id',
        'nama',
        'id_faskes_jenis',
        'alamat',
        'id_provinsi',
        'id_kabkota',
        'id_kecamatan',
        'foto',
    ];

    protected $appends = [
        'nama_faskes_jenis',
        'nama_provinsi',
        'nama_kabkota',
        'nama_kecamatan',
        'url_foto',
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

        if(@$params['alamat'] != null) {
            $query->where('alamat', @$params['alamat']);
        }

        if(@$params['id_provinsi'] != null) {
            $query->where('id_provinsi', @$params['id_provinsi']);
        }

        if(@$params['id_kabkota'] != null) {
            $query->where('id_kabkota', @$params['id_kabkota']);
        }

        if(@$params['id_kecamatan'] != null) {
            $query->where('id_kecamatan', @$params['id_kecamatan']);
        }

        return $query;
    }

    /**
     * @param  array $params
     * @return  MstFaskes[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
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
            '/mst-faskes/read',
            'id' => $this->id        ]);
    }

    public function getLinkUpdateIcon()
    {
        return Html::a('<i class="fa fa-pencil-alt"></i>', [
            '/mst-faskes/update',
            'id' => $this->id        ]);
    }

    public function getLinkDeleteIcon()
    {
        return Html::a('<i class="fa fa-trash"></i>', [
            '/mst-faskes/delete/',
            'id' => $this->id        ], [
            'onclick'=>'return confirm(\'Yakin akan menghapus data?\')'
        ]);
    }

    public function getLinkReadButton()
    {
        return Html::a('<i class="fa fa-eye"></i> Lihat', url("mst-faskes/read?id=$this->id"),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function getLinkUpdateButton()
    {
        return Html::a('<i class="fa fa-pencil-alt"></i> Ubah', url("mst-faskes/update?id=$this->id"),[
            'class' => 'btn btn-primary btn-flat'
        ]);
    }

    public function getLinkDeleteButton()
    {
        return Html::a('<i class="fa fa-trash"></i> Hapus', url("mst-faskes/delete?id=$this->id"),[
            'class' => 'btn btn-primary btn-flat',
            'onclick'=>'return confirm("Yakin akan menghapus data?")'
        ]);
    }

    public function getLinkIndexButton()
    {
        return Html::a('<i class="fa fa-list"></i> Index', url('mst-faskes/index'),[
            'class' => 'btn btn-primary btn-flat'
        ]);
    }

    public function getNamaProvinsiAttribute()
    {
        return @$this->provinsi->nama;
    }

    public function getNamaKabkotaAttribute()
    {
        return @$this->kabkota->nama;
    }

    public function getNamaKecamatanAttribute()
    {
        return @$this->kecamatan->nama;
    }

    public function getUrlFotoAttribute()
    {
        if(is_file(public_path('uploads/foto_faskes/' . $this->foto)) == false){
            return asset('images/image-not-found.png'); 
        }

        return asset('/uploads/foto_faskes/'.$this->foto);
    }

    public static function findArraySelect()
    {
        $array = [];
        foreach(MstFaskes::all() as $data) {
            $array[$data->id] = $data->nama;
        }
        return $array;
    }

    public function faskesJenis()
    {
        return $this->hasOne(RefFaskesJenis::class,'id','id_faskes_jenis');
    }

    public function getNamaFaskesJenisAttribute()
    {
        return @$this->faskesJenis->nama;
    }

    public function manyPoli()
    {
        return $this->hasMany(MstPoli::class,'id_faskes','id');
    }

    public function getAllPoli()
    {
        return $this->manyPoli()->get();
    }

    public function manyDokter()
    {
        return $this->hasMany(MstDokter::class,'id_faskes','id');
    }

    public function getAllDokter()
    {
        return $this->manyDokter()->get();
    }
}
