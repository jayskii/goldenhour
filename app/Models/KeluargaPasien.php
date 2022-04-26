<?php

namespace App\Models;

use App\Components\Html;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property  string $id
 * @property  string $id_pasien
 * @property  string $nama
 * @property  string $status_hubungan
 * @property  string $id_jenis_kelamin
 * @property  string $tanggal_lahir
 * @property  string $id_golongan_darah
 */

class KeluargaPasien extends BaseModel
{
    // use SoftDeletes;

    protected $table = 'keluarga_pasien';


    protected $fillable = [
        'id',
        'id_pasien',
        'nama',
        'status_hubungan',
        'id_jenis_kelamin',
        'tanggal_lahir',
        'id_golongan_darah',
        
    ];

    protected $appends = [
        'nama_kelamin_jenis',
        'nama_golongan_darah',
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

        if(@$params['nama'] != null) {
            $query->where('nama', @$params['nama']);
        }

        if(@$params['status_hubungan'] != null) {
            $query->where('status_hubungan', @$params['status_hubungan']);
        }

        if(@$params['id_jenis_kelamin'] != null) {
            $query->where('id_jenis_kelamin', @$params['id_jenis_kelamin']);
        }

        if(@$params['tanggal_lahir'] != null) {
            $query->where('tanggal_lahir', @$params['tanggal_lahir']);
        }

        if(@$params['id_golongan_darah'] != null) {
            $query->where('id_golongan_darah', @$params['id_golongan_darah']);
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
            '/keluarga-pasien/read',
            'id' => $this->id        ]);
    }

    public function getLinkUpdateIcon()
    {
        return Html::a('<i class="fa fa-pencil-alt"></i>', [
            '/keluarga-pasien/update',
            'id' => $this->id        ]);
    }

    public function getLinkDeleteIcon()
    {
        return Html::a('<i class="fa fa-trash"></i>', [
            '/keluarga-pasien/delete/',
            'id' => $this->id        ], [
            'onclick'=>'return confirm(\'Yakin akan menghapus data?\')'
        ]);
    }

    public function getLinkReadButton()
    {
        return Html::a('<i class="fa fa-eye"></i> Lihat', url("keluarga-pasien/read?id=$this->id"),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function getLinkUpdateButton()
    {
        return Html::a('<i class="fa fa-pencil-alt"></i> Ubah', url("keluarga-pasien/update?id=$this->id"),[
            'class' => 'btn btn-primary btn-flat'
        ]);
    }

    public function getLinkDeleteButton()
    {
        return Html::a('<i class="fa fa-trash"></i> Hapus', url("keluarga-pasien/delete?id=$this->id"),[
            'class' => 'btn btn-primary btn-flat',
            'onclick'=>'return confirm("Yakin akan menghapus data?")'
        ]);
    }

    public function getLinkIndexButton()
    {
        return Html::a('<i class="fa fa-list"></i> Index', url('keluarga-pasien/index'),[
            'class' => 'btn btn-primary btn-flat'
        ]);
    }

    public function setFormTanggalLahir()
    {
        $datetime = \DateTime::createFromFormat('Y-m-d', $this->tanggal_lahir);
        if($datetime == false) {
            return;
        }
        $this->tanggal_lahir = $datetime->format('d-m-Y');
    }

    public function setSaveTanggalLahir()
    {
        $datetime = \DateTime::createFromFormat('d-m-Y', $this->tanggal_lahir);
        if($datetime == false) {
            return;
        }
        $this->tanggal_lahir = $datetime->format('Y-m-d');
    }
    
    public static function findArraySelect()
    {
        $array = [];
        foreach(KeluargaPasien::all() as $data) {
            $array[$data->id] = $data->nama;
        }
        return $array;
    }

    public function kelaminJenis()
    {
        return $this->hasOne(JenisKelamin::class,'id','id_jenis_kelamin');
    }

    public function getNamaKelaminJenisAttribute()
    {
        return @$this->kelaminJenis->nama;
    }

    public function golonganDarah()
    {
        return $this->hasOne(GolonganDarah::class,'id','id_golongan_darah');
    }

    public function getNamaGolonganDarahAttribute()
    {
        return @$this->golonganDarah->nama;
    }

    public function pasien() {
        return $this->hasOne(MstPasien::class, 'id', 'id_pasien');
    }

    public function getNamaPasienAttribute()
    {
        return @$this->pasien;
    }
}
