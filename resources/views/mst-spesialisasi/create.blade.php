<?php

//$this->title = 'Tambah Mst Spesialisasi';

/* @var  $model \App\Models\MstSpesialisasi */

?>

@extends($layout)

@section('content')

    @include('mst-spesialisasi._form',[
        'model' => $model,
        'url' => url('/mst-spesialisasi/create')
    ])

@endsection