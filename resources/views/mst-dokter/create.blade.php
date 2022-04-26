<?php

//$this->title = 'Tambah Mst Dokter';

/* @var  $model \App\Models\MstDokter */

?>

@extends($layout)

@section('content')

    @include('mst-dokter._form',[
        'model' => $model,
        'url' => url('/mst-dokter/create')
    ])

@endsection