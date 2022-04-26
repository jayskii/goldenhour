<?php

//$this->title = 'Tambah Mst Pasien';

/* @var  $model \App\Models\MstPasien */

?>

@extends($layout)

@section('content')

    @include('mst-pasien._form',[
        'model' => $model,
        'url' => url('/mst-pasien/create')
    ])

@endsection