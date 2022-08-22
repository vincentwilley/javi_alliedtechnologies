<?php
require('connection.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// date_default_timezone_set('Asia/Kolkata');

if(!isset($_SESSION['admin_id@login_trucker'])){
  ?>
  <script>
   window.location.href = 'index.php';
   </script>
  <?php
}
?>


<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
       
    </ul> 
  </nav>