<?php

?>

@extends($layout)

@section('content')

<div class="card card-default">  
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body"> 
                                    <div style="font-size: 50px;">
                                    <i class="fas fa-user-md"></i>  
                                    &nbsp &nbsp &nbsp &nbsp
                                    &nbsp &nbsp &nbsp &nbsp
                                    &nbsp &nbsp &nbsp &nbsp
                                    &nbsp &nbsp &nbsp 
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
                                        <i class="fas fa-user-injured"></i>
                                        &nbsp &nbsp &nbsp &nbsp
                                        &nbsp &nbsp &nbsp &nbsp
                                        &nbsp &nbsp &nbsp &nbsp
                                        &nbsp &nbsp &nbsp 
                                        {{ $jumlah_pasien }}
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="<?= url('/user-user/index?id_user_role=2'); ?>">PASIEN</a>
                                    <div class="small text-white" style="font-size: 20px"><i class="fas fa-angle-down"></i></div>
                                </div>
                            </div>
                        </div>
                       
</div>

@endsection
