<?php

$this->title = 'Ubah Ref Hari';

/* @var  $model \App\Models\RefHari */

?>

@extends($layout)

@section('content')

    @include('ref-hari._form',[
        'model' => $model,
        'route' => ['ref-hari.update', 'id'=>$model->id]
    ])

@endsection