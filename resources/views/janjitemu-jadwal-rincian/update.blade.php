<?php


/* @var  $model \App\Models\JanjitemuJadwalRincian */

?>

@extends($layout)

@section('content')

    @include('janjitemu-jadwal-rincian._form',[
        'model' => $model,
        'url' => ['/janjitemu-jadwal-rincian/update?id='.$model->id]
    ])

@endsection