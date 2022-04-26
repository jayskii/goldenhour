<?php

$this->title = 'Tambah User User';

/* @var  $model \App\Models\UserUser */

?>

@extends($layout)

@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h2 class="card-title"><?= $this->title; ?></h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
                        
            <tr>
                <th style="width: 180px">Id</th>
                <td><?= $model->id ?></td>
            </tr>
                        
            <tr>
                <th style="width: 180px">Username</th>
                <td><?= $model->username ?></td>
            </tr>
                        
            <tr>
                <th style="width: 180px">Password</th>
                <td><?= $model->password ?></td>
            </tr>
                        
            <tr>
                <th style="width: 180px">User Role</th>
                <td><?= $model->id_user_role ?></td>
            </tr>
            
        </table>
    </div>
    <div class="card-footer">
        <?= $model->getLinkUpdateButton(); ?>
        <?= $model->getLinkIndexButton(); ?>
    </div>
</div>

@endsection