<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImportExcelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dokumen;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

// AUTH
Route::get('/auth/login',[AuthController::class,'login'])->middleware('guest')->name('login');
Route::post('/auth/login-process',[AuthController::class,'loginProcess']);
Route::post('/auth/logout',[AuthController::class,'logout'])->middleware('auth')->name('logout');

Route::get('/dashboard/index', [App\Http\Controllers\DashboardController::class,'index']);
Route::get('/dashboard/index-faskes', [App\Http\Controllers\DashboardController::class,'indexFaskes']);
Route::get('/dashboard/index-dokter', [App\Http\Controllers\DashboardController::class,'indexDokter']);


Route::get('/gii/generate', [App\Http\Controllers\GiiController::class,'generate']);
Route::get('/gii/model', [App\Http\Controllers\GiiController::class,'model']);
Route::get('/gii/controller', [App\Http\Controllers\GiiController::class,'controller']);
Route::get('/gii/index', [App\Http\Controllers\GiiController::class,'index']);
Route::get('/gii/read', [App\Http\Controllers\GiiController::class,'read']);
Route::get('/gii/create', [App\Http\Controllers\GiiController::class,'create']);
Route::get('/gii/update', [App\Http\Controllers\GiiController::class,'update']);
Route::get('/gii/form', [App\Http\Controllers\GiiController::class,'form']);
Route::get('/gii/route', [App\Http\Controllers\GiiController::class,'route']);

Route::get('/ref-faskes-jenis', [App\Http\Controllers\RefFaskesJenisController::class,'index']);
Route::get('/ref-faskes-jenis/index', [App\Http\Controllers\RefFaskesJenisController::class,'index']);
Route::get('/ref-faskes-jenis/read', [App\Http\Controllers\RefFaskesJenisController::class,'read']);
Route::get('/ref-faskes-jenis/create', [App\Http\Controllers\RefFaskesJenisController::class,'create']);
Route::post('/ref-faskes-jenis/create', [App\Http\Controllers\RefFaskesJenisController::class,'create']);
Route::get('/ref-faskes-jenis/update', [App\Http\Controllers\RefFaskesJenisController::class,'update']);
Route::post('/ref-faskes-jenis/update', [App\Http\Controllers\RefFaskesJenisController::class,'update']);
Route::get('/ref-faskes-jenis/delete', [App\Http\Controllers\RefFaskesJenisController::class,'delete']);

Route::get('/ref-hari', [App\Http\Controllers\RefHariController::class,'index']);
Route::get('/ref-hari/index', [App\Http\Controllers\RefHariController::class,'index']);
Route::get('/ref-hari/read', [App\Http\Controllers\RefHariController::class,'read']);
Route::get('/ref-hari/create', [App\Http\Controllers\RefHariController::class,'create']);
Route::post('/ref-hari/create', [App\Http\Controllers\RefHariController::class,'create']);
Route::get('/ref-hari/update', [App\Http\Controllers\RefHariController::class,'update']);
Route::post('/ref-hari/update', [App\Http\Controllers\RefHariController::class,'update']);
Route::get('/ref-hari/delete', [App\Http\Controllers\RefHariController::class,'delete']);

Route::get('/ref-kabkota', [App\Http\Controllers\RefKabkotaController::class,'index']);
Route::get('/ref-kabkota/index', [App\Http\Controllers\RefKabkotaController::class,'index']);
Route::get('/ref-kabkota/read', [App\Http\Controllers\RefKabkotaController::class,'read']);
Route::get('/ref-kabkota/create', [App\Http\Controllers\RefKabkotaController::class,'create']);
Route::post('/ref-kabkota/create', [App\Http\Controllers\RefKabkotaController::class,'create']);
Route::get('/ref-kabkota/update', [App\Http\Controllers\RefKabkotaController::class,'update']);
Route::post('/ref-kabkota/update', [App\Http\Controllers\RefKabkotaController::class,'update']);
Route::get('/ref-kabkota/delete', [App\Http\Controllers\RefKabkotaController::class,'delete']);

Route::get('/ref-kecamatan', [App\Http\Controllers\RefKecamatanController::class,'index']);
Route::get('/ref-kecamatan/index', [App\Http\Controllers\RefKecamatanController::class,'index']);
Route::get('/ref-kecamatan/read', [App\Http\Controllers\RefKecamatanController::class,'read']);
Route::get('/ref-kecamatan/create', [App\Http\Controllers\RefKecamatanController::class,'create']);
Route::post('/ref-kecamatan/create', [App\Http\Controllers\RefKecamatanController::class,'create']);
Route::get('/ref-kecamatan/update', [App\Http\Controllers\RefKecamatanController::class,'update']);
Route::post('/ref-kecamatan/update', [App\Http\Controllers\RefKecamatanController::class,'update']);
Route::get('/ref-kecamatan/delete', [App\Http\Controllers\RefKecamatanController::class,'delete']);

