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
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">
                                    <div style="font-size: 50px;">
                                       <i class="fas fa-clinic-medical"></i>
                                       &nbsp &nbsp &nbsp &nbsp
                                       &nbsp &nbsp &nbsp &nbsp
                                       {{ $jumlah_poli }}
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="<?= url('/mst-poli/index'); ?>">POLIKLINIK</a>
                                    <div class="small text-white"style="font-size: 20px"><i class="fas fa-angle-down"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">
                                    <div style="font-size: 50px;">
                                        <i class="fas fa-user-md"></i>
                                        &nbsp &nbsp &nbsp &nbsp
                                        &nbsp &nbsp &nbsp &nbsp
                                        {{ $jumlah_dokter }}
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="<?= url('/mst-dokter/index'); ?>">DOKTER</a>
                                    <div class="small text-white"style="font-size: 20px"><i class="fas fa-angle-down"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">
                                    <div style="font-size: 50px;">
                                        <i class="fas fa-user-injured"></i>
                                        &nbsp &nbsp &nbsp &nbsp
                                        &nbsp &nbsp &nbsp &nbsp
                                        {{ $jumlah_pasien }}
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="<?= url('/mst-pasien/index'); ?>">PASIEN</a>
                                    <div class="small text-white" style="font-size: 20px"><i class="fas fa-angle-down"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">
                                    <div style="font-size: 50px;">
                                        <i class="fas fa-lungs-virus"></i>
                                        
                                        &nbsp &nbsp &nbsp &nbsp
                                        {{ $jumlah_riwayat }}
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="<?= url('/riwayat-penyakit/index'); ?>">RIWAYAT PENYAKIT</a>
                                    <div class="small text-white" style="font-size: 20px"><i class="fas fa-angle-down"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">
                                    <div style="font-size: 50px;">
                                        <i class="fas fa-user-friends"></i>
                                        &nbsp &nbsp &nbsp &nbsp
                                        {{ $jumlah_keluarga }}
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="<?= url('/keluarga-pasien/index'); ?>">KELUARGA PASIEN</a>
                                    <div class="small text-white" style="font-size: 20px"><i class="fas fa-angle-down"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">
                                    <div style="font-size: 50px;">
                                        <i class="fas fa-address-book"></i>
                                        &nbsp &nbsp &nbsp &nbsp
                                        {{ $jumlah_janjitemu }}
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="<?= url('/janjitemu-janjitemu/index'); ?>">JANJI TEMU DOKTER</a>
                                    <div class="small text-white" style="font-size: 20px"><i class="fas fa-angle-down"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

</div>


<div class="card card-default"> 
    <h1>USER</h1>  
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <div style="font-size: 50px;">
                        <i class="fas fa-user-cog"></i>
                        &nbsp &nbsp &nbsp &nbsp
                        {{-- {{ $jumlah_user_role }} --}}
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="<?= url('/user-user/index?id_user_role=1'); ?>">ADMIN</a>
                    <div class="small text-white" style="font-size: 20px"><i class="fas fa-angle-down"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <div style="font-size: 50px;">
                        <i class="fas fa-hospital-alt"></i>
                        &nbsp &nbsp &nbsp &nbsp
                        data
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="<?= url('/user-user/index?id_user_role=3'); ?>">FASKES</a>
                    <div class="small text-white" style="font-size: 20px"><i class="fas fa-angle-down"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <div style="font-size: 50px;">
                        <i class="fas fa-user-injured"></i>
                        &nbsp &nbsp &nbsp &nbsp
                        {{ $jumlah_pasien }}
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="<?= url('/user-user/index?id_user_role=2'); ?>">PASIEN</a>
                    <div class="small text-white" style="font-size: 20px"><i class="fas fa-angle-down"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <div style="font-size: 50px;">
                        <i class="fas fa-user-md"></i>
                        &nbsp &nbsp &nbsp &nbsp
                        data
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="<?= url('/user-user/index?id_user_role=4'); ?>">DOKTER</a>
                    <div class="small text-white" style="font-size: 20px"><i class="fas fa-angle-down"></i></div>
                </div>
            </div>
        </div>
       

</div>

@endsection
