<?php
$menu 		= $this->uri->segment(1);
$sub_menu 	= $this->uri->segment(2);
$sub_menu3  = $this->uri->segment(3);
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>" class="brand-link">
        <img src="<?php echo base_url(); ?>/assets/dist/img/polsri.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-1" style="opacity: .8">
        <span class="brand-text font-weight-light">AMAI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url(); ?>/assets/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $this->session->userdata('nama')?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="<?= base_url();?>dashboard" class="nav-link <?php if ($menu == "dashboard") {
																echo 'active';
															} ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <?php if ($user->row()->level == 's_admin'|| $user->row()->level == 'pimpinan') { ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Rekapitulasi Per Prodi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- Sidebar Teknik Sipil -->
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <p>
                                    Teknik Sipil
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link <?php if ($sub_menu == "d3tekniksipil") {
																echo 'active';
															} ?>">
                                        <p>D3 Teknik Sipil</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>D4 Percancangan Jalan dan Jembatan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Sidebar Teknik Mesin -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>
                                    Teknik Mesin
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>D3 Teknik Mesin</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>D4 Teknik Mesin Produksi dan Perawatan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Sidebar Teknik Elektro -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>
                                    Teknik Elektro
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>D3 Teknik Listrik</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>D3 Teknik Elektronika</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>D3 Teknik Telekomunikasi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>D4 Teknik Telekomunikasi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>D4 Teknik Elektro</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Sidebar Teknik Kimia -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>
                                    Teknik Kimia
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>D3 Teknik Kimia</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>D4 Teknik Energi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>D4 Teknologi Kimia Industri</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>S2 Teknik Energi Terbarukan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Sidebar Akuntansi -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>
                                    Akuntansi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>D3 Akuntansi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>D4 Akuntansi Sektor Publik</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Sidebar Administrasi Bisnis -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>
                                    Administrasi Bisnis
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>D3 Administrasi Bisnis</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>D4 Manajemen Bisnis</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>D4 Usaha Perjalanan Wisata</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Sidebar Teknik Komputer -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>
                                    Teknik Komputer
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>D3 Teknik Komputer</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>D4 Teknologi Informatika Multimedia Digital</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Sidebar Manajemen Informatika -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>
                                    Manajemen Informatika
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>D3 Manajemen Informatika</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>D4 Manajemen Informatika</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Sidebar Bahasa Inggris -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>
                                    Bahasa Inggris
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>D3 Bahasa Inggris</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <?php
			    } ?>
                <?php if ($user->row()->level == 'auditor') { ?>
                <li class="nav-item">
                    <a href="<?= base_url();?>rekapstandar" class="nav-link <?php if ($menu == "rekapstandar") {
																echo 'active';
															} ?>">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Rekapitulasi Standar
                        </p>
                    </a>
                </li>
                <?php
			    } ?>
                <?php if ($user->row()->level == 'auditor') { ?>
                <li class="nav-item">
                    <a href="<?= base_url();?>grafikstandar" class="nav-link <?php if ($menu == "grafikstandar") {
																echo 'active';
															} ?>">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Grafik Standar
                        </p>
                    </a>
                </li>
                <?php
			    } ?>
                <?php if ($user->row()->level == 'auditor' || $user->row()->level == 'auditee') { ?>
                <li class="nav-item">
                    <a href="<?= base_url();?>buktifisik" class="nav-link <?php if ($menu == "buktifisik") {
																echo 'active';
															} ?>">
                        <i class="nav-icon fas fa-file-archive"></i>
                        <p>
                            Bukti Fisik
                        </p>
                    </a>
                </li>
                <?php
			    } ?>
                 <?php if ($user->row()->level == 's_admin') { ?>
                <li class="nav-item">
                    <a href="<?= base_url();?>editstandar" class="nav-link <?php if ($menu == "editstandar") {
																echo 'active';
															} ?>">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Edit Standar
                        </p>
                    </a>
                </li>
                <?php
			    } ?>
                <?php if ($user->row()->level == 's_admin') { ?>
                <li class="nav-item">
                    <a href="#" class="nav-link <?php if ($menu == "manajemenakun") {
																echo 'active';
															} ?>">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Manajemen Akun
                        </p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= base_url();?>manajemenakun/pimpinan" class="nav-link <?php if ($sub_menu == "pimpinan") {
																echo 'active';
															} ?>">
                            <p>Pimpinan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url();?>manajemenakun/auditor" class="nav-link <?php if ($sub_menu == "auditor") {
																echo 'active';
															} ?>">
                            <p>Auditor</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url();?>/manajemenakun/auditee" class="nav-link <?php if ($sub_menu == "auditee") {
																echo 'active';
															} ?>">
                            <p>Auditee</p>
                        </a>
                    </li>
                </ul>
                </li>
                <?php
			    } ?>
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>