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
                        <h3 class="card-title">Tambah Pimpinan</h3>
                    </div>
                    <div class="card-body">
                <?php
                echo $this->session->flashdata('msg');
                ?>
                <form class="form-horizontal" action="" method="post">
                  <div class="form-group">
                    <label class="control-label col-lg-3">Hak Akses</label>
                    <div class="col-lg-9">
                      <select class="form-control" name="level" required readonly>
                        <option value="Pimpinan" selected>Pimpinan</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-3">Nama Pengguna</label>
                    <div class="col-lg-9">
                      <input type="text" name="username" class="form-control" value="" placeholder="Nama Pengguna" maxlength="100" required>
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="control-label col-lg-3">Katasandi</label>
                    <div class="col-lg-9">
                      <input type="password" name="password" class="form-control" value="" placeholder="Katasandi" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-3">Ulangi Katasandi</label>
                    <div class="col-lg-9">
                      <input type="password" name="password2" class="form-control" value="" placeholder="Ulangi Katasandi" required>
                    </div>
                  </div>

                  <a href="<?= base_url();?>/manajemenakun/pimpinan" class="btn btn-default"><< Kembali</a>
                  <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Simpan</button>
                </form>

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
