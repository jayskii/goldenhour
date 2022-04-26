<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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
Route::get('/auth/login',[AuthController::class,'login'])->name('login');
Route::post('/auth/login-process',[AuthController::class,'loginProcess']);
Route::post('/auth/logout',[AuthController::class,'logout'])->middleware('auth')->name('logout');

Route::get('/dashboard/index', [App\Http\Controllers\DashboardController::class,'index']);

Route::get('/gii/generate', [App\Http\Controllers\GiiController::class,'generate']);
Route::get('/gii/model', [App\Http\Controllers\GiiController::class,'model']);
Route::get('/gii/controller', [App\Http\Controllers\GiiController::class,'controller']);
Route::get('/gii/index', [App\Http\Controllers\GiiController::class,'index']);
Route::get('/gii/read', [App\Http\Controllers\GiiController::class,'read']);
Route::get('/gii/create', [App\Http\Controllers\GiiController::class,'create']);
Route::get('/gii/update', [App\Http\Controllers\GiiController::class,'update']);
Route::get('/gii/form', [App\Http\Controllers\GiiController::class,'form']);
Route::get('/gii/route', [App\Http\Controllers\GiiController::class,'route']);

Route::get('/orang', [App\Http\Controllers\OrangController::class,'index']);
Route::get('/orang/index', [App\Http\Controllers\OrangController::class,'index']);
Route::get('/orang/read', [App\Http\Controllers\OrangController::class,'read']);
Route::get('/orang/create', [App\Http\Controllers\OrangController::class,'create']);
Route::post('/orang/create', [App\Http\Controllers\OrangController::class,'create']);
Route::get('/orang/update', [App\Http\Controllers\OrangController::class,'update']);
Route::post('/orang/update', [App\Http\Controllers\OrangController::class,'update']);
Route::get('/orang/delete', [App\Http\Controllers\OrangController::class,'delete']);
Route::get('/orang/export-pdf', [App\Http\Controllers\OrangController::class,'exportPdf']);

Route::get('/angka-kredit', [App\Http\Controllers\AngkaKreditController::class,'index']);
Route::get('/angka-kredit/index', [App\Http\Controllers\AngkaKreditController::class,'index']);
Route::get('/angka-kredit/read', [App\Http\Controllers\AngkaKreditController::class,'read']);
Route::get('/angka-kredit/create', [App\Http\Controllers\AngkaKreditController::class,'create']);
Route::post('/angka-kredit/create', [App\Http\Controllers\AngkaKreditController::class,'create']);
Route::get('/angka-kredit/update', [App\Http\Controllers\AngkaKreditController::class,'update']);
Route::post('/angka-kredit/update', [App\Http\Controllers\AngkaKreditController::class,'update']);
Route::get('/angka-kredit/delete', [App\Http\Controllers\AngkaKreditController::class,'delete']);

Route::get('/cltn', [App\Http\Controllers\CltnController::class,'index']);
Route::get('/cltn/index', [App\Http\Controllers\CltnController::class,'index']);
Route::get('/cltn/read', [App\Http\Controllers\CltnController::class,'read']);
Route::get('/cltn/create', [App\Http\Controllers\CltnController::class,'create']);
Route::post('/cltn/create', [App\Http\Controllers\CltnController::class,'create']);
Route::get('/cltn/update', [App\Http\Controllers\CltnController::class,'update']);
Route::post('/cltn/update', [App\Http\Controllers\CltnController::class,'update']);
Route::get('/cltn/delete', [App\Http\Controllers\CltnController::class,'delete']);

Route::get('/cpns-pns', [App\Http\Controllers\CpnsPnsController::class,'index']);
Route::get('/cpns-pns/index', [App\Http\Controllers\CpnsPnsController::class,'index']);
Route::get('/cpns-pns/read', [App\Http\Controllers\CpnsPnsController::class,'read']);
Route::get('/cpns-pns/create', [App\Http\Controllers\CpnsPnsController::class,'create']);
Route::post('/cpns-pns/create', [App\Http\Controllers\CpnsPnsController::class,'create']);
Route::get('/cpns-pns/update', [App\Http\Controllers\CpnsPnsController::class,'update']);
Route::post('/cpns-pns/update', [App\Http\Controllers\CpnsPnsController::class,'update']);
Route::get('/cpns-pns/delete', [App\Http\Controllers\CpnsPnsController::class,'delete']);

