<?php

/* @var  $model \App\Models\JanjitemuJadwal */

?>

@extends($layout)

@section('content')

    @include('janjitemu-jadwal._form',[
        'model' => $model,
        'url' => ['/janjitemu-jadwal/update?id='.$model->id]
    ])

@endsection