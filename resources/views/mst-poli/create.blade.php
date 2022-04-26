<?php

//$this->title = 'Tambah Mst Poli';

/* @var  $model \App\Models\MstPoli */

?>

@extends($layout)

@section('content')

    @include('mst-poli._form',[
        'model' => $model,
        'url' => url('/mst-poli/create')
    ])

@endsection