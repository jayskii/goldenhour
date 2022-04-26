<?php

//$this->title = 'Tambah User Role';

/* @var  $model \App\Models\UserRole */

?>

@extends($layout)

@section('content')

    @include('user-role._form',[
        'model' => $model,
        'url' => url('/user-role/create')
    ])

@endsection