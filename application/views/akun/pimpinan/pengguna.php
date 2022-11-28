<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Akun Pimpinan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Akun Pimpinan</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Akun Yang Terdaftar</h3>
                        <div class="col-md-12 text-right">
                        <a href="<?= base_url();?>/manajemenakun/pimpinan/t" class="btn btn-xs btn-success" style="margin-top: 5px;"><span class="glyphicon glyphicon-random" aria-hidden="true"></span><b>&nbsp; TAMBAH PIMPINAN</b></a>
                        </div>
                        <?= $this->session->flashdata('msg');?>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover" style="font-size: 12px;">
                            <thead class="text-center">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Pengguna</th>
                                    <th>Nama Lengkap</th>
                                    <th>Hak Akses</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Terakhir Masuk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php
                            $no = 1;
                            foreach ($level_users->result() as $baris) {
                            ?>
                                <tr>
                                    <td class="align-middle"><?php echo $no . '.'; ?></td>
                                    <td class="align-middle"><?php echo $baris->username; ?></td>
                                    <td class="align-middle"><?php echo $baris->nama_lengkap; ?></td>
                                    <td class="align-middle"><?php echo $baris->level; ?></td>
                                    <td class="align-middle"><?php if ($baris->tgl_daftar == "") {
                                                                echo "-";
                                                                } else {
                                                                echo $baris->tgl_daftar;
                                                                } ?></td>
                                    <td class="align-middle"><?php if ($baris->terakhir_login == "") {
                                                                echo "-";
                                                                } else {
                                                                echo $baris->terakhir_login;
                                                                } ?></td>
                                    <td>
                                        <a href="<?= base_url();?>/manajemenakun/pimpinan/d/<?php echo $baris->id_user; ?>" class="btn btn-info btn-sm p-1 text-light"  style="font-size:12px;"><i class="far fa-eye"></i> </a>
                                        <a href="<?= base_url();?>/manajemenakun/pimpinan/e/<?php echo $baris->id_user; ?>" class="btn btn-warning btn-sm p-1 text-light" style="font-size:12px;"><i class="far fa-edit"></i> </a>
                                        <a href="<?= base_url();?>/manajemenakun/pimpinan/h/<?php echo $baris->id_user; ?>" class="btn btn-danger btn-sm p-1 text-light" style="font-size:12px;"><i class="fas fa-trash"></i> </a>
                                    </td>
                                </tr>
                            <?php
                            $no++;
                            } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </section>
            <!-- /.content -->
        </div>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
