<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php
        $data["title"] = "Aquarium";
        $data["menu"]  = $menu;
?>
    </title>
    <?php $this->load->view("Css"); ?>
</head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<body class="hold-transition login-page">
<div class="login-box" style="width: 500px; margin: auto;"> <!-- Ubah ukuran login-box -->
  <div class="card card-outline card-dark" style="padding: 70px;"> <!-- Ubah ukuran card -->
    <div class="card-header text-center">
      <h2 class="col-md-12">SHOPFISH AQUARIUM</h2>
      <small class="col-md-12">Alamat : Jl. Bae - Besito, Kecamatan. Gebog, Kabupaten Kudus, Jawa Tengah 59333.</small>
    </div>
    <div class="card-body">
<!-- Cek jika ada flashdata bernama 'message' -->
<?php if ($this->session->flashdata('message')): ?>
    <script>
        // Cetak flashdata sebagai script JS
        <?= $this->session->flashdata('message'); ?>
    </script>
    <?php 
    // Hapus flashdata setelah ditampilkan
    $this->session->unset_userdata('message'); 
    ?>
<?php endif; ?>
      <div class="text-danger text-center">
            <?php
            if (isset($salah['code'])=='404' || isset($salah['code'])=='10') {
              ?>
              <script src="<?=base_url('src/js/sweetalert2.js')?>"></script>
              <script> 
              if ( <?=$salah['code']?>=='10') {
                  Swal.fire('Email Sudah Terdaftar', 'Silahkan ulangi!', 'error'); 
              }else if( <?=$salah['code']?>=='404'){
                  Swal.fire('Captcha Salah', 'Silahkan ulangi!', 'error'); 
              }
            </script>
              <?php
            } 
          ?>
      <div class="text-danger text-center">
      </div>
      </div>
      <form action="<?=base_url()?>login/cek" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" autocomplete="off" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" autocomplete="off" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-dark btn-block">Masuk</button>
          </div>
          <div>
            <a class="btn btn-dark" href="<?= base_url('register'); ?>">Daftar</a>
          </div>
        </div>
      </form>
      <p class="mb-1">
        <a href="forgot-password.html"></a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center"></a>
      </p>
    </div>
  </div>
</div>
</html>
