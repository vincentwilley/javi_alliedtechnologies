<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loose Cargo | Dashboard</title>
    <?php include 'header_links.php';?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <span style="font-weight: 500; font-size: 1.4em;" class="animation__shake">Loading please wait...</span>
            <!-- <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"> -->
        </div>

        <!-- Navbar -->
        <?php include 'header.php';?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include 'sidebar.php';?>

        <!-- Content Wrapper. Contains page content -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Create Bookings</h1>
                        </div>
                        <!--<div class="col-sm-6">-->
                        <!--    <ol class="breadcrumb float-sm-right">-->
                        <!--        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>-->
                        <!--        <li class="breadcrumb-item active">Broadcast Details</li>-->
                        <!--    </ol>-->
                        <!--</div>-->
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
      <div class="container-fluid">
        <form method="post" id="add_driver" class="card"  action="api/create_bookings.php"   >
                <div class="card-body">


                  <div class="row">
                   <input type="hidden" name="d_id" id="d_id" value="" autocomplete="off" required>

                    <div class="col-sm-6 col-md-3">

                      <div class="form-group">
                      <label class="form-label">Customer<span  class="form-required" style="color:red">*</span></label>
                        <select name="user_id" id="car-select" class="form-control" required>
                            <option value="">Select Customer <span style="color:red">*</span></option>
                                <?php
$stmt = $dbConn->prepare("SELECT * FROM `users` where status = 'A' ");
$stmt->execute();
$count = $stmt->rowCount();
if ($count > 0) {
    $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    for ($i = 0; $i < $count; $i++) {
        ?>
                                        <option value="<?=$fetch_data[$i]["id"]?>"><?=$fetch_data[$i]["name"] . " - " . $fetch_data[$i]["contact"]?></option>
                                        <?php
}
}

?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                        <label class="form-label">Vehicle<span  class="form-required" style="color:red">*</span></label>
                            <select name="vehicle_id" id="car-select" class="form-control" required>
                                <option value="">Select Vehicle <span style="color:red">*</span></option>
                                    <?php
$stmt = $dbConn->prepare("SELECT * FROM `vehicle` where status = 'A' ");
$stmt->execute();
$count = $stmt->rowCount();
if ($count > 0) {
    $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    for ($i = 0; $i < $count; $i++) {
        ?>
                                            <option value="<?=$fetch_data[$i]["id"]?>"><?=$fetch_data[$i]["name"]?></option>
                                            <?php
}
}

?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Driver<span  class="form-required" style="color:red">*</span></label>
                                <select name="driver_id" id="car-select" class="form-control" required>
                                    <option value="">Select Driver <span style="color:red">*</span></option>
                                        <?php
$stmt = $dbConn->prepare("SELECT * FROM `driver` where status = 'A' ");
$stmt->execute();
$count = $stmt->rowCount();
if ($count > 0) {
    $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    for ($i = 0; $i < $count; $i++) {
        ?>
                                                <option value="<?=$fetch_data[$i]["id"]?>"><?=$fetch_data[$i]["name"]?></option>
                                                <?php
}
}

?>
                                </select>
                            </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Trip Type<span  class="form-required" style="color:red">*</span></label>
                            <select name="trip_type" id="car-select" class="form-control" required>
                                <option value="">Select Trip Type <span style="color:red">*</span></option>
                                    <option value="One Way Trip">One Way Trip</option>
                                    <option value="Two Way Trip">Two Way Trip</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Start Location<span  class="form-required" style="color:red">*</span></label>
                                <select name="start_loc_id" id="car-select" class="form-control" required>
                                    <option value="">Select Driver <span style="color:red">*</span></option>
                                        <?php
$stmt = $dbConn->prepare("SELECT * FROM `locations` where status = 'A' ");
$stmt->execute();
$count = $stmt->rowCount();
if ($count > 0) {
    $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    for ($i = 0; $i < $count; $i++) {
        ?>
                                                <option value="<?=$fetch_data[$i]["id"]?>"><?=$fetch_data[$i]["title"]?></option>
                                                <?php
}
}

