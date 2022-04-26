<?php

//$this->title = 'Tambah Mst Orang';

/* @var  $model \App\Models\MstOrang */

?>

@extends($layout)

@section('content')

    @include('mst-orang._form',[
        'model' => $model,
        'url' => url('/mst-orang/create')
    ])

@endsection