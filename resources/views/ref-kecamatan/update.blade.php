<?php

$this->title = 'Ubah Ref Kecamatan';

/* @var  $model \App\Models\RefKecamatan */

?>

@extends($layout)

@section('content')

    @include('ref-kecamatan._form',[
        'model' => $model,
        'route' => ['ref-kecamatan.update', 'id'=>$model->id]
    ])

@endsection