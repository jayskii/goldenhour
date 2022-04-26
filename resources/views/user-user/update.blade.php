<?php

/* @var  $model \App\Models\UserUser */

?>

@extends($layout)

@section('content')

    @include('user-user._form',[
        'model' => $model,
        'url' => url('/user-user/update?id='.$model->id)
    ])

@endsection