Route::get('/golongan', [App\Http\Controllers\GolonganController::class,'index']);
Route::get('/golongan/index', [App\Http\Controllers\GolonganController::class,'index']);
Route::get('/golongan/read', [App\Http\Controllers\GolonganController::class,'read']);
Route::get('/golongan/create', [App\Http\Controllers\GolonganController::class,'create']);
Route::post('/golongan/create', [App\Http\Controllers\GolonganController::class,'create']);
Route::get('/golongan/update', [App\Http\Controllers\GolonganController::class,'update']);
Route::post('/golongan/update', [App\Http\Controllers\GolonganController::class,'update']);
Route::get('/golongan/delete', [App\Http\Controllers\GolonganController::class,'delete']);

Route::get('/hukuman-disiplin', [App\Http\Controllers\HukumanDisiplinController::class,'index']);
Route::get('/hukuman-disiplin/index', [App\Http\Controllers\HukumanDisiplinController::class,'index']);
Route::get('/hukuman-disiplin/read', [App\Http\Controllers\HukumanDisiplinController::class,'read']);
Route::get('/hukuman-disiplin/create', [App\Http\Controllers\HukumanDisiplinController::class,'create']);
Route::post('/hukuman-disiplin/create', [App\Http\Controllers\HukumanDisiplinController::class,'create']);
Route::get('/hukuman-disiplin/update', [App\Http\Controllers\HukumanDisiplinController::class,'update']);
Route::post('/hukuman-disiplin/update', [App\Http\Controllers\HukumanDisiplinController::class,'update']);
Route::get('/hukuman-disiplin/delete', [App\Http\Controllers\HukumanDisiplinController::class,'delete']);

Route::get('/jabatan', [App\Http\Controllers\JabatanController::class,'index']);
Route::get('/jabatan/index', [App\Http\Controllers\JabatanController::class,'index']);
Route::get('/jabatan/read', [App\Http\Controllers\JabatanController::class,'read']);
Route::get('/jabatan/create', [App\Http\Controllers\JabatanController::class,'create']);
Route::post('/jabatan/create', [App\Http\Controllers\JabatanController::class,'create']);
Route::get('/jabatan/update', [App\Http\Controllers\JabatanController::class,'update']);
Route::post('/jabatan/update', [App\Http\Controllers\JabatanController::class,'update']);
Route::get('/jabatan/delete', [App\Http\Controllers\JabatanController::class,'delete']);

Route::get('/kedudukan-hukum', [App\Http\Controllers\KedudukanHukumController::class,'index']);
Route::get('/kedudukan-hukum/index', [App\Http\Controllers\KedudukanHukumController::class,'index']);
Route::get('/kedudukan-hukum/read', [App\Http\Controllers\KedudukanHukumController::class,'read']);
Route::get('/kedudukan-hukum/create', [App\Http\Controllers\KedudukanHukumController::class,'create']);
Route::post('/kedudukan-hukum/create', [App\Http\Controllers\KedudukanHukumController::class,'create']);
Route::get('/kedudukan-hukum/update', [App\Http\Controllers\KedudukanHukumController::class,'update']);
Route::post('/kedudukan-hukum/update', [App\Http\Controllers\KedudukanHukumController::class,'update']);
Route::get('/kedudukan-hukum/delete', [App\Http\Controllers\KedudukanHukumController::class,'delete']);

Route::get('/kepanitiaan', [App\Http\Controllers\KepanitiaanController::class,'index']);
Route::get('/kepanitiaan/index', [App\Http\Controllers\KepanitiaanController::class,'index']);
Route::get('/kepanitiaan/read', [App\Http\Controllers\KepanitiaanController::class,'read']);
Route::get('/kepanitiaan/create', [App\Http\Controllers\KepanitiaanController::class,'create']);
Route::post('/kepanitiaan/create', [App\Http\Controllers\KepanitiaanController::class,'create']);
Route::get('/kepanitiaan/update', [App\Http\Controllers\KepanitiaanController::class,'update']);
Route::post('/kepanitiaan/update', [App\Http\Controllers\KepanitiaanController::class,'update']);
Route::get('/kepanitiaan/delete', [App\Http\Controllers\KepanitiaanController::class,'delete']);

Route::get('/kursus', [App\Http\Controllers\KursusController::class,'index']);
Route::get('/kursus/index', [App\Http\Controllers\KursusController::class,'index']);
Route::get('/kursus/read', [App\Http\Controllers\KursusController::class,'read']);
Route::get('/kursus/create', [App\Http\Controllers\KursusController::class,'create']);
Route::post('/kursus/create', [App\Http\Controllers\KursusController::class,'create']);
Route::get('/kursus/update', [App\Http\Controllers\KursusController::class,'update']);
Route::post('/kursus/update', [App\Http\Controllers\KursusController::class,'update']);
Route::get('/kursus/delete', [App\Http\Controllers\KursusController::class,'delete']);

