<?php

session_start();



?>

<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Dashboard | Truck Quest</title>





  <?php include 'header_links.php';?>

</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">

  <!-- Navbar -->



  <?php include 'header.php';?>

  <!-- /.navbar -->



  <!-- Main Sidebar Container -->



  <?php include 'sidebar.php';?>



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Reports</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>



            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="container-fluid">

        <h5 class="mb-2">Counts</h5>

        <div class="row">

          <div class="col-md-3 col-sm-6 col-12">

            <div class="info-box">

              <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>



              <div class="info-box-content">



                <?php

$users = 0;

$stmt = $dbConn->prepare("SELECT count(*) as users FROM users where   status !='D'    order by id desc");

$stmt->execute();

$count = $stmt->rowCount();

if ($count > 0) {

    $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $users = $fetch_data[0]['users'];

}

?>

                <span class="info-box-text">User(s)</span>

                <span class="info-box-number"><?=$users?></span>

              </div>

              <!-- /.info-box-content -->

            </div>

            <!-- /.info-box -->

          </div>

          <!-- /.col -->

          <div class="col-md-3 col-sm-6 col-12">

            <div class="info-box">

              <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>



              <div class="info-box-content">



                <?php

$reminder = 0;

$stmt = $dbConn->prepare("SELECT count(*) as reminder FROM reminder where   status !='D'    order by id desc");

$stmt->execute();

$count = $stmt->rowCount();

if ($count > 0) {

    $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $reminder = $fetch_data[0]['reminder'];

}

?>

                <span class="info-box-text">Reminder(s)</span>

                <span class="info-box-number"><?=$reminder?></span>

              </div>

              <!-- /.info-box-content -->

            </div>

            <!-- /.info-box -->

          </div>

          <!-- /.col -->

          <div class="col-md-3 col-sm-6 col-12">

            <div class="info-box">

              <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>



              <div class="info-box-content">



                <?php

$vehicle = 0;

$stmt = $dbConn->prepare("SELECT count(*) as vehicle FROM vehicle where   status !='D'    order by id desc");

$stmt->execute();

$count = $stmt->rowCount();

if ($count > 0) {

    $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $vehicle = $fetch_data[0]['vehicle'];

}

?>

                <span class="info-box-text">Vehicle(s)</span>

                <span class="info-box-number"><?=$vehicle?></span>

              </div>

              <!-- /.info-box-content -->

            </div>

            <!-- /.info-box -->

          </div>

          <!-- /.col -->

          <div class="col-md-3 col-sm-6 col-12">

            <div class="info-box">

              <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>



              <div class="info-box-content">



          <?php

      $locations = 0;

      $stmt = $dbConn->prepare("SELECT count(*) as locations FROM locations where   status !='D'    order by id desc");

      $stmt->execute();

      $count = $stmt->rowCount();

      if ($count > 0) {

          $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

          $locations = $fetch_data[0]['locations'];

      }

      ?>

          <span class="info-box-text">Locations</span>

          <span class="info-box-number"><?=$locations?></span>

          </div>

              <!-- /.info-box-content -->

            </div>

            <!-- /.info-box -->

          </div>

          <!-- /.col -->

        </div>

        <!-- /.row -->



        <!-- Small Box (Stat card) -->

        <h5 class="mb-2 mt-4">Request(s)</h5>

        <div class="row">

          <div class="col-lg-3 col-6">

            <!-- small card -->

            <div class="small-box bg-info">

              <div class="inner">

              <?php

              $requests = 0;

              $stmt = $dbConn->prepare("SELECT count(*) as requests FROM requests where   status !='D'    order by id desc");

              $stmt->execute();

              $count = $stmt->rowCount();

              if ($count > 0) {

                  $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

                  $locations = $fetch_data[0]['requests'];

              }

              ?>

                <h3><?=$locations?></h3>



                <p>Total Bookings</p>

              </div>

              <div class="icon">

                <i class="fas fa-shopping-cart"></i>

              </div> 

            </div>

          </div>

          <!-- ./col -->

          <div class="col-lg-3 col-6">

            <!-- small card -->

            <div class="small-box bg-success">

              <div class="inner">

                <?php

              $carrier_request = 0;

              $stmt = $dbConn->prepare("SELECT count(*) as carrier_request FROM carrier_request where   status !='D'    order by id desc");

              $stmt->execute();

              $count = $stmt->rowCount();

              if ($count > 0) {

                  $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

                  $carrier_request = $fetch_data[0]['carrier_request'];

              }

              ?>

                <h3><?=$carrier_request?></h3>

                <p>Carrier Request(s)</p>

              </div>

              <div class="icon">

                <i class="ion ion-stats-bars"></i>

              </div> 

            </div>

          </div>

          <!-- ./col -->

            <!-- ./col -->

          <div class="col-lg-3 col-6">

            <!-- small card -->

            <div class="small-box bg-success">

              <div class="inner">

                <?php

              $driver = 0;

              $stmt = $dbConn->prepare("SELECT count(*) as driver FROM driver where   status !='D'    order by id desc");

              $stmt->execute();

              $count = $stmt->rowCount();

              if ($count > 0) {

                  $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

                  $driver = $fetch_data[0]['driver'];

              }

              ?>

                <h3><?=$driver?></h3>

                <p>Drivers</p>

              </div>

              <div class="icon">

                <i class="ion ion-stats-bars"></i>

              </div> 

            </div>

          </div>

          <!-- ./col -->

            <!-- ./col -->

          <div class="col-lg-3 col-6">

            <!-- small card -->

            <div class="small-box bg-success">

              <div class="inner">

                <?php

              $vehicle_group = 0;

              $stmt = $dbConn->prepare("SELECT count(*) as vehicle_group FROM vehicle_group where   status !='D'    order by gr_id desc");

              $stmt->execute();

              $count = $stmt->rowCount();

              if ($count > 0) {

                  $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

                  $vehicle_group = $fetch_data[0]['vehicle_group'];

              }

              ?>

                <h3><?=$vehicle_group?></h3>

                <p>Fleet Size(s)</p>

              </div>

              <div class="icon">

                <i class="ion ion-stats-bars"></i>

              </div> 

            </div>

          </div>

          <!-- ./col -->
            <!-- ./col -->

          <div class="col-lg-3 col-6">

            <!-- small card -->

            <div class="small-box bg-success">

              <div class="inner">

                <?php

              $vehicle_group = 0;

              $stmt = $dbConn->prepare("SELECT sum(amt) as earnings FROM bookings where   status !='Cancelled'    order by id desc");
              $stmt->execute();

              $count = $stmt->rowCount();

              if ($count > 0) {

                  $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

                  $vehicle_group = $fetch_data[0]['earnings'];

              }

              ?>

                <h3>$<?=$vehicle_group?></h3>

                <p>Earnings</p>

              </div>

              <div class="icon">

                <i class="ion ion-stats-bars"></i>

              </div> 

            </div>

          </div>

          <!-- ./col -->

            

        </div>

        <!-- /.row -->





      </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->



    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">

      <i class="fas fa-chevron-up"></i>

    </a>

  </div>

  <!-- /.content-wrapper -->





  <?php include 'footer.php';?>



  <!-- Control Sidebar -->

  <aside class="control-sidebar control-sidebar-dark">

    <!-- Control sidebar content goes here -->

  </aside>

  <!-- /.control-sidebar -->

</div>

<!-- ./wrapper -->



<!-- jQuery -->



<?php include 'footer_links.php';?>

</body>

</html>

