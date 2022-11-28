<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo base_url();?>/assets/dist/img/polsri.png" alt="logopolsri" height="100" width="100">
</div>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <?php
            foreach ($user->result() as $baris) {
            ?>
            <a class="nav-link" data-toggle="dropdown" href="#">
            <img src="<?php echo base_url();?>/assets/dist/img/user.png" class="img-circle" alt="User Image" width="30px"> <?php echo $baris->username; ?><i class="fas fa-caret-down ml-2"></i>
            </a>
            <?php
             } ?>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header"><img src="<?php echo base_url();?>/assets/dist/img/user.png" class="img-circle" alt="User Image" width="30px">Username</span>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url();?>profil" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Profil
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url();?>autentikasi/logout" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                </a>
                
            </div>
        </li>
    </ul>
</nav>