Route::get('/latihan-struktural', [App\Http\Controllers\LatihanStrukturalController::class,'index']);
Route::get('/latihan-struktural/index', [App\Http\Controllers\LatihanStrukturalController::class,'index']);
Route::get('/latihan-struktural/read', [App\Http\Controllers\LatihanStrukturalController::class,'read']);
Route::get('/latihan-struktural/create', [App\Http\Controllers\LatihanStrukturalController::class,'create']);
Route::post('/latihan-struktural/create', [App\Http\Controllers\LatihanStrukturalController::class,'create']);
Route::get('/latihan-struktural/update', [App\Http\Controllers\LatihanStrukturalController::class,'update']);
Route::post('/latihan-struktural/update', [App\Http\Controllers\LatihanStrukturalController::class,'update']);
Route::get('/latihan-struktural/delete', [App\Http\Controllers\LatihanStrukturalController::class,'delete']);

Route::get('/orang-pendidikan', [App\Http\Controllers\OrangPendidikanController::class,'index']);
Route::get('/orang-pendidikan/index', [App\Http\Controllers\OrangPendidikanController::class,'index']);
Route::get('/orang-pendidikan/read', [App\Http\Controllers\OrangPendidikanController::class,'read']);
Route::get('/orang-pendidikan/create', [App\Http\Controllers\OrangPendidikanController::class,'create']);
Route::post('/orang-pendidikan/create', [App\Http\Controllers\OrangPendidikanController::class,'create']);
Route::get('/orang-pendidikan/update', [App\Http\Controllers\OrangPendidikanController::class,'update']);
Route::post('/orang-pendidikan/update', [App\Http\Controllers\OrangPendidikanController::class,'update']);
Route::get('/orang-pendidikan/delete', [App\Http\Controllers\OrangPendidikanController::class,'delete']);

Route::get('/organisasi', [App\Http\Controllers\OrganisasiController::class,'index']);
Route::get('/organisasi/index', [App\Http\Controllers\OrganisasiController::class,'index']);
Route::get('/organisasi/read', [App\Http\Controllers\OrganisasiController::class,'read']);
Route::get('/organisasi/create', [App\Http\Controllers\OrganisasiController::class,'create']);
Route::post('/organisasi/create', [App\Http\Controllers\OrganisasiController::class,'create']);
Route::get('/organisasi/update', [App\Http\Controllers\OrganisasiController::class,'update']);
Route::post('/organisasi/update', [App\Http\Controllers\OrganisasiController::class,'update']);
Route::get('/organisasi/delete', [App\Http\Controllers\OrganisasiController::class,'delete']);

Route::get('/penghargaan', [App\Http\Controllers\PenghargaanController::class,'index']);
Route::get('/penghargaan/index', [App\Http\Controllers\PenghargaanController::class,'index']);
Route::get('/penghargaan/read', [App\Http\Controllers\PenghargaanController::class,'read']);
Route::get('/penghargaan/create', [App\Http\Controllers\PenghargaanController::class,'create']);
Route::post('/penghargaan/create', [App\Http\Controllers\PenghargaanController::class,'create']);
Route::get('/penghargaan/update', [App\Http\Controllers\PenghargaanController::class,'update']);
Route::post('/penghargaan/update', [App\Http\Controllers\PenghargaanController::class,'update']);
Route::get('/penghargaan/delete', [App\Http\Controllers\PenghargaanController::class,'delete']);
Route::get('/penghargaan/test', [App\Http\Controllers\PenghargaanController::class,'test']);


Route::get('/pindah-instansi', [App\Http\Controllers\PindahInstansiController::class,'index']);
Route::get('/pindah-instansi/index', [App\Http\Controllers\PindahInstansiController::class,'index']);
Route::get('/pindah-instansi/read', [App\Http\Controllers\PindahInstansiController::class,'read']);
Route::get('/pindah-instansi/create', [App\Http\Controllers\PindahInstansiController::class,'create']);
Route::post('/pindah-instansi/create', [App\Http\Controllers\PindahInstansiController::class,'create']);
Route::get('/pindah-instansi/update', [App\Http\Controllers\PindahInstansiController::class,'update']);
Route::post('/pindah-instansi/update', [App\Http\Controllers\PindahInstansiController::class,'update']);
Route::get('/pindah-instansi/delete', [App\Http\Controllers\PindahInstansiController::class,'delete']);

Route::get('/pns', [App\Http\Controllers\PnsController::class,'index']);
Route::get('/pns/index', [App\Http\Controllers\PnsController::class,'index']);
Route::get('/pns/read', [App\Http\Controllers\PnsController::class,'read']);
Route::get('/pns/create', [App\Http\Controllers\PnsController::class,'create']);
Route::post('/pns/create', [App\Http\Controllers\PnsController::class,'create']);
Route::get('/pns/update', [App\Http\Controllers\PnsController::class,'update']);
Route::post('/pns/update', [App\Http\Controllers\PnsController::class,'update']);
Route::get('/pns/delete', [App\Http\Controllers\PnsController::class,'delete']);

