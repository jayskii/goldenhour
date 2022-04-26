<?php

?>

@extends($layout)

@section('content')

<div class="card card-default">  
    <h1>MASTER</h1> 
                    <div class="row">
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body"> 
                                    <div style="font-size: 50px;">
                                    <i class="fas fa-hospital-alt"></i>  
                                    &nbsp &nbsp &nbsp &nbsp
                                    &nbsp &nbsp &nbsp &nbsp
                                   {{ $jumlah_faskes }}
                                </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="medium text-white stretched-link" href="<?= url('/mst-faskes/index'); ?>">FASKES</a>
                                    <div class="small text-white" style="font-size: 20px"><i class="fas fa-angle-down"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body"> 
                                    <div style="font-size: 50px;">
                                    <i class="fas fa-clinic-medical"></i>  
                                    &nbsp &nbsp &nbsp &nbsp
                                    &nbsp &nbsp &nbsp &nbsp
                                   {{ $jumlah_poli }}
                                </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="medium text-white stretched-link" href="<?= url('/mst-poli/index'); ?>">Poli</a>
                                    <div class="small text-white" style="font-size: 20px"><i class="fas fa-angle-down"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body"> 
                                    <div style="font-size: 50px;">
                                    <i class="fas fa-user-md"></i>  
                                    &nbsp &nbsp &nbsp &nbsp
                                    &nbsp &nbsp &nbsp &nbsp
                                   {{ $jumlah_dokter }}
                                </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="medium text-white stretched-link" href="<?= url('/mst-dokter/index'); ?>">Dokter</a>
                                    <div class="small text-white" style="font-size: 20px"><i class="fas fa-angle-down"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body"> 
                                    <div style="font-size: 50px;">
                                    <i class="fas fa-lungs-virus"></i>  
                                    &nbsp &nbsp &nbsp &nbsp
                                    &nbsp &nbsp &nbsp &nbsp
                                    &nbsp &nbsp &nbsp &nbsp
                                    &nbsp &nbsp &nbsp 
                                   {{ $jumlah_riwayat }}
                                </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="medium text-white stretched-link" href="<?= url('/riwayat-penyakit/index'); ?>">Riwayat Penyakit</a>
                                    <div class="small text-white" style="font-size: 20px"><i class="fas fa-angle-down"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body"> 
                                    <div style="font-size: 50px;">
                                    <i class="fas fa-user-friends"></i>  
                                    &nbsp &nbsp &nbsp &nbsp
                                    &nbsp &nbsp &nbsp &nbsp
                                    &nbsp &nbsp &nbsp &nbsp
                                    &nbsp &nbsp &nbsp 
                                   {{ $jumlah_keluarga }}
                                </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="medium text-white stretched-link" href="<?= url('/keluarga-pasien/index'); ?>">Keluarga Pasien</a>
                                    <div class="small text-white" style="font-size: 20px"><i class="fas fa-angle-down"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
<div class="card card-default"> 
  
    
       

</div>

@endsection
