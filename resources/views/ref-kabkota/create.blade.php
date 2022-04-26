<?php

//$this->title = 'Tambah Ref Kabkota';

/* @var  $model \App\Models\RefKabkota */

?>

@extends($layout)

@section('content')

    @include('ref-kabkota._form',[
        'model' => $model,
        'url' => url('/ref-kabkota/create')
    ])

@endsection