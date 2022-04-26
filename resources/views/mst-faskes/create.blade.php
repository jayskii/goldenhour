<?php

//$this->title = 'Tambah Mst Faskes';

/* @var  $model \App\Models\MstFaskes */

?>

@extends($layout)

@section('content')

    @include('mst-faskes._form',[
        'model' => $model,
        'url' => url('/mst-faskes/create')
    ])

@endsection