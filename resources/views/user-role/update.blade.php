<?php

$this->title = 'Ubah User Role';

/* @var  $model \App\Models\UserRole */

?>

@extends($layout)

@section('content')

    @include('user-role._form',[
        'model' => $model,
        'route' => ['user-role.update', 'id'=>$model->id]
    ])

@endsection