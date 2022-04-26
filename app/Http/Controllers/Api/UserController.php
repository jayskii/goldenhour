<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPasswordMail;
use Illuminate\Http\Request;

use App\Models\UserUser;
use App\Models\MstPasien;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
  
    public function resetPassword(Request $request)
    {

        // $mstPasien = MstPasien::find($request->id_mstpasien);

        $user = UserUser::where('id_pasien', '=', $request->id_pasien)->first();
        // $user = UserUser::where('email', '=', $request->email)->first();

        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(
            ['data' => $user],
            200
        );

     }

     public function authResetPassword(Request $request)
    {

        // $mstPasien = MstPasien::find($request->id_mstpasien);

        // $user = UserUser::where('id_pasien', '=', $request->id_pasien)->first();
        $user = UserUser::where('email', '=', $request->email)->first();
        $user->verifikasiKodeEmail = null;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(
            ['data' => $user],
            200
        );

     }

     public function forgotPassword(Request $request)
     {
        $email = $request->get('email');
        $model = UserUser::where('email', '=', $email)->first();
        if ($model == null) {
            return response('Email tidak di temukan', 403);
        }
        $kode = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);

        $model->kode_verifikasi_email = $kode;

        $model->save();

        Mail::to($email)->send(new ForgotPasswordMail($model));
 
        if (Mail::failures()) {
             return response('Sorry! Please try again latter', 403);
        }else{
            return response('Great! Successfully send in your mail', 200);
        }
     }

     public function verifikasiKodeEmail(Request $request)
     {
        $email = $request->post('email');
        $kode = $request->post('kode_verifikasi_email');
        $model = UserUser::where('email', '=', $email)->first();
        if ($model == null) {
            return response('Email tidak di temukan', 403);
        }

    
        return response([
            'status'=>$model->kode_verifikasi_email == $kode,
        ], 200);


     }
}