Route::get('/ref-provinsi', [App\Http\Controllers\RefProvinsiController::class,'index']);
Route::get('/ref-provinsi/index', [App\Http\Controllers\RefProvinsiController::class,'index']);
Route::get('/ref-provinsi/read', [App\Http\Controllers\RefProvinsiController::class,'read']);
Route::get('/ref-provinsi/create', [App\Http\Controllers\RefProvinsiController::class,'create']);
Route::post('/ref-provinsi/create', [App\Http\Controllers\RefProvinsiController::class,'create']);
Route::get('/ref-provinsi/update', [App\Http\Controllers\RefProvinsiController::class,'update']);
Route::post('/ref-provinsi/update', [App\Http\Controllers\RefProvinsiController::class,'update']);
Route::get('/ref-provinsi/delete', [App\Http\Controllers\RefProvinsiController::class,'delete']);

//MST Orang
Route::get('/mst-orang', [App\Http\Controllers\MstOrangController::class,'index']);
Route::get('/mst-orang/index', [App\Http\Controllers\MstOrangController::class,'index']);
Route::get('/mst-orang/read', [App\Http\Controllers\MstOrangController::class,'read']);
Route::get('/mst-orang/create', [App\Http\Controllers\MstOrangController::class,'create']);
Route::post('/mst-orang/create', [App\Http\Controllers\MstOrangController::class,'create']);
Route::get('/mst-orang/update', [App\Http\Controllers\MstOrangController::class,'update']);
Route::post('/mst-orang/update', [App\Http\Controllers\MstOrangController::class,'update']);
Route::get('/mst-orang/delete', [App\Http\Controllers\MstOrangController::class,'delete']);

//MST Dokter
Route::get('/mst-dokter', [App\Http\Controllers\MstDokterController::class,'index']);
Route::get('/mst-dokter/index', [App\Http\Controllers\MstDokterController::class,'index']);
Route::get('/mst-dokter/read', [App\Http\Controllers\MstDokterController::class,'read']);
Route::get('/mst-dokter/create', [App\Http\Controllers\MstDokterController::class,'create']);
Route::post('/mst-dokter/create', [App\Http\Controllers\MstDokterController::class,'create']);
Route::get('/mst-dokter/update', [App\Http\Controllers\MstDokterController::class,'update']);
Route::post('/mst-dokter/update', [App\Http\Controllers\MstDokterController::class,'update']);
Route::get('/mst-dokter/delete', [App\Http\Controllers\MstDokterController::class,'delete']);

//MST Faskes
Route::get('/mst-faskes', [App\Http\Controllers\MstFaskesController::class,'index']);
Route::get('/mst-faskes/index', [App\Http\Controllers\MstFaskesController::class,'index']);
Route::get('/mst-faskes/read', [App\Http\Controllers\MstFaskesController::class,'read']);
Route::get('/mst-faskes/create', [App\Http\Controllers\MstFaskesController::class,'create']);
Route::post('/mst-faskes/create', [App\Http\Controllers\MstFaskesController::class,'create']);
Route::get('/mst-faskes/update', [App\Http\Controllers\MstFaskesController::class,'update']);
Route::post('/mst-faskes/update', [App\Http\Controllers\MstFaskesController::class,'update']);
Route::get('/mst-faskes/delete', [App\Http\Controllers\MstFaskesController::class,'delete']);

//MST Pasien
Route::get('/mst-pasien', [App\Http\Controllers\MstPasienController::class,'index']);
Route::get('/mst-pasien/index', [App\Http\Controllers\MstPasienController::class,'index']);
Route::get('/mst-pasien/read', [App\Http\Controllers\MstPasienController::class,'read']);
Route::get('/mst-pasien/create', [App\Http\Controllers\MstPasienController::class,'create']);
Route::post('/mst-pasien/create', [App\Http\Controllers\MstPasienController::class,'create']);
Route::get('/mst-pasien/update', [App\Http\Controllers\MstPasienController::class,'update']);
Route::post('/mst-pasien/update', [App\Http\Controllers\MstPasienController::class,'update']);
Route::get('/mst-pasien/delete', [App\Http\Controllers\MstPasienController::class,'delete']);

