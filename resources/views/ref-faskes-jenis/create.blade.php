<?php

//$this->title = 'Tambah Ref Faskes Jenis';

/* @var  $model \App\Models\RefFaskesJenis */

?>

@extends($layout)

@section('content')

    @include('ref-faskes-jenis._form',[
        'model' => $model,
        'url' => url('/ref-faskes-jenis/create')
    ])

@endsection