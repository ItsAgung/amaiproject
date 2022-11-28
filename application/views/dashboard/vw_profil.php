<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Profil Pengguna</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Profil Pengguna</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-user mr-1"></i>
                                    Profil
                                </h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                            <?php
                            foreach ($user->result() as $baris) {
                            ?>
                                <div class="img-profile d-flex justify-content-center">
                                    <img src="assets/dist/img/user.png" class="elevation-2 img-circle">
                                </div>
                                <h3 class="text-center mt-2 fw-bold"><?php echo $baris->nama_lengkap; ?></h3>
                                <p class="text-center"><?php echo $baris->level; ?></p>
                                <hr class="bg-light">
                                <table>
                                    <thead>
                                        <tr>
                                            <th width="140px"><i class="fas fa-calendar mr-1"></i> Terdaftar Sejak</th>
                                            <td width="10px">:</td>
                                            <td><?php echo $baris->tgl_daftar; ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="far fa-calendar mr-1"></i> Terakhir Login</th>
                                            <td>:</td>
                                            <td><?php echo $baris->terakhir_login; ?></td>
                                        </tr>
                                    </thead>
                                </table>
                            </div><!-- /.card-body -->
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-key mr-1"></i>
                                    Ganti Kata Sandi
                                </h3>
                            </div><!-- /.card-header -->
                            <div class="card-body pb-0">
                                <form action="" method="">
                                    <div class="form-group mb-2 mt-0">
                                        <label for="oldpassword">Kata Sandi Lama</label>
                                        <input type="password" class="form-control" id="oldpassword">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="newpassword">Kata Sandi Baru</label>
                                        <input type="password" class="form-control" id="newpassword">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="newpassword">Konfirmasi Kata Sandi Baru</label>
                                        <input type="password" class="form-control" id="newpassword">
                                    </div>
                                    <div class=" d-flex justify-content-end mb-0 pb-0">
                                        <button class="btn btn-primary" type="submit" name=""><i class="fa fa-key"></i> Ubah Kata Sandi</button>
                                    </div>
                                </form>
                            </div><!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-user-cog mr-1"></i>
                                    Identitas Pengguna
                                </h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                            <?php
                            echo $this->session->flashdata('msg');
                            ?>
                            
                                <form action="<?= base_url();?>profil/prosesupdate/<?=$baris->id_user;?>" method="post">
                                    <div class="form-group mb-3">
                                        <label for="username">Nama Pengguna</label>
                                        <input type="text" name="username" class="form-control" value="<?php echo $baris->username; ?>" id="username" readonly>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" name="nama" class="form-control" value="<?php echo $baris->nama_lengkap; ?>" id="nama">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" value="<?php echo $baris->email; ?>" id="email">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="notelp">Telepon</label>
                                        <input type="text" name="telp" class="form-control" value="<?php echo $baris->telp; ?>" id="notelp">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="hak">Hak Akses</label>
                                        <input type="text" class="form-control" id="hak" value="<?php echo $baris->level; ?>" name="level" readonly>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="jurusan">Jurusan</label>
                                        <input type="text" class="form-control" id="jurusan" value="<?php echo $baris->jurusan; ?>" name="jurusan" readonly>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="prodi">Program Studi Kentang</label>
                                        <input type="text" class="form-control" id="prodi" value="<?php echo $baris->prodi; ?>" name="prodi" readonly>
                                    </div>
                                    <div class=" d-flex justify-content-end">
                                        <button class="btn btn-primary" type="submit" name="btnupdate"><i class="fa fa-save"></i> Simpan</button>
                                    </div>
                                </form>
                                <?php
                                } ?>
                            </div><!-- /.card-body -->
                        </div>
                    </div>
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
