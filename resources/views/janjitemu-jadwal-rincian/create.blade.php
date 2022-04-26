<?php

//$this->title = 'Tambah Janjitemu Jadwal Rincian';

/* @var  $model \App\Models\JanjitemuJadwalRincian */

?>

@extends($layout)

@section('content')

    @include('janjitemu-jadwal-rincian._form',[
        'model' => $model,
        'url' => url('/janjitemu-jadwal-rincian/create?id_jadwal='.$model->id_jadwal)
    ])

@endsection
