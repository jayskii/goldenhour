<?php

namespace App\Models;

use App\Components\Html;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property  string $id
 * @property  string $nama
 * @property  string $id_faskes
 * @property  string $id_poli
 * @property  string $id_dokter
 * @property  \App\Models\MstFaskes faskes
 * @property  \App\Models\MstPoli poli
 * @property  \App\Models\MstDokter dokter
 * @method static JanjitemuJadwal findOrFail($id)
 */

class JanjitemuJadwal extends BaseModel
{
    use SoftDeletes;

    protected $table = 'janjitemu_jadwal';

    public function faskes() {
        return $this->hasOne(MstFaskes::class, 'id', 'id_faskes');
    }

    public function poli() {
        return $this->hasOne(MstPoli::class, 'id', 'id_poli');
    }

    public function dokter() {
        return $this->hasOne(MstDokter::class, 'id', 'id_dokter');
    }


    protected $fillable = [
        'id',
        'nama',
        'id_faskes',
        'id_poli',
        'id_dokter',
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

        if(@$params['id_faskes'] != null) {
            $query->where('id_faskes', @$params['id_faskes']);
        }

        if(@$params['id_poli'] != null) {
            $query->where('id_poli', @$params['id_poli']);
        }

        if(@$params['id_dokter'] != null) {
            $query->where('id_dokter', @$params['id_dokter']);
        }

        return $query;
    }

    /**
     * @param  array $params
     * @return  JanjitemuJadwal[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
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
            '/janjitemu-jadwal/read',
            'id' => $this->id        ]);
    }

    public function getLinkUpdateIcon()
    {
        return Html::a('<i class="fa fa-pencil-alt"></i>', [
            '/janjitemu-jadwal/update',
            'id' => $this->id        ]);
    }

    public function getLinkDeleteIcon()
    {
        return Html::a('<i class="fa fa-trash"></i>', [
            '/janjitemu-jadwal/delete/',
            'id' => $this->id        ], [
            'onclick'=>'return confirm(\'Yakin akan menghapus data?\')'
        ]);
    }

    public function getLinkReadButton()
    {
        return Html::a('<i class="fa fa-eye"></i> Lihat', url("janjitemu-jadwal/read?id=$this->id"),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function getLinkUpdateButton()
    {
        return Html::a('<i class="fa fa-pencil-alt"></i> Ubah', url("janjitemu-jadwal/update?id=$this->id"),[
            'class' => 'btn btn-primary btn-flat'
        ]);
    }

    public function getLinkDeleteButton()
    {
        return Html::a('<i class="fa fa-trash"></i> Hapus', url("janjitemu-jadwal/delete?id=$this->id"),[
            'class' => 'btn btn-success btn-flat',
            'onclick'=>'return confirm("Yakin akan menghapus data?")'
        ]);
    }

    public function getLinkIndexButton()
    {
        return Html::a('<i class="fa fa-list"></i> Index', url('janjitemu-jadwal/index'),[
            'class' => 'btn btn-primary btn-flat'
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

    public function manyJadwalRincian()
    {
        return $this->hasMany(JanjitemuJadwalRincian::class,'id_jadwal','id');
    }

    public function getAllJadwalRincian()
    {
        $query = $this->manyJadwalRincian();
        $query->orderBy('id_hari','asc');
        $query->orderBy('jam_mulai','asc');

        return $query->get();
    }
}
