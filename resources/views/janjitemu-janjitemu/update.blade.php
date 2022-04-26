<?php

/* @var  $model \App\Models\JanjitemuJanjitemu */

?>

@extends($layout)

@section('content')

    @include('janjitemu-janjitemu._form',[
        'model' => $model,
        'url' => ['/janjitemu-janjitemu/update?id='.$model->id]
    ])

@endsection