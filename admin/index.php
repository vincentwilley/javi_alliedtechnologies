<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Truckers | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="index2.html"><b>Admin</b> Truckers</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="#" method="post">
          <div class="input-group mb-3">
            <input type="text" name="username" maxlength="20" class="form-control" placeholder="Username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" maxlength="20" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">

            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Toastr -->
  <script src="plugins/toastr/toastr.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <?php 
    require('connection.php');
// print_r($_POST);
// echo $hash_password = trim(hash('sha256', "Truck@123"));
  if (isset($_POST['login'])) {

    $username = $_POST['username'] ?? "";
    $password = $_POST['password'] ?? "";  // 1234   - sjdskhowqeasdasdqwdqwe532558 - 
    $hash_password = trim(hash('sha256', $password));
    // echo $hash_password ;
    $sql = $dbConn->prepare("SELECT `id` FROM `admin` WHERE (username=:username and password =:password)  ");
    $sql->bindParam(":username", $username, PDO::PARAM_STR);
    $sql->bindParam(":password", $hash_password, PDO::PARAM_STR);
    $sql->execute();
    $count = $sql->rowCount();
    // $sql->debugDumpParams();
    if ($count > 0) {
      $fetched_array = $sql->fetchAll(PDO::FETCH_ASSOC);
      // for ($i = 0; $i < $count; $i++) {
      $_SESSION['admin_id@login_trucker'] = $fetched_array[0]['id'];
  ?>
      <script>
        $(document).Toasts('create', {
          class: 'bg-success',
          title: 'Login',
          subtitle: 'close',
          body: 'Login Completed, please wait...'
        });
        window.location.href='dashboard.php';
      </script>
    <?php
      // }
    } else {
    ?>
      <script>
        $(document).Toasts('create', {
          class: 'bg-danger',
          title: 'Login',
          subtitle: 'close',
          body: 'Login failed, invalid username or password'
        });
      </script>
  <?php

    }
  }
  ?>
</body>

</html>