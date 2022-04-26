<?php

$this->title = 'Ubah Ref Provinsi';

/* @var  $model \App\Models\RefProvinsi */

?>

@extends($layout)

@section('content')

    @include('ref-provinsi._form',[
        'model' => $model,
        'route' => ['ref-provinsi.update', 'id'=>$model->id]
    ])

@endsection