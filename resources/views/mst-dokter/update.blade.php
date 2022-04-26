<?php


/* @var  $model \App\Models\MstDokter */

?>

@extends($layout)

@section('content')

    @include('mst-dokter._form',[
        'model' => $model,
        'url' =>  ['/mst-dokter/update?id='.$model->id]
    ])

@endsection