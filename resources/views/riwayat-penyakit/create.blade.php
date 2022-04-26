<?php

//$this->title = 'Tambah Mst Dokter';

/* @var  $model \App\Models\MstDokter */

?>

@extends($layout)

@section('content')

    @include('riwayat-penyakit._form',[
        'model' => $model,
        'url' => url('/riwayat-penyakit/create')
    ])

@endsection