<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Edit Standar</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Standar</li>
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
                        <h3 class="card-title">Nama Standar</h3>
                    </div>
                    <div class="card-body">
                    <?= $this->session->flashdata('msg');?>
                        <form action="<?php echo base_url();?>/editstandar/proses" method="post">
                        <table class="table table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th style="width: 10px">No.</th>
                                    <th>Nama Standar</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($namastandar->result() as $standar) : ?>
                                <tr>
                                    <td class="align-middle text-center"><?= $standar->id_standar?>.</td>
                                    <td class="align-middle"><input type="text" class="form-control" name="standar<?= $standar->id_standar?>" value="<?= $standar->nama_standar?>"></td>
                                </tr>
                             <?php endforeach ?>
                            </tbody>
                            
                        </table>
                        <div class=" d-flex justify-content-end mb-0 pb-0">
                         <button class="btn btn-primary" type="submit" name="btnupdate"><i class="fa fa-arrow"></i> UPDATE</button>
                        </div>
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
