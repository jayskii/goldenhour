<?php

namespace App\Models;

use App\Components\Html;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property  string $id
 * @property  string $nama
 * @property  string $id_jadwal
 * @property  string $id_hari
 * @property  string $jam_mulai
 * @property  string $jam_selesai
 * @property  \App\Models\JanjitemuJadwal jadwal
 * @property  \App\Models\RefHari hari
 * @method static findOrFail($id)
 */

class JanjitemuJadwalRincian extends BaseModel
{
    use SoftDeletes;

    protected $table = 'janjitemu_jadwal_rincian';

    protected $fillable = [
        'id',
        'nama',
        'id_jadwal',
        'id_hari',
        'jam_mulai',
        'jam_selesai',
        'durasi_konsultasi',
    ];

    public function jadwal() {
        return $this->hasOne(JanjitemuJadwal::class, 'id', 'id_jadwal');
    }

    public function hari() {
        return $this->hasOne(RefHari::class, 'id', 'id_hari');
    }

    /**
     * @param  array $params
     * @return  \Illuminate\Database\Eloquent\Builder
     */
    public static function query($params=[])
    {
        $query = parent::query();

        if(@$params['id_dokter'] !== null) {
            $query->join('janjitemu_jadwal','janjitemu_jadwal.id','=','janjitemu_jadwal_rincian.id_jadwal');
            $query->where('janjitemu_jadwal.id_dokter','=',$params['id_dokter']);
        }

        if(@$params['id'] != null) {
            $query->where('id', @$params['id']);
        }

        if(@$params['id_dokter'] != null) {
            $query->where('id_dokter', @$params['id_dokter']);
        }

        if(@$params['nama'] != null) {
            $query->where('nama', @$params['nama']);
        }

        if(@$params['id_jadwal'] != null) {
            $query->where('id_jadwal', @$params['id_jadwal']);
        }

        if(@$params['id_hari'] != null) {
            $query->where('id_hari', @$params['id_hari']);
        }

        if(@$params['jam_mulai'] != null) {
            $query->where('jam_mulai', @$params['jam_mulai']);
        }

        if(@$params['jam_selesai'] != null) {
            $query->where('jam_selesai', @$params['jam_selesai']);
        }

        return $query;
    }

    /**
     * @param  array $params
     * @return  JanjitemuJadwalRincian[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
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
            '/janjitemu-jadwal-rincian/read',
            'id' => $this->id        ]);
    }

    public function getLinkUpdateIcon()
    {
        return Html::a('<i class="fa fa-pencil-alt"></i>', [
            '/janjitemu-jadwal-rincian/update',
            'id' => $this->id        ]);
    }

    public function getLinkDeleteIcon()
    {
        return Html::a('<i class="fa fa-trash"></i>', [
            '/janjitemu-jadwal-rincian/delete/',
            'id' => $this->id        ], [
            'onclick'=>'return confirm(\'Yakin akan menghapus data?\')'
        ]);
    }

    public function getLinkReadButton()
    {
        return Html::a('<i class="fa fa-eye"></i> Lihat', url("janjitemu-jadwal-rincian/read?id=$this->id"),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function getLinkUpdateButton()
    {
        return Html::a('<i class="fa fa-pencil"></i> Ubah', url("janjitemu-jadwal-rincian/update?id=$this->id"),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function getLinkDeleteButton()
    {
        return Html::a('<i class="fa fa-trash"></i> Hapus', url("janjitemu-jadwal-rincian/delete?id=$this->id"),[
            'class' => 'btn btn-success btn-flat',
            'onclick'=>'return confirm("Yakin akan menghapus data?")'
        ]);
    }

    public function getLinkIndexButton()
    {
        return Html::a('<i class="fa fa-list"></i> Index', url('janjitemu-jadwal-rincian/index'),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function getWaktuJanjiTemuRencana($params = [])
    {
        $tanggal = @$params['tanggal'];

        $query = JanjitemuJanjitemu::query([
            'id_dokter' => $this->id_dokter
        ]);

        $waktuMulai = $tanggal.' '.$this->jam_mulai;
        $waktuSelesai = $tanggal.' '.$this->jam_selesai;

        $query->where('waktu_janjitemu_rencana','>=',$waktuMulai);
        $query->where('waktu_janjitemu_rencana','<=',$waktuSelesai);
        $query->orderBy('waktu_janjitemu_rencana','desc');
        $model = $query->first();

        if($model === null) {
            return $waktuMulai;
        }

        $datetime = \DateTime::createFromFormat('Y-m-d H:i:s', $model->waktu_janjitemu_rencana);
        $datetime->modify('+15 minute');
        return $datetime->format('Y-m-d H:i:00');

    }
}
