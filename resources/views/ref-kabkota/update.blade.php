<?php

$this->title = 'Ubah Ref Kabkota';

/* @var  $model \App\Models\RefKabkota */

?>

@extends($layout)

@section('content')

    @include('ref-kabkota._form',[
        'model' => $model,
        'route' => ['ref-kabkota.update', 'id'=>$model->id]
    ])

@endsection