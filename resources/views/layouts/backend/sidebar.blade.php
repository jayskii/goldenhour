<?php

?>
<?php use App\Components\Session; ?>
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('/images/logo-sidebar.png') }}" alt="GOLDENHOUR" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">GOLDENHOUR</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('/images/no-photo.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block" href="#">{{ @Auth::user()->username }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php if(Session::isAdmin()) { ?>
                @include('layouts.backend.menu-admin')
            <?php } ?>
            <?php if(Session::isFaskes()) { ?>
                @include('layouts.backend.menu-faskes')
            <?php } ?>
            <?php if(Session::isDokter()) { ?>
                @include('layouts.backend.menu-dokter')
            <?php } ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
