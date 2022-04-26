<?php

/* @var  $model \App\Models\MstPoli */

?>

@extends($layout)

@section('content')

    @include('mst-poli._form',[
        'model' => $model,
        'url' => ['/mst-poli/update?id='.$model->id]
    ])

@endsection