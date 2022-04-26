<?php

/* @var $allUserUser \App\Models\UserUser[] */
/* @var $gridView \App\Components\GridView */

?>

@extends($layout)

@section('content')

    <?php if ($message = Session::get('success')) { ?>
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong><?= $message ?></strong>
        </div>
    <?php  } ?>

    <div class="card card-primary">
        <div class="card-header">
            <h2 class="card-title">UserUser</h2>
        </div>
        <div class="card-body">
            <div style="margin-bottom: 20px">
                <a href="<?=url('/user-user/create?id_user_role='.$id_user_role); ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus-circle"></i> Tambah Data
                </a>
            </div>
            <div style="overflow: auto">

                <table class="table table-bordered table-condensed">
                    <tr>
                        <th style="width: 50px;">No</th>

                        <th style="text-align: center;">
                            Username
                        </th>
                        <th style="text-align: center;">
                            User Role
                        </th>

                        <th style="width: 100px"></th>
                    </tr>

                    <?php
                    ?>
                    <?php $i=1; foreach($allUserUser as $data) { ?>
                    <tr>
                        <td style="text-align: center"><?= $i; ?></td>

                        <td style="text-align: left;">
                            <?= $data->username ?>
                        </td>

                        <td style="text-align: center;">
                            <?= @$data->userRole->nama ?>
                        </td>

                        <td style="text-align: center">
                            <?= $data->getLinkReadIcon(); ?>
                            <?= $data->getLinkUpdateIcon(); ?>
                            <?= $data->getLinkDeleteIcon(); ?>
                        </td>
                    </tr>
                    <?php $i++; } ?>
                </table>
            </div>
        </div>
    </div>

@endsection
