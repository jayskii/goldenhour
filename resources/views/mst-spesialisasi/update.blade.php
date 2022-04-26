<?php

$this->title = 'Ubah Mst Spesialisasi';

/* @var  $model \App\Models\MstSpesialisasi */

?>

@extends($layout)

@section('content')

    @include('mst-spesialisasi._form',[
        'model' => $model,
        'route' => ['mst-spesialisasi.update', 'id'=>$model->id]
    ])

@endsection