<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Akun Auditor</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Akun Auditor</li>
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
                        <h3 class="card-title">Tambah Auditor</h3>
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
                        <option value="Auditor" selected>Auditor</option>
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
                    <label class="control-label col-lg-3">Jurusan</label>
                    <div class="col-lg-9">
                    <select class="form-control" id="jurusan" name="jurusan" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value);" required>
                        <option value="" disabled selected>- Pilih Jurusan -</option>
                        <option value="Teknik Sipil">Teknik Sipil</option>
                        <option value="Teknik Mesin">Teknik Mesin</option>
                        <option value="Teknik Elektro">Teknik Elektro</option>
                        <option value="Teknik Kimia">Teknik Kimia</option>
                        <option value="Akuntansi">Akuntansi</option>
                        <option value="Administrasi Bisnis">Administrasi Bisnis</option>
                        <option value="Teknik Komputer">Teknik Komputer</option>
                        <option value="Manajemen Informatika">Manajemen Informatika</option>
                        <option value="Bahasa Inggris">Bahasa Inggris</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-3">Program Studi yang Di Audit</label>
                    <div class="col-lg-9">
                    <select id="genDropdown" class="form-control" name="prodi" required>
                        <option value="" disabled selected>- Pilih Program Studi -</option>
                      </select>
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

                  <a href="<?= base_url();?>/manajemenakun/auditor" class="btn btn-default"><< Kembali</a>
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

    <script>
    function doHTML(list){
      let string ="";
      let index = 0;
      list.forEach(element => {
        string += `<option value="${element}">${element}</option>`;
        
      });
      return string;
    }
    function dynamicdropdown(jurusan){
      let subjects1 = ["D3 Teknik Sipil", "D4 Perancangan Jalan dan Jembatan"];
      let subjects2 = ["D3 Teknik Mesin", "D4 Teknik Mesin Produksi dan Perawatan"];
      let subjects3 = ["D3 Teknik Listrik", "D3 Teknik Elektronika", "D3 Teknik Telekomunikasi", "D4 Teknik Telekomunikasi", "D4 Teknik Elektro"];
      let subjects4 = ["D3 Teknik Kimia", "D4 Teknik Energi", "D4 Teknologi Kimia Industri", "S2 Teknik Energi Terbarukan"];
      let subjects5 = ["D3 Akuntansi", "D4 Akuntansi Sektor Publik"];
      let subjects6 = ["D3 Administrasi Bisnis", "D4 Manajemen Bisnis", "D4 Usaha Perjalanan Wisata"];
      let subjects7 = ["D3 Teknik Komputer", "D4 Teknologi Informatika Multimedia Digital"];
      let subjects8 = ["D3 Manajemen Informatika", "D4 Manajemen Informatika"];
      let subjects9 = ["D3 Bahasa Inggris"];
      let genDropdown = document.getElementById("genDropdown");
      if(jurusan=="Teknik Sipil"){
        genDropdown.innerHTML = doHTML(subjects1);
      }
      if(jurusan=="Teknik Mesin"){
        genDropdown.innerHTML = doHTML(subjects2);
      }
      if(jurusan=="Teknik Elektro"){
        genDropdown.innerHTML = doHTML(subjects3);
      }
      if(jurusan=="Teknik Kimia"){
        genDropdown.innerHTML = doHTML(subjects4);
      }
      if(jurusan=="Akuntansi"){
        genDropdown.innerHTML = doHTML(subjects5);
      }
      if(jurusan=="Administrasi Bisnis"){
        genDropdown.innerHTML = doHTML(subjects6);
      }
      if(jurusan=="Teknik Komputer"){
        genDropdown.innerHTML = doHTML(subjects7);
      }
      if(jurusan=="Manajemen Informatika"){
        genDropdown.innerHTML = doHTML(subjects8);
      }
      if(jurusan=="Bahasa Inggris"){
        genDropdown.innerHTML = doHTML(subjects9);
      }

    }
  </script>