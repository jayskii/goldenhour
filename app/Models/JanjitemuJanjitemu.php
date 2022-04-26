<?php

namespace App\Models;

use App\Components\Html;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property  string $id
 * @property  string $nama
 * @property  string $id_pasien
 * @property  string $id_faskes
 * @property  string $id_poli
 * @property  string $id_dokter
 * @property  string $keluhan_utama
 * @property  string $keluhan_utama
 * @property  string $waktu_tunggu_mulai
 * @property  string $waktu_tunggu_selesai
 * @property  string $waktu_tunggu_durasi
 * @property  string $waktu_janjitemu_mulai
 * @property  string $waktu_janjitemu_selesai
 * @property  string $waktu_janjitemu_durasi
 * @property  string $created_at
 * @property  string $updated_at
 * @property  string $deleted_at
 * @property  \App\Models\MstPasien pasien
 * @property  \App\Models\MstFaskes faskes
 * @property  \App\Models\MstPoli poli
 * @property  \App\Models\MstDokter dokter
 * @method static findOrFail($id)
 */

class JanjitemuJanjitemu extends BaseModel
{
    use SoftDeletes;

    protected $table = 'janjitemu_janjitemu';

    protected $fillable = [
        'id',
        'nama',
        'id_pasien',
        'id_faskes',
        'id_poli',
        'id_dokter',
        'keluhan_utama',
        'id_keluhan_utama',
        'waktu_janjitemu_rencana',
        'waktu_tunggu_mulai',
        'waktu_tunggu_selesai',
        'waktu_tunggu_durasi',
        'waktu_konsultasi_mulai',
        'waktu_konsultasi_selesai',
        'waktu_konsultasi_durasi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'nama_poli',
        'nama_dokter',
        'nama_faskes',
        'nama_pasien',
        'url_foto',
        'nama_spesialisasi',
        'nama_keluhan_utama',
       
    ];

    public function pasien() {
        return $this->hasOne(MstPasien::class, 'id', 'id_pasien');
    }

    public function faskes() {
        return $this->hasOne(MstFaskes::class, 'id', 'id_faskes');
    }

    public function poli() {
        return $this->hasOne(MstPoli::class, 'id', 'id_poli');
    }

    public function dokter() {
        return $this->hasOne(MstDokter::class, 'id', 'id_dokter');
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

        if(@$params['id_pasien'] != null) {
            $query->where('id_pasien', @$params['id_pasien']);
        }

        if(@$params['id_faskes'] != null) {
            $query->where('id_faskes', @$params['id_faskes']);
        }

        if(@$params['id_poli'] != null) {
            $query->where('id_poli', @$params['id_poli']);
        }

        if(@$params['id_dokter'] != null) {
            $query->where('id_dokter', @$params['id_dokter']);
        }

        if(@$params['keluhan_utama'] != null) {
            $query->where('keluhan_utama', @$params['keluhan_utama']);
        }

        if(@$params['id_keluhan_utama'] != null) {
            $query->where('id_keluhan_utama', @$params['id_keluhan_utama']);
        }

        if(@$params['waktu_tunggu_mulai'] != null) {
            $query->where('waktu_tunggu_mulai', @$params['waktu_tunggu_mulai']);
        }

        if(@$params['waktu_tunggu_selesai'] != null) {
            $query->where('waktu_tunggu_selesai', @$params['waktu_tunggu_selesai']);
        }

        if(@$params['waktu_tunggu_durasi'] != null) {
            $query->where('waktu_tunggu_durasi', @$params['waktu_tunggu_durasi']);
        }

        if(@$params['waktu_janjitemu_mulai'] != null) {
            $query->where('waktu_janjitemu_mulai', @$params['waktu_janjitemu_mulai']);
        }

        if(@$params['waktu_janjitemu_selesai'] != null) {
            $query->where('waktu_janjitemu_selesai', @$params['waktu_janjitemu_selesai']);
        }

        if(@$params['waktu_janjitemu_durasi'] != null) {
            $query->where('waktu_janjitemu_durasi', @$params['waktu_janjitemu_durasi']);
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
     * @return  JanjitemuJanjitemu[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
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
            '/janjitemu-janjitemu/read',
            'id' => $this->id        ]);
    }

    public function getLinkUpdateIcon()
    {
        return Html::a('<i class="fa fa-pencil-alt"></i>', [
            '/janjitemu-janjitemu/update',
            'id' => $this->id        ]);
    }

    public function getLinkDeleteIcon()
    {
        return Html::a('<i class="fa fa-trash"></i>', [
            '/janjitemu-janjitemu/delete/',
            'id' => $this->id        ], [
            'onclick'=>'return confirm(\'Yakin akan menghapus data?\')'
        ]);
    }

    public function getLinkReadButton()
    {
        return Html::a('<i class="fa fa-eye"></i> Lihat', url("janjitemu-janjitemu/read?id=$this->id"),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function getLinkUpdateButton()
    {
        return Html::a('<i class="fa fa-pencil"></i> Ubah', url("janjitemu-janjitemu/update?id=$this->id"),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function getLinkDeleteButton()
    {
        return Html::a('<i class="fa fa-trash"></i> Hapus', url("janjitemu-janjitemu/delete?id=$this->id"),[
            'class' => 'btn btn-success btn-flat',
            'onclick'=>'return confirm("Yakin akan menghapus data?")'
        ]);
    }

    public function getLinkIndexButton()
    {
        return Html::a('<i class="fa fa-list"></i> Index', url('janjitemu-janjitemu/index'),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function setIdFaskes()
    {
        $this->id_faskes = @$this->dokter->id_faskes;
    }

    public function setIdPoli()
    {
        $this->id_poli = @$this->dokter->poli->id;
    }

    public function getNamaPoliAttribute()
    {
        return @$this->poli->nama;
    }

    public function getNamaDokterAttribute()
    {
        return @$this->dokter->nama;
    }

    public function getNamaSpesialisasiAttribute()
    {
        return @$this->dokter->nama_spesialisasi;
    }

    public function getUrlFotoAttribute()
    {
        return @$this->dokter->url_foto;
    }

  

    public function getNamaFaskesAttribute()
    {
        return @$this->faskes->nama;
    }

    public function getNamaPasienAttribute()
    {
        return @$this->pasien->nama;
    }


    public function keluhanUtama()
    {
        return $this->hasOne(RefKeluhanUtama::class,'id','id_keluhan_utama');
    }

    public function getNamaKeluhanUtamaAttribute()
    {
        return @$this->keluhanUtama->nama;
    }

    
}
