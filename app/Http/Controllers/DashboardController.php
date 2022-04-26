<?php

namespace App\Http\Controllers;

// get master data

use App\Models\MstFaskes;
use App\Models\MstPoli;
use App\Models\MstDokter;
use App\Models\MstPasien;
use App\Models\RiwayatPenyakit;
use App\Models\KeluargaPasien;
use App\Models\JanjitemuJanjitemu;

// get user data
use App\Models\UserUser;
use App\Models\UserRole;



class DashboardController extends Controller
{
	public $layout = 'layouts.backend.main';

	public function __construct()
	{
		// return $this->middleware('auth');
	}
	
	public function index()
	{
		$jumlah_faskes = MstFaskes::all()->count();
		$jumlah_poli = MstPoli::all()->count();
		$jumlah_dokter = MstDokter::all()->count();
		$jumlah_pasien = MstPasien::all()->count();
		$jumlah_riwayat = RiwayatPenyakit::all()->count();
		$jumlah_keluarga = KeluargaPasien::all()->count();
		$jumlah_janjitemu = JanjitemuJanjitemu::all()->count();
		$jumlah_user_admin = UserUser::all()->count();
		
		return view('dashboard/index',[
		'layout' => $this->layout,]) 
		-> with('jumlah_faskes', $jumlah_faskes)
		-> with('jumlah_poli', $jumlah_poli)
		-> with('jumlah_dokter', $jumlah_dokter)
		-> with('jumlah_pasien', $jumlah_pasien)
		-> with('jumlah_riwayat', $jumlah_riwayat)
		-> with('jumlah_keluarga', $jumlah_keluarga)
		-> with('jumlah_janjitemu', $jumlah_janjitemu)
		-> with('jumlah_user_admin', $jumlah_user_admin);
	}

	public function indexDokter()
	{
		
		$jumlah_dokter = MstDokter::all()->count();
		$jumlah_pasien = MstPasien::all()->count();
		
		return view('dashboard/index-dokter',[
		'layout' => $this->layout,]) 
		
		-> with('jumlah_dokter', $jumlah_dokter)
		-> with('jumlah_pasien', $jumlah_pasien)
		;
	}

	public function indexFaskes()
	{
		$jumlah_faskes = MstFaskes::all()->count();
		$jumlah_poli = MstPoli::all()->count();
		$jumlah_dokter = MstDokter::all()->count();
		$jumlah_pasien = MstPasien::all()->count();
		$jumlah_riwayat = RiwayatPenyakit::all()->count();
		$jumlah_keluarga = KeluargaPasien::all()->count();
		
		return view('dashboard/index-faskes',[
		'layout' => $this->layout,]) 
		-> with('jumlah_faskes', $jumlah_faskes)
		-> with('jumlah_poli', $jumlah_poli)
		-> with('jumlah_dokter', $jumlah_dokter)
		-> with('jumlah_pasien', $jumlah_pasien)
		-> with('jumlah_riwayat', $jumlah_riwayat)
		-> with('jumlah_keluarga', $jumlah_keluarga)
		;
	}
}

?>