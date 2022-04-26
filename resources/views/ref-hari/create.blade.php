<?php

//$this->title = 'Tambah Ref Hari';

/* @var  $model \App\Models\RefHari */

?>

@extends($layout)

@section('content')

    @include('ref-hari._form',[
        'model' => $model,
        'url' => url('/ref-hari/create')
    ])

@endsection