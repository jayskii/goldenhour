<?php

// $this->title = 'Ubah Mst Faskes';

/* @var  $model \App\Models\MstFaskes */

?>

@extends($layout)

@section('content')

    @include('mst-faskes._form',[
        'model' => $model,
        'url' => ['/mst-faskes/update?id='.$model->id]
    ])

@endsection