<ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false" data-widget="treeview" role="menu">
    <li class="nav-header">MENU UTAMA</li>
    <li class="nav-item">
        <a class="nav-link" href="<?= url('/dashboard/index-dokter'); ?>">
            <i class="nav-icon fa fa-bars"></i><p>Dashboard</p>
        </a>
    </li>

    <li class="nav-item has-treeview">
        <a class="nav-link " href="#"><i class="nav-icon far fa-folder"></i><p>Master<i class="right fa fa-angle-left"></i> </p></a>
        <ul class="nav nav-treeview" style="display: none;">
           
            <li class="nav-item">
                <a class="nav-link" href="<?= url('/mst-dokter/index'); ?>">
                    <i class="nav-icon far fa-circle"></i><p>Dokter</p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= url('/mst-pasien/index'); ?>">
                    <i class="nav-icon far fa-circle"></i><p>Pasien</p>
                </a>
            </li>

        </ul>
    </li>

    <li class="nav-item has-treeview">
        <a class="nav-link " href="#"><i class="nav-icon far fa-folder"></i><p>Janji Temu<i class="right fa fa-angle-left"></i> </p></a>
        <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
                <a class="nav-link" href="<?= url('/janjitemu-janjitemu/index'); ?>">
                    <i class="nav-icon far fa-circle"></i><p>Janji Temu</p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= url('/janjitemu-jadwal/index'); ?>">
                    <i class="nav-icon far fa-circle"></i><p>Jadwal Dokter</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= url('/janjitemu-jadwal-rincian/index'); ?>">
                    <i class="nav-icon far fa-circle"></i><p>Janji Temu Jadwal Rincian</p>
                </a>
            </li>


        </ul>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= url('/auth/logout'); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon fa fa-sign-out-alt"></i>  <p>Logout</p>
        </a>
        <form id="logout-form" action="{{ url('/auth/logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>
