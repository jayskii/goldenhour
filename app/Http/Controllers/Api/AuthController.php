<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserUser;
use App\Models\MstPasien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $response = null;
        $statusCode = 200;

        $username = trim($request->post('username'));
        $password = trim($request->post('password'));

        $user = UserUser::where([
            'username' => $username
        ])->first();

        if ($user == null) {
            $response = [
                'login' => false,
                'message' => 'Username atau password salah'
            ];
            $statusCode = 400;
        }

        $attempt = Auth::attempt([
            'username' => $username,
            'password' => $password
        ]);
        if ($attempt == true) {
            $response = [
                'login' => true,
                'pesan' => 'Login Berhasil',
                'id_pasien' => $user->id_pasien,
                'nama_pasien' => @$user->pasien->nama,
                'alamat_pasien' => @$user->pasien->alamat,
            ];
            $statusCode = 200;
        } else {
            $response = [
                'login' => false,
                'message' => 'Username atau password salah'
            ];
            $statusCode = 400;
        }

        return response()->json($response, $statusCode);
    }

    public function register(Request $request)
    {
        $model = new MstPasien();

        $post = $request->all();

        if ($model->loadAttributes($post)) {
            if ($model->save()) {
                $user = new UserUser();
                $user->username = $request->username;
                $user->password = Hash::make($request->password);
                $user->id_user_role = 2;
                $user->id_pasien = $model->id;
                $user->save();

                if ($request->post('foto_encode') != null) {
                    $model->foto = date('YmdHis') . '.jpg';

                    $foto_decode = base64_decode($request->post('foto_encode'));
                    file_put_contents('uploads/foto_pasien/' . $model->foto, $foto_decode);
                    $model->save();
                }

                return response()->json([
                    'status' => true,
                    'message' => 'Registrasi berhasil',
                ], 200);
            }
        }

        return response()->json([
            'status' => false,
            'message' => 'Registrasi gagal',
        ], 400);
    }
}
