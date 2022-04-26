<?php


/* @var  $model \App\Models\MstDokter */

?>

@extends($layout)

@section('content')

    @include('riwayat-penyakit._form',[
        'model' => $model,
        'url' =>  ['/riwayat-penyakit/update?id='.$model->id]
    ])

@endsection