<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MstApiDokterController;
use App\Http\Controllers\Api\MstDokterController;
use App\Http\Controllers\Api\MstPasienController;
use App\Http\Controllers\Api\JanjitemuJanjitemu;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/auth/login', [App\Http\Controllers\Api\AuthController::class,'login']);
Route::post('/auth/register', [App\Http\Controllers\Api\AuthController::class,'register']);
Route::post('/reset-password', [App\Http\Controllers\Api\UserController::class,'resetPassword']);
Route::post('/auth-reset-password', [App\Http\Controllers\Api\UserController::class,'authResetPassword']);

// Route::put('/reset-password/update', [App\Http\Controllers\Api\UserController::class,'update']);
Route::post('/password/email',  [App\Http\Controllers\Api\ForgotPasswordController::class,'sendResetLinkEmail']);
Route::post('/password/reset',  [App\Http\Controllers\Api\ResetPasswordController::class,'reset']);

Route::get('/user/forgot-password',  [App\Http\Controllers\Api\UserController::class,'forgotPassword']);
Route::post('/user/verifikasi-kode-email',  [App\Http\Controllers\Api\UserController::class,'verifikasiKodeEmail']);


//MST Faskes
Route::get('/mst-faskes', [App\Http\Controllers\Api\MstFaskesController::class,'index']);
Route::get('/mst-faskes/index', [App\Http\Controllers\Api\MstFaskesController::class,'index']);

//MST Dokter
Route::get('/mst-dokter', [App\Http\Controllers\Api\MstDokterController::class,'index']);
Route::get('/mst-dokter/janjitemu-tanggal', [App\Http\Controllers\Api\MstDokterController::class,'janjitemuTanggal']);
Route::get('/mst-dokter/janjitemu-jadwal-rincian', [App\Http\Controllers\Api\MstDokterController::class,'janjitemuJadwalRincian']);
Route::get('/mst-dokter/view/{id}', [App\Http\Controllers\Api\MstDokterController::class,'index']);
//MST Pasien
Route::get('/mst-pasien', [App\Http\Controllers\Api\MstPasienController::class,'index']);
Route::get('/mst-pasien/view/{id}', [App\Http\Controllers\Api\MstPasienController::class,'view']);
Route::put('/mst-pasien/update/{id}', [App\Http\Controllers\Api\MstPasienController::class,'update']);
Route::delete('/mst-pasien/delete/{id}', [App\Http\Controllers\Api\MstPasienController::class,'delete']);

Route::get('/janjitemu-janjitemu/tanggal', [App\Http\Controllers\Api\JanjitemuJanjitemuController::class,'tanggal']);
Route::post('/janjitemu-janjitemu/create', [App\Http\Controllers\Api\JanjitemuJanjitemuController::class,'create']);
Route::get('/janjitemu-janjitemu/index', [App\Http\Controllers\Api\JanjitemuJanjitemuController::class,'index']);
Route::get('/janjitemu-janjitemu/view/{id}', [App\Http\Controllers\Api\JanjitemuJanjitemuController::class,'view']);

Route::get('/janjitemu-janjitemu/janji-selanjutnya/{id_pasien}', [App\Http\Controllers\Api\JanjitemuJanjitemuController::class,'janjiSelanjutnya']);


//Riwayat Penyakit Pasien
Route::get('/riwayat-penyakit', [App\Http\Controllers\Api\RiwayatPenyakitController::class,'index']);
Route::get('/riwayat-penyakit/view/{id}', [App\Http\Controllers\Api\RiwayatPenyakitController::class,'view']);
Route::post('/riwayat-penyakit/create', [App\Http\Controllers\Api\RiwayatPenyakitController::class,'create']);
Route::put('/riwayat-penyakit/update/{id}', [App\Http\Controllers\Api\RiwayatPenyakitController::class,'update']);
Route::post('/riwayat-penyakit/delete/{id}', [App\Http\Controllers\Api\RiwayatPenyakitController::class,'delete']);

//Keluarga Pasien
Route::get('/keluarga-pasien', [App\Http\Controllers\Api\KeluargaPasienController::class,'index']);
Route::get('/keluarga-pasien/view/{id}', [App\Http\Controllers\Api\KeluargaPasienController::class,'view']);
Route::post('/keluarga-pasien/create', [App\Http\Controllers\Api\KeluargaPasienController::class,'create']);
Route::put('/keluarga-pasien/update/{id}', [App\Http\Controllers\Api\KeluargaPasienController::class,'update']);
Route::post('/keluarga-pasien/delete/{id}', [App\Http\Controllers\Api\KeluargaPasienController::class,'delete']);



//MSt Poli
//MST Dokter
Route::get('/mst-poli', [App\Http\Controllers\Api\MstPoliController::class,'index']);
Route::get('/mst-poli/view/{id}', [App\Http\Controllers\Api\MstPoliController::class,'index']);


Route::get('/ref-keluhan-utama', [App\Http\Controllers\Api\RefKeluhanUtamaController::class,'index']);
Route::get('ref-hari', [App\Http\Controllers\api\RefHariController::class,'index']);