<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Signin</title>

    <link rel="canonical" href="#">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/bootstrap.min.css') ?>">
    <script src="<?= base_url('assets\plugins\jquery\jquery-3.5.1.min.js'); ?>"></script>
    <link href="<?= base_url('assets/plugins/sweet-alert/sweetalert2.min.css'); ?>" rel="stylesheet" type="text/css">
    <script src="<?= base_url('assets/plugins/sweet-alert/sweetalert2.min.js'); ?>"></script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap5_component/sign-in/signin.css') ?>">
  </head>
  <body class="text-center">

<main class="form-signin">
    <img class="mb-4" src="<?= base_url('assets/brand/bootstrap-logo.svg') ?>" alt="" width="72" height="57" style="transform:rotate(-20deg);">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    <!-- email/username -->
    <label class="visually-hidden">Username</label>
    <input type="email" id="txtkode" class="form-control" placeholder="username" required autofocus>
    <!-- pass -->
    <label class="visually-hidden">Password</label>
    <input type="password" id="txtpass" class="form-control" placeholder="Password" required>

    <!-- <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div> -->
    <br>
    <button class="w-100 btn btn-lg btn-info" onclick="login()">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; Satria Nugraha</p>
    <p class="ip">your ip : <?php echo $_SERVER["REMOTE_ADDR"]; ?></p>
    <input type="text" id="txtip" value="<?php echo $_SERVER["REMOTE_ADDR"]; ?>" hidden>
</main>


  <script>
  function dashboard() {
    window.location = '<?= base_url('dash'); ?>';
  }

  function login() {
    var u = $("#txtkode").val();
    var p = $("#txtpass").val();

    if (u == "" || p == "") {
      swal({
        title: 'Login Gagal',
        text: 'Ada Isian yang Masih Kosong !',
        type: 'error',
        confirmButtonClass: 'btn btn-confirm mt-2'
      });
      return;
    }

    $.ajax({
      url: "<?= base_url('auth/login'); ?>",
      method: "POST",
      data: {
        u: u,
        p: p,
      },
      cache: "false",
      success: function (x) {
        if (x == 1) {
          window.location = "<?= base_url('maincontroller'); ?>";
        } else {
          swal({
            title: 'Login Gagal',
            text: 'Kemungkinan Username dan Password Salah atau Status Akun Tidak Aktif',
            type: 'error',
            confirmButtonClass: 'btn btn-confirm mt-2'
          });
          return;
        }
      }
    })
  }

  function pindahpass() {
    if (event.keyCode === 13) {
      $("#txtpass").focus();
    }
  }

  function pindahlogin() {
    if (event.keyCode === 13) {
      login();
    }
  }
  </script>


  </body>
</html>
