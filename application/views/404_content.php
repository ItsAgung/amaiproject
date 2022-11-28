<!DOCTYPE html>
<html>

<head>
  <base href="<?php echo base_url(); ?>" />
  <link href="<?= base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <meta charset="utf-8">
  <title>Halaman tidak ditemukan</title>
  <link rel="icon" type="image/png" href="<?= base_url();?>images/error-404.png">
</head>

<body>
  <center>
    <br><br><br><br><br><br>

    <img src="<?= base_url();?>assets/images/error-404.png" alt="" />

    <br><br>
    <div class="error-text">
      <span>halaman yang Anda minta</span>
      <span class="large-text">tidak dapat ditemukan</span>
    </div><br>

    <a class="back-home btn btn-sm btn-success" href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span><b>&nbsp;&nbsp; HALAMAN UTAMA</b></a>
  </center>
</body>

</html>