Route::get('/prestasi', [App\Http\Controllers\PrestasiController::class,'index']);
Route::get('/prestasi/index', [App\Http\Controllers\PrestasiController::class,'index']);
Route::get('/prestasi/read', [App\Http\Controllers\PrestasiController::class,'read']);
Route::get('/prestasi/create', [App\Http\Controllers\PrestasiController::class,'create']);
Route::post('/prestasi/create', [App\Http\Controllers\PrestasiController::class,'create']);
Route::get('/prestasi/update', [App\Http\Controllers\PrestasiController::class,'update']);
Route::post('/prestasi/update', [App\Http\Controllers\PrestasiController::class,'update']);
Route::get('/prestasi/delete', [App\Http\Controllers\PrestasiController::class,'delete']);

Route::get('/profesi', [App\Http\Controllers\ProfesiController::class,'index']);
Route::get('/profesi/index', [App\Http\Controllers\ProfesiController::class,'index']);
Route::get('/profesi/read', [App\Http\Controllers\ProfesiController::class,'read']);
Route::get('/profesi/create', [App\Http\Controllers\ProfesiController::class,'create']);
Route::post('/profesi/create', [App\Http\Controllers\ProfesiController::class,'create']);
Route::get('/profesi/update', [App\Http\Controllers\ProfesiController::class,'update']);
Route::post('/profesi/update', [App\Http\Controllers\ProfesiController::class,'update']);
Route::get('/profesi/delete', [App\Http\Controllers\ProfesiController::class,'delete']);

Route::get('/pwk', [App\Http\Controllers\PwkController::class,'index']);
Route::get('/pwk/index', [App\Http\Controllers\PwkController::class,'index']);
Route::get('/pwk/read', [App\Http\Controllers\PwkController::class,'read']);
Route::get('/pwk/create', [App\Http\Controllers\PwkController::class,'create']);
Route::post('/pwk/create', [App\Http\Controllers\PwkController::class,'create']);
Route::get('/pwk/update', [App\Http\Controllers\PwkController::class,'update']);
Route::post('/pwk/update', [App\Http\Controllers\PwkController::class,'update']);
Route::get('/pwk/delete', [App\Http\Controllers\PwkController::class,'delete']);

Route::get('/skp', [App\Http\Controllers\SkpController::class,'index']);
Route::get('/skp/index', [App\Http\Controllers\SkpController::class,'index']);
Route::get('/skp/read', [App\Http\Controllers\SkpController::class,'read']);
Route::get('/skp/create', [App\Http\Controllers\SkpController::class,'create']);
Route::post('/skp/create', [App\Http\Controllers\SkpController::class,'create']);
Route::get('/skp/update', [App\Http\Controllers\SkpController::class,'update']);
Route::post('/skp/update', [App\Http\Controllers\SkpController::class,'update']);
Route::get('/skp/delete', [App\Http\Controllers\SkpController::class,'delete']);

Route::get('/unor', [App\Http\Controllers\UnorController::class,'index']);
Route::get('/unor/index', [App\Http\Controllers\UnorController::class,'index']);
Route::get('/unor/read', [App\Http\Controllers\UnorController::class,'read']);
Route::get('/unor/create', [App\Http\Controllers\UnorController::class,'create']);
Route::post('/unor/create', [App\Http\Controllers\UnorController::class,'create']);
Route::get('/unor/update', [App\Http\Controllers\UnorController::class,'update']);
Route::post('/unor/update', [App\Http\Controllers\UnorController::class,'update']);
Route::get('/unor/delete', [App\Http\Controllers\UnorController::class,'delete']);

Route::get('/bakuda', [App\Http\Controllers\BakudaController::class,'index']);
Route::get('/bakuda/index', [App\Http\Controllers\BakudaController::class,'index']);
Route::get('/bakuda/read', [App\Http\Controllers\BakudaController::class,'read']);
Route::get('/bakuda/create', [App\Http\Controllers\BakudaController::class,'create']);
Route::post('/bakuda/create', [App\Http\Controllers\BakudaController::class,'create']);
Route::get('/bakuda/update', [App\Http\Controllers\BakudaController::class,'update']);
Route::post('/bakuda/update', [App\Http\Controllers\BakudaController::class,'update']);
Route::get('/bakuda/delete', [App\Http\Controllers\BakudaController::class,'delete']);

