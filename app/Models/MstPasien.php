<?php

namespace App\Models;

use App\Components\Html;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User;

/**
 * @property  string $id
 * @property  string $nama
 * @property  string $nik
 * @property  string $id_jenis_kelamin
 * @property  string $id_golongan_darah
 * @property  string $tempat_lahir
 * @property  string $tanggal_lahir
 * @property  string $telepon
 * @property  string $handphone
 * @property  string $email
 * @property  string $nomor_asuransi
 * @property  string $alamat
 * @property  string $nomor_ktp
 * @property  string $created_at
 * @property  string $updated_at
 * @property  string $deleted_at
 * @property  \App\Models\JenisKelamin jenisKelamin
 *  * @property  \App\Models\GolonganDarah golonganDarah

 * @method static findOrFail($id)
 */

class MstPasien extends BaseModel
{
    // use SoftDeletes;

    protected $table = 'mst_pasien';

    // public function jenisKelamin() {
    //     return $this->hasOne(JenisKelamin::class, 'id', 'id_jenis_kelamin');
    // }


    protected $fillable = [
        'id',
        'id_riwayat_penyakit',
        'nama',
        'nik',
        'id_jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'telepon',
        'handphone',
        'email',
        'nomor_asuransi',
        'alamat',
        'nomor_ktp',
        'id_golongan_darah',
        'foto',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'url_foto',
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
        if(@$params['id_riwayat_penyakit'] != null) {
            $query->where('id_riwayat_penyakit', @$params['id_riwayat_penyakit']);
        }

        if(@$params['nama'] != null) {
            $query->where('nama', @$params['nama']);
        }

        
        if(@$params['nik'] != null) {
            $query->where('nik', @$params['nik']);
        }

        if(@$params['id_jenis_kelamin'] != null) {
            $query->where('id_jenis_kelamin', @$params['id_jenis_kelamin']);
        }
        
        // if(@$params['id_golongan_darah'] != null) {
        //     $query->where('id_golongan_darah', @$params['id_golongan_darah']);
        // }

        if(@$params['tempat_lahir'] != null) {
            $query->where('tempat_lahir', @$params['tempat_lahir']);
        }

        if(@$params['tanggal_lahir'] != null) {
            $query->where('tanggal_lahir', @$params['tanggal_lahir']);
        }

        if(@$params['telepon'] != null) {
            $query->where('telepon', @$params['telepon']);
        }

        if(@$params['handphone'] != null) {
            $query->where('handphone', @$params['handphone']);
        }

        if(@$params['email'] != null) {
            $query->where('email', @$params['email']);
        }

        if(@$params['nomor_asuransi'] != null) {
            $query->where('nomor_asuransi', @$params['nomor_asuransi']);
        }

        if(@$params['alamat'] != null) {
            $query->where('alamat', @$params['alamat']);
        }

        if(@$params['nomor_ktp'] != null) {
            $query->where('nomor_ktp', @$params['nomor_ktp']);
        }

        if(@$params['created_at'] != null) {
            $query->where('created_at', @$params['created_at']);
        }

        if(@$params['updated_at'] != null) {
            $query->where('updated_at', @$params['updated_at']);
        }

        if(@$params['deleted_at'] != null) {
            $query->where('deleted_at', @$params['deleted_at']);
        }

        return $query;
    }

    /**
     * @param  array $params
     * @return  MstPasien[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
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


    public function getUrlFotoAttribute()
    {
        if(is_file(public_path('uploads/foto_pasien/' . $this->foto)) == false){
            return asset('images/image-not-found.png'); 
        }

        return asset('/uploads/foto_pasien/'.$this->foto);

    }

    public function getLinkReadIcon()
    {
        return Html::a('<i class="fa fa-eye"></i>', [
            '/mst-pasien/read',
            'id' => $this->id        ]);
    }

    public function getLinkUpdateIcon()
    {
        return Html::a('<i class="fa fa-pencil-alt"></i>', [
            '/mst-pasien/update',
            'id' => $this->id        ]);
    }

    public function getLinkDeleteIcon()
    {
        return Html::a('<i class="fa fa-trash"></i>', [
            '/mst-pasien/delete/',
            'id' => $this->id        ], [
            'onclick'=>'return confirm(\'Yakin akan menghapus data?\')'
        ]);
    }

    public function getLinkReadButton()
    {
        return Html::a('<i class="fa fa-eye"></i> Lihat', url("mst-pasien/read?id=$this->id"),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function getLinkUpdateButton()
    {
        return Html::a('<i class="fa fa-pencil"></i> Ubah', url("mst-pasien/update?id=$this->id"),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function getLinkDeleteButton()
    {
        return Html::a('<i class="fa fa-trash"></i> Hapus', url("mst-pasien/delete?id=$this->id"),[
            'class' => 'btn btn-success btn-flat',
            'onclick'=>'return confirm("Yakin akan menghapus data?")'
        ]);
    }

    public function getLinkIndexButton()
    {
        return Html::a('<i class="fa fa-list"></i> Index', url('mst-pasien/index'),[
            'class' => 'btn btn-success btn-flat'
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

    public function user()
    {
        return $this->hasOne(UserUser::class,'id','id_user');
    }

    public function findOrCreateUser()
    {
        if($this->user === null) {
            $user = new User();
        }
    }

    public static function findArraySelect()
    {
        $array = [];
        foreach(MstPasien::all() as $data) {
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

    public function riwayatPenyakit()
    {
        return $this->hasMany(RiwayatPenyakit::class,'id_pasien','id');
    }
    
    public function keluargaPasien()
    {
        return $this->hasMany(KeluargaPasien::class,'id_pasien','id');
    }

    // public function getNamaRiwayatAttribute()
    // {
    //     return @$this->riwayat;
    // }


}