?>
                                </select>
                            </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label class="form-label">End Location<span  class="form-required" style="color:red">*</span></label>
                                <select name="end_loc_id" id="car-select" class="form-control" required>
                                    <option value="">Select Driver <span style="color:red">*</span></option>
                                        <?php
$stmt = $dbConn->prepare("SELECT * FROM `locations` where status = 'A' ");
$stmt->execute();
$count = $stmt->rowCount();
if ($count > 0) {
    $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    for ($i = 0; $i < $count; $i++) {
        ?>
                                                <option value="<?=$fetch_data[$i]["id"]?>"><?=$fetch_data[$i]["title"]?></option>
                                                <?php
}
}

?>
                                </select>
                            </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                        <label class="form-label">Approx Total KM<span  class="form-required" style="color:red">*</span></label>
                        <input type="text" name="approx_total_km" value="" class="form-control datepicker" placeholder="Enter Approx Total KM" autocomplete="off" required>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                        <label class="form-label">Trip Start Date</label>
                        <input type="date" name="start_date" value="" class="form-control" placeholder="Trip Start Date" autocomplete="off" required>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                        <label class="form-label">Trip End Date<span  class="form-required" style="color:red">*</span></label>
                        <input type="date" name="end_date" value="" class="form-control" placeholder="Trip End Date" autocomplete="off" required>

                    </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                        <label class="form-label">Total Amount($)<span  class="form-required" style="color:red">*</span></label>
                        <input type="number" min="0" name="amt" value="" class="form-control datepicker" placeholder="Date Amount in $" autocomplete="off" required>
                    </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="d_is_active" class="form-label">Trip Status</label>
                        <select id="d_is_active" name="status" class="form-control "  >
                          <option value="">Select Trip Status</option>
                          <option value="Created Booking" selected>Created Booking</option>
                          <option value="Trip Started">Trip Started</option>
                          <option value="In Transit">In Transit</option>
                          <option value="Delivered">Delivered</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                        <label class="form-label">Item Quantity<span  class="form-required" style="color:red">*</span></label>
                        <input type="text" name="qty" value="" class="form-control datepicker" placeholder="Enter Quantity" autocomplete="off" required>

                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                        <label class="form-label">Item Pack<span  class="form-required" style="color:red">*</span></label>
                        <input type="text" name="item_pack" value="" class="form-control datepicker" placeholder="Enter Item Pack" autocomplete="off" required>

                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                    <!-- checkbox -->
                    <div class="form-group clearfix">
                    <br>
                       
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" name="notify" value="Y" id="checkboxPrimary3"  >
                        <label for="checkboxPrimary3">
                        Send Booking confirmation to customer
                        </label>
                      </div>
                    </div>
                  </div>

                </div>
                  <input type="hidden" id="d_created_by" name="d_created_by" value="1" autocomplete="off" required>
                   <input type="hidden" id="d_created_date" name="d_created_date" value="2022-07-20 02:18:17" autocomplete="off" required>
                <div class="card-footer text-right">
                  <input type="hidden" class="btn btn-primary" name="bookings_add" value="add" required>
                  <button type="submit" class="btn btn-primary"> Add Booking</button>
                </div>
              </form>
             </div>
    </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Details</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th >S.No</th>
                                                <th >Tracking Code</th>
                                                <th >Customer Name</th>
                                                <th >Vehicle</th>
                                                <th >Driver</th>
                                                <th >Trip Type</th>
                                                <th >Start Date</th>
                                                <th >End Date</th>
                                                <th >Approx Total KM</th>
                                                <th >Trip Status</th>
                                                <th >Item Pack</th>
                                                <th >Qty</th>
                                                <th >Amount</th>
                                                <th >Created On</th>
                                                <th >Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                $stmt = $dbConn->prepare("SELECT b.id, b.track_code, u.name, u.contact, v.name as vehicle, d.name as driver, trip_type, l1.title as start, l2.title as end, approx_total_km, start_date, end_date, b.status, item_pack, qty, amt, b.created_on FROM bookings b inner join users u on u.id = b.user_id inner join vehicle v on v.id = b.vehicle_id inner join driver d on d.id = b.driver_id inner join locations l1 on l1.id = b.start_loc_id inner JOIN locations l2 on l2.id = b.end_loc_id order by b.id desc");
                $stmt->execute();
                $count = $stmt->rowCount();
                if ($count > 0) {
                    $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    for ($i = 0; $i < $count; $i++) { 
                            ?>
                                                    <tr>
                                                        <td><?=$sr = $i + 1?></td>
                                                        <td><h3><?=ucfirst($fetch_data[$i]['track_code'])?></h3></td>

                                                        <td><?=ucfirst($fetch_data[$i]['name'])."<br>".$fetch_data[$i]['contact']?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['vehicle'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['driver'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['trip_type'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['start'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['end'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['approx_total_km'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['status'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['item_pack'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['qty'])?></td>
                                                        <td><h3><?="$ ".ucfirst($fetch_data[$i]['amt'])?></h3></td>

                                                        <td><?=ucfirst($fetch_data[$i]['created_on'])?></td> 
                                                        <td><a href="api/delete_api.php?delete_bookings=vehicle&7thas=<?=$fetch_data[$i]['id']?>&status=Cancelled" class="btn-delete">Delete</a></td>

                                                    </tr>
                                                <?php
}
} else {
    ?>
                                                <tr>
                                                    <td colspan="5"> No Data found</td>

                                                </tr>
                                            <?php
}
?>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                        </div>
                        <!--/.col (left) -->

                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Footer -->
        <?php include 'footer.php';?>
    </div>
    <!-- ./wrapper -->
    <?php include 'footer_links.php';?>

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- ChartJS -->
    <!-- <script src="plugins/chart.js?key=1/Chart.min.js?key=1"></script> -->
    <!-- Sparkline -->
    <!-- <script src="plugins/sparklines/sparkline.js?key=1"></script> -->
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js?key=1"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js?key=1"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js?key=1"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js?key=1"></script>
    <script src="plugins/daterangepicker/daterangepicker.js?key=1"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js?key=1"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js?key=1"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js?key=1"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js?key=1"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js?key=1"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="dist/js/pages/dashboard.js?key=1"></script> -->

    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js?key=1"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js?key=1"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js?key=1"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js?key=1"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js?key=1"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js?key=1"></script>
    <script src="plugins/jszip/jszip.min.js?key=1"></script>
    <script src="plugins/pdfmake/pdfmake.min.js?key=1"></script>
    <script src="plugins/pdfmake/vfs_fonts.js?key=1"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js?key=1"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js?key=1"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js?key=1"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-3:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <?php

if (isset($_GET['status']) && $_GET['status'] == 'failed') {
    ?>
            <script>
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'Booking',
                    subtitle: 'close',
                    body: 'Similar Booking exists, try another location'
                });
            </script>
            <?php
}
if (isset($_GET['status']) && $_GET['status'] == 'success') {
    ?>
                    <script>
                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'Booking',
                            subtitle: 'close',
                            body: 'Booking Added'
                        });
                    </script>
                    <?php
}
?>
    <script>
        $(document).ready(function() {
            $(".jamat_dd").attr("disabled", true);
        });

        function load_sub() {
            var selected = $('#Selected_jamiat option:selected').val();
            console.log(selected);
            // document.getElementsByClassName("all").style.display = "none";
            // document.getElementsByClassName(selected.toString()).style.display = "block";
            $(".all").css("display", "none");
            $("." + selected).css("display", "block");
            $(".jamat_dd").removeAttr("disabled");
        }
    </script>
</body>

</html>