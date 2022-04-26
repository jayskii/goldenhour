<?php

namespace App\Models;

use App\Components\Html;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property  string $id
 * @property  string $id_pasien
 * @property  string $alergi
 * @property  string $penyakit_riwayat
 * @property  string $obat_dilarang
 * @property  string $obat_dikonsumsi
 * @property  \App\Models\RefProvinsi $provinsi
 * @property  \App\Models\RefKabkota $kabkota
 * @property  \App\Models\RefKecamatan $kecamatan
 * @method static MstFaskes findOrFail($id)
 */

class RiwayatPenyakit extends BaseModel
{
 

    protected $table = 'riwayat_penyakit';


    protected $fillable = [
        'id',
        'id_pasien',
        'alergi',
        'penyakit_riwayat',
        'obat_dilarang',
        'obat_dikonsumsi',
        
    ];

    protected $appends = [
       'nama_pasien'
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

        if(@$params['id_pasien'] != null) {
            $query->where('id_pasien', @$params['id_pasien']);
        }

        if(@$params['alergi'] != null) {
            $query->where('alergi', @$params['alergi']);
        }

        if(@$params['penyakit_riwayat'] != null) {
            $query->where('penyakit_riwayat', @$params['penyakit_riwayat']);
        }

        if(@$params['obat_dilarang'] != null) {
            $query->where('obat_dilarang', @$params['obat_dilarang']);
        }

        if(@$params['obat_dikonsumsi'] != null) {
            $query->where('obat_dikonsumsi', @$params['obat_dikonsumsi']);
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
            '/riwayat-penyakit/read',
            'id' => $this->id        ]);
    }

    public function getLinkUpdateIcon()
    {
        return Html::a('<i class="fa fa-pencil-alt"></i>', [
            '/riwayat-penyakit/update',
            'id' => $this->id        ]);
    }

    public function getLinkDeleteIcon()
    {
        return Html::a('<i class="fa fa-trash"></i>', [
            '/riwayat-penyakit/delete/',
            'id' => $this->id        ], [
            'onclick'=>'return confirm(\'Yakin akan menghapus data?\')'
        ]);
    }

    public function getLinkReadButton()
    {
        return Html::a('<i class="fa fa-eye"></i> Lihat', url("riwayat-penyakit/read?id=$this->id"),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function getLinkUpdateButton()
    {
        return Html::a('<i class="fa fa-pencil-alt"></i> Ubah', url("riwayat-penyakit/update?id=$this->id"),[
            'class' => 'btn btn-primary btn-flat'
        ]);
    }

    public function getLinkDeleteButton()
    {
        return Html::a('<i class="fa fa-trash"></i> Hapus', url("riwayat-penyakit/delete?id=$this->id"),[
            'class' => 'btn btn-primary btn-flat',
            'onclick'=>'return confirm("Yakin akan menghapus data?")'
        ]);
    }

    public function getLinkIndexButton()
    {
        return Html::a('<i class="fa fa-list"></i> Index', url('riwayat-penyakit/index'),[
            'class' => 'btn btn-primary btn-flat'
        ]);
    }

 
  
    public static function findArraySelect()
    {
        $array = [];
        foreach(RiwayatPenyakit::all() as $data) {
            $array[$data->id] = $data->nama;
        }
        return $array;
    }

    // public function faskesJenis()
    // {
    //     return $this->hasOne(RefFaskesJenis::class,'id','id_faskes_jenis');
    // }

    // public function getNamaFaskesJenisAttribute()
    // {
    //     return @$this->faskesJenis->nama;
    // }

    // public function manyPoli()
    // {
    //     return $this->hasMany(MstPoli::class,'id_faskes','id');
    // }

    // public function getAllPoli()
    // {
    //     return $this->manyPoli()->get();
    // }

    // public function manyDokter()
    // {
    //     return $this->hasMany(MstDokter::class,'id_faskes','id');
    // }

    // public function getAllDokter()
    // {
    //     return $this->manyDokter()->get();
    // }

    public function pasien() {
        return $this->hasOne(MstPasien::class, 'id', 'id_pasien');
    }

    public function getNamaPasienAttribute()
    {
        return @$this->pasien->nama;
    }
}
