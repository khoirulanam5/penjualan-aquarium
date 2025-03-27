<nav class="main-header navbar navbar-expand navbar-black navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link"><?php echo  $title?></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user-circle fa-lg"></i> <!-- Icon User -->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="<?= base_url("akun") ?>" class="dropdown-item">
                <i class="fas fa-user mr-2"></i> Akun
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url() ?>login/logout" class="dropdown-item text-danger">
                <i class="fas fa-power-off mr-2"></i> Logout
            </a>
        </div>
    </li>
    </ul>
</nav>
