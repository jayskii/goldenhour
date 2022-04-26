<?php

//$this->title = 'Tambah Ref Provinsi';

/* @var  $model \App\Models\RefProvinsi */

?>

@extends($layout)

@section('content')

    @include('ref-provinsi._form',[
        'model' => $model,
        'url' => url('/ref-provinsi/create')
    ])

@endsection