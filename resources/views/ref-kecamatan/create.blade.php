<?php

//$this->title = 'Tambah Ref Kecamatan';

/* @var  $model \App\Models\RefKecamatan */

?>

@extends($layout)

@section('content')

    @include('ref-kecamatan._form',[
        'model' => $model,
        'url' => url('/ref-kecamatan/create')
    ])

@endsection