//MST Poli
Route::get('/mst-poli', [App\Http\Controllers\MstPoliController::class,'index']);
Route::get('/mst-poli/index', [App\Http\Controllers\MstPoliController::class,'index']);
Route::get('/mst-poli/read', [App\Http\Controllers\MstPoliController::class,'read']);
Route::get('/mst-poli/create', [App\Http\Controllers\MstPoliController::class,'create']);
Route::post('/mst-poli/create', [App\Http\Controllers\MstPoliController::class,'create']);
Route::get('/mst-poli/update', [App\Http\Controllers\MstPoliController::class,'update']);
Route::post('/mst-poli/update', [App\Http\Controllers\MstPoliController::class,'update']);
Route::get('/mst-poli/delete', [App\Http\Controllers\MstPoliController::class,'delete']);

Route::get('/mst-spesialisasi', [App\Http\Controllers\MstSpesialisasiController::class,'index']);
Route::get('/mst-spesialisasi/index', [App\Http\Controllers\MstSpesialisasiController::class,'index']);
Route::get('/mst-spesialisasi/read', [App\Http\Controllers\MstSpesialisasiController::class,'read']);
Route::get('/mst-spesialisasi/create', [App\Http\Controllers\MstSpesialisasiController::class,'create']);
Route::post('/mst-spesialisasi/create', [App\Http\Controllers\MstSpesialisasiController::class,'create']);
Route::get('/mst-spesialisasi/update', [App\Http\Controllers\MstSpesialisasiController::class,'update']);
Route::post('/mst-spesialisasi/update', [App\Http\Controllers\MstSpesialisasiController::class,'update']);
Route::get('/mst-spesialisasi/delete', [App\Http\Controllers\MstSpesialisasiController::class,'delete']);

//Janji Temu Jadwal
Route::get('/janjitemu-jadwal', [App\Http\Controllers\JanjitemuJadwalController::class,'index']);
Route::get('/janjitemu-jadwal/index', [App\Http\Controllers\JanjitemuJadwalController::class,'index']);
Route::get('/janjitemu-jadwal/read', [App\Http\Controllers\JanjitemuJadwalController::class,'read']);
Route::get('/janjitemu-jadwal/create', [App\Http\Controllers\JanjitemuJadwalController::class,'create']);
Route::post('/janjitemu-jadwal/create', [App\Http\Controllers\JanjitemuJadwalController::class,'create']);
Route::get('/janjitemu-jadwal/update', [App\Http\Controllers\JanjitemuJadwalController::class,'update']);
Route::post('/janjitemu-jadwal/update', [App\Http\Controllers\JanjitemuJadwalController::class,'update']);
Route::get('/janjitemu-jadwal/delete', [App\Http\Controllers\JanjitemuJadwalController::class,'delete']);

//Janji Temu Jadwal Rincian
Route::get('/janjitemu-jadwal-rincian', [App\Http\Controllers\JanjitemuJadwalRincianController::class,'index']);
Route::get('/janjitemu-jadwal-rincian/index', [App\Http\Controllers\JanjitemuJadwalRincianController::class,'index']);
Route::get('/janjitemu-jadwal-rincian/read', [App\Http\Controllers\JanjitemuJadwalRincianController::class,'read']);
Route::get('/janjitemu-jadwal-rincian/create', [App\Http\Controllers\JanjitemuJadwalRincianController::class,'create']);
Route::post('/janjitemu-jadwal-rincian/create', [App\Http\Controllers\JanjitemuJadwalRincianController::class,'create']);
Route::get('/janjitemu-jadwal-rincian/update', [App\Http\Controllers\JanjitemuJadwalRincianController::class,'update']);
Route::post('/janjitemu-jadwal-rincian/update', [App\Http\Controllers\JanjitemuJadwalRincianController::class,'update']);
Route::get('/janjitemu-jadwal-rincian/delete', [App\Http\Controllers\JanjitemuJadwalRincianController::class,'delete']);

