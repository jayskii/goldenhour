<?php

namespace App\Components;

use App\Models\Mitra;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Auth;

class Session extends \Illuminate\Support\Facades\Session
{
    public static function isAdmin()
    {
        if (Session::isGuest()) {
            return false;
        }

        return Auth::user()->id_user_role == 1;
    }

    public static function isFaskes()
    {
        if (Session::isGuest()) {
            return false;
        }

        return Auth::user()->id_user_role == 3;
    }

    public static function isDokter()
    {
        if (Session::isGuest()) {
            return false;
        }

        return Auth::user()->id_user_role == 4;
    }


    public static function getIdFaskes()
    {
        if (Session::isGuest()) {
            return null;
        }

        return Auth::user()->id_faskes;
    }

    public static function isUnit()
    {
        if (Session::isGuest()) {
            return false;
        }

        return Auth::user()->id_user_role == 2;
    }

    public static function isMitra()
    {
        if (Session::isGuest()) {
            return false;
        }

        return Auth::user()->id_user_role == 3;
    }

    public static function isGuest()
    {
        return Auth::guest();
    }

    public static function getIdMitra()
    {
        return Auth::user()->id_mitra;
    }

    public static function getIdUnit()
    {
        return Auth::user()->id_unit;
    }

    public static function getIdUser()
    {
        return Auth::user()->id;
    }

    // public static function getNamaMitra()
    // {
    //     return Mitra::where('id', '=', Auth::user()->id_mitra)->value('nama');
    // }

    // public static function getDiajukan()
    // {
    //     return Pengajuan::where('id_pengajuan_tahap', '=', 2)->get();
    // }
}
