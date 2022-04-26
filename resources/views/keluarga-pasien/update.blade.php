<?php


/* @var  $model \App\Models\MstDokter */

?>

@extends($layout)

@section('content')

    @include('keluarga-pasien._form',[
        'model' => $model,
        'url' =>  ['/keluarga-pasien/update?id='.$model->id]
    ])

@endsection