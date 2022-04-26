<?php

//$this->title = 'Tambah User User';

/* @var  $model \App\Models\UserUser */

?>

@extends($layout)

@section('content')

    @include('user-user._form',[
        'model' => $model,
        'url' => url('/user-user/create?id_user_role='.$model->id_user_role)
    ])

@endsection
