<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Bukti Fisik Auditee</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Bukti Fisik Auditee</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="card">
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover" style="font-size: 16px;">
                            <thead class="text-center">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Standar</th>
                                    <th>Tautan</th>
                                    <th>Tanggal Ditetapkan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td class="align-middle">1</td>
                                    <td class="align-middle">Standar 2 : ajdhlaiwdhlaiehdlaehdliaedhlhae</td>
                                    <td class="align-middle">
                                        <a href="#" class="btn btn-info text-light" style="font-size:16px;"><i class="fas fa-link"></i></a>
                                    </td>
                                    <td class="align-middle">17-10-2022</td>
                                    <td>
                                        <a href="#" class="btn btn-warning text-light" style="font-size:16px;" data-toggle="modal" data-target="#exampleModal"><i class="far fa-edit"></i></a>
                                    </td>
                                </tr>
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

    <!-- Modal Tambah -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Tambah Bukti Fisik Auditee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form class="mt-1 px-5" method="post" action="">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Deskripsi</label>
                            <textarea class="form-control" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="tautan" class="form-label">Tautan Terkait</label>
                            <input type="text" class="form-control" id="tautan" name="tautan">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-plus"></i> Tambah</Button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>