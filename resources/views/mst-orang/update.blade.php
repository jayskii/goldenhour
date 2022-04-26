<?php

/* @var  $model \App\Models\MstOrang */

?>

@extends($layout)

@section('content')

    @include('mst-orang._form',[
        'model' => $model,
        'url' => ['/mst-orang/update?id='.$model->id]
    ])

@endsection
