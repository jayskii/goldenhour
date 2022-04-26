<?php

?>

@extends($layout)

@section('content')

    @include('keluarga-pasien._form',[
        'model' => $model,
        'url' => url('/keluarga-pasien/create')
    ])

@endsection