//Janji Temu Jadwal Rincian
Route::get('/janjitemu-janjitemu', [App\Http\Controllers\JanjitemuJanjitemuController::class,'index']);
Route::get('/janjitemu-janjitemu/index', [App\Http\Controllers\JanjitemuJanjitemuController::class,'index']);
Route::get('/janjitemu-janjitemu/read', [App\Http\Controllers\JanjitemuJanjitemuController::class,'read']);
Route::get('/janjitemu-janjitemu/create', [App\Http\Controllers\JanjitemuJanjitemuController::class,'create']);
Route::post('/janjitemu-janjitemu/create', [App\Http\Controllers\JanjitemuJanjitemuController::class,'create']);
Route::get('/janjitemu-janjitemu/create-by-jadwal', [App\Http\Controllers\JanjitemuJanjitemuController::class,'createByJadwal']);
Route::post('/janjitemu-janjitemu/create-by-jadwal', [App\Http\Controllers\JanjitemuJanjitemuController::class,'createByJadwal']);
Route::get('/janjitemu-janjitemu/update', [App\Http\Controllers\JanjitemuJanjitemuController::class,'update']);
Route::post('/janjitemu-janjitemu/update', [App\Http\Controllers\JanjitemuJanjitemuController::class,'update']);
Route::get('/janjitemu-janjitemu/delete', [App\Http\Controllers\JanjitemuJanjitemuController::class,'delete']);

Route::get('/user-role', [App\Http\Controllers\UserRoleController::class,'index']);
Route::get('/user-role/index', [App\Http\Controllers\UserRoleController::class,'index']);
Route::get('/user-role/read', [App\Http\Controllers\UserRoleController::class,'read']);
Route::get('/user-role/create', [App\Http\Controllers\UserRoleController::class,'create']);
Route::post('/user-role/create', [App\Http\Controllers\UserRoleController::class,'create']);
Route::get('/user-role/update', [App\Http\Controllers\UserRoleController::class,'update']);
Route::post('/user-role/update', [App\Http\Controllers\UserRoleController::class,'update']);
Route::get('/user-role/delete', [App\Http\Controllers\UserRoleController::class,'delete']);

//Janji Temu Jadwal Rincian
Route::get('/user-user', [App\Http\Controllers\UserUserController::class,'index']);
Route::get('/user-user/index', [App\Http\Controllers\UserUserController::class,'index']);
Route::get('/user-user/read', [App\Http\Controllers\UserUserController::class,'read']);
Route::get('/user-user/create', [App\Http\Controllers\UserUserController::class,'create']);
Route::post('/user-user/create', [App\Http\Controllers\UserUserController::class,'create']);
Route::get('/user-user/update', [App\Http\Controllers\UserUserController::class,'update']);
Route::post('/user-user/update', [App\Http\Controllers\UserUserController::class,'update']);
Route::get('/user-user/delete', [App\Http\Controllers\UserUserController::class,'delete']);


//Riwayat Penyakit
Route::get('/riwayat-penyakit', [App\Http\Controllers\RiwayatPenyakitController::class,'index']);
Route::get('/riwayat-penyakit/index', [App\Http\Controllers\RiwayatPenyakitController::class,'index']);
Route::get('/riwayat-penyakit/read', [App\Http\Controllers\RiwayatPenyakitController::class,'read']);
Route::get('/riwayat-penyakit/create', [App\Http\Controllers\RiwayatPenyakitController::class,'create']);
Route::post('/riwayat-penyakit/create', [App\Http\Controllers\RiwayatPenyakitController::class,'create']);
Route::get('/riwayat-penyakit/update', [App\Http\Controllers\RiwayatPenyakitController::class,'update']);
Route::post('/riwayat-penyakit/update', [App\Http\Controllers\RiwayatPenyakitController::class,'update']);
Route::get('/riwayat-penyakit/delete', [App\Http\Controllers\RiwayatPenyakitController::class,'delete']);


//Keluarga Pasien
Route::get('/keluarga-pasien', [App\Http\Controllers\KeluargaPasienController::class,'index']);
Route::get('/keluarga-pasien/index', [App\Http\Controllers\KeluargaPasienController::class,'index']);
Route::get('/keluarga-pasien/read', [App\Http\Controllers\KeluargaPasienController::class,'read']);
Route::get('/keluarga-pasien/create', [App\Http\Controllers\KeluargaPasienController::class,'create']);
Route::post('/keluarga-pasien/create', [App\Http\Controllers\KeluargaPasienController::class,'create']);
Route::get('/keluarga-pasien/update', [App\Http\Controllers\KeluargaPasienController::class,'update']);
Route::post('/keluarga-pasien/update', [App\Http\Controllers\KeluargaPasienController::class,'update']);
Route::get('/keluarga-pasien/delete', [App\Http\Controllers\KeluargaPasienController::class,'delete']);

Route::get('send-email', [App\Http\Controllers\SendEmailController::class, 'index']);
