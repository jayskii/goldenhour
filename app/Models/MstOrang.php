<?php

namespace App\Models;

use App\Components\Html;
// use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property  string $alamat
 * @property  string $email
 * @property  string $handphone
 * @property  string $id
 * @property  string $id_jenis_kelamin
 * @property  string $nama
 * @property  string $nik
 * @property  string $nomor_asuransi
 * @property  string $nomor_ktp
 * @property  string $tanggal_lahir
 * @property  string $telepon
 * @property  string $tempat_lahir
 * @property  \App\Models\JenisKelamin jenisKelamin
 * @method static findOrFail($id)
 */

class MstOrang extends BaseModel
{
//     use SoftDeletes;

    protected $table = 'mst_orang';

    public function jenisKelamin() {
        return $this->hasOne(JenisKelamin::class, 'id', 'id_jenis_kelamin');
    }


    protected $fillable = [
        'alamat',
        'email',
        'id',
        'id_jenis_kelamin',
        'nama',
        'nik',
        'nomor_asuransi',
        'tanggal_lahir',
        'no_telepon',
        'tempat_lahir',
    ];

    /**
     * @param  array $params
     * @return  \Illuminate\Database\Eloquent\Builder
     */
    public static function query($params=[])
    {
        $query = parent::query();

        if(@$params['alamat'] != null) {
            $query->where('alamat', @$params['alamat']);
        }

        if(@$params['email'] != null) {
            $query->where('email', @$params['email']);
        }

        if(@$params['handphone'] != null) {
            $query->where('handphone', @$params['handphone']);
        }

        if(@$params['id'] != null) {
            $query->where('id', @$params['id']);
        }

        if(@$params['id_jenis_kelamin'] != null) {
            $query->where('id_jenis_kelamin', @$params['id_jenis_kelamin']);
        }

        if(@$params['nama'] != null) {
            $query->where('nama', @$params['nama']);
        }

        if(@$params['nik'] != null) {
            $query->where('nik', @$params['nik']);
        }

        if(@$params['nomor_asuransi'] != null) {
            $query->where('nomor_asuransi', @$params['nomor_asuransi']);
        }

        if(@$params['nomor_ktp'] != null) {
            $query->where('nomor_ktp', @$params['nomor_ktp']);
        }

        if(@$params['tanggal_lahir'] != null) {
            $query->where('tanggal_lahir', @$params['tanggal_lahir']);
        }

        if(@$params['telepon'] != null) {
            $query->where('telepon', @$params['telepon']);
        }

        if(@$params['tempat_lahir'] != null) {
            $query->where('tempat_lahir', @$params['tempat_lahir']);
        }

        return $query;
    }

    /**
     * @param  array $params
     * @return  MstOrang[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
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
            '/mst-orang/read',
            'id' => $this->id        ]);
    }

    public function getLinkUpdateIcon()
    {
        return Html::a('<i class="fa fa-pencil-alt"></i>', [
            '/mst-orang/update',
            'id' => $this->id        ]);
    }

    public function getLinkDeleteIcon()
    {
        return Html::a('<i class="fa fa-trash"></i>', [
            '/mst-orang/delete/',
            'id' => $this->id        ], [
            'onclick'=>'return confirm(\'Yakin akan menghapus data?\')'
        ]);
    }

    public function getLinkReadButton()
    {
        return Html::a('<i class="fa fa-eye"></i> Lihat', url("mst-orang/read?id=$this->id"),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function getLinkUpdateButton()
    {
        return Html::a('<i class="fa fa-pencil"></i> Ubah', url("mst-orang/update?id=$this->id"),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function getLinkDeleteButton()
    {
        return Html::a('<i class="fa fa-trash"></i> Hapus', url("mst-orang/delete?id=$this->id"),[
            'class' => 'btn btn-success btn-flat',
            'onclick'=>'return confirm("Yakin akan menghapus data?")'
        ]);
    }

    public function getLinkIndexButton()
    {
        return Html::a('<i class="fa fa-list"></i> Index', url('mst-orang/index'),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function dokter()
   {
    return $this->hasMany('App\Models\MstDokter','id_orang','id');
   }

   public function getNamaJenisKelamin()
    {
        return @Referensi::findArrayJenisKelamin()[$this->id_jenis_kelamin];
    }
}
