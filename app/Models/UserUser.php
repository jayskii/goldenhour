<?php

namespace App\Models;

use App\Notifications\PasswordResetNotification;
use Laravel\Passport\HasApiTokens;
use App\Components\Html;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property  string $id
 * @property  string $username
 * @property  string $password
 * @property  string $id_user_role
 * @property  \App\Models\UserRole userRole
 * @method static findOrFail($id)
 */
class UserUser extends Authenticatable implements MustVerifyEmail
{
    use SoftDeletes, HasFactory, Notifiable;

    protected $table = 'user_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'kode_verifikasi_email',
        'username',
        'password',
        'id_pasien',
        'id_faskes',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pasien()
    {
        return $this->hasOne(MstPasien::class,'id','id_pasien');
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

        if(@$params['username'] != null) {
            $query->where('username', @$params['username']);
        }

        if(@$params['password'] != null) {
            $query->where('password', @$params['password']);
        }

        if(@$params['id_user_role'] != null) {
            $query->where('id_user_role', @$params['id_user_role']);
        }

        return $query;
    }

    /**
     * @param  array $params
     * @return  UserUser[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
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
            '/user-user/read',
            'id' => $this->id        ]);
    }

    public function getLinkUpdateIcon()
    {
        return Html::a('<i class="fa fa-pencil-alt"></i>', [
            '/user-user/update',
            'id' => $this->id
        ]);
    }

    public function getLinkDeleteIcon()
    {
        return Html::a('<i class="fa fa-trash"></i>', [
            '/user-user/delete/',
            'id' => $this->id        ], [
            'onclick'=>'return confirm(\'Yakin akan menghapus data?\')'
        ]);
    }

    public function getLinkReadButton()
    {
        return Html::a('<i class="fa fa-eye"></i> Lihat', url("user-user/read?id=$this->id"),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function getLinkUpdateButton()
    {
        return Html::a('<i class="fa fa-pencil"></i> Ubah', url("user-user/update?id=$this->id"),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function getLinkDeleteButton()
    {
        return Html::a('<i class="fa fa-trash"></i> Hapus', url("user-user/delete?id=$this->id"),[
            'class' => 'btn btn-success btn-flat',
            'onclick'=>'return confirm("Yakin akan menghapus data?")'
        ]);
    }

    public function getLinkIndexButton()
    {
        return Html::a('<i class="fa fa-list"></i> Index', url('user-user/index'),[
            'class' => 'btn btn-success btn-flat'
        ]);
    }

    public function userRole() {
        return $this->hasOne(UserRole::class, 'id', 'id_user_role');
    }

   
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token));
    }
}
