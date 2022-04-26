<?php

$this->title = 'Ubah Ref Faskes Jenis';

/* @var  $model \App\Models\RefFaskesJenis */

?>

@extends($layout)

@section('content')

    @include('ref-faskes-jenis._form',[
        'model' => $model,
        'route' => ['ref-faskes-jenis.update', 'id'=>$model->id]
    ])

@endsection