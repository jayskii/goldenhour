<?php

//$this->title = 'Tambah Janjitemu Janjitemu';

/* @var  $model \App\Models\JanjitemuJanjitemu */

?>

@extends($layout)

@section('content')

    @include('janjitemu-janjitemu._form',[
        'model' => $model,
        'url' => url('/janjitemu-janjitemu/create')
    ])

@endsection