<?php

//$this->title = 'Tambah Janjitemu Jadwal';

/* @var  $model \App\Models\JanjitemuJadwal */

?>

@extends($layout)

@section('content')

    @include('janjitemu-jadwal._form',[
        'model' => $model,
        'url' => url('/janjitemu-jadwal/create')
    ])

@endsection