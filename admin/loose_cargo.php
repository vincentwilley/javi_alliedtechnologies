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
                            <h1>Loose Cargo</h1>
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
        <form method="post" id="add_driver" class="card"  action="api/loose_cargo.php"   >
                <div class="card-body">


                  <div class="row">
                   <input type="hidden" name="d_id" id="d_id" value="" autocomplete="off" required>

                    <div class="col-sm-6 col-md-3">

                      <div class="form-group">
                      <label class="form-label">Accessorials<span  class="form-required" style="color:red">*</span></label>
                        <select name="access" id="car-select" class="form-control" required>
                            <option value="">Select Accessorials <span style="color:red">*</span></option>

                            <option value="CFS Pick Up">CFS Pick Up	    </option>
<option value="CFS Delivery">CFS Delivery</option>
<option value="Lift Gate Pick Up">Lift Gate Pick Up   </option>
<option value="Lift Gate Delivery">Lift Gate Delivery  </option>
<option value="Residential Delivery">Residential Delivery    </option>
<option value="Residential Pick up">Residential Pick up </option>
<option value="Carton">Carton	    </option>


                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                        <label class="form-label">Items<span  class="form-required" style="color:red">*</span></label>
                            <select name="items" id="car-select" class="form-control" required>
                                <option value="">Select Items <span style="color:red">*</span></option>

                                <option value="Pallet">Pallet</option>
<option value="Bale">Bale</option>
<option value="Box">Box</option>
<option value="Bundle">Bundle</option>
<option value="Can">Can</option>
<option value="Carton">Carton</option>
<option value="Case">Case</option>
<option value="Crate">Crate</option>
<option value="Cylinder">Cylinder</option>
<option value="Pieces">Pieces</option>
<option value="Bag">Bag</option>
<option value="Reel">Reel</option>
<option value="Skid">Skid</option>
<option value="Tube">Tube</option>
<option value="Other">Other</option>


                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Unit<span  class="form-required" style="color:red">*</span></label>
                                <select name="unit" id="car-select" class="form-control" required>
                                    <option value="">Select Unit <span style="color:red">*</span></option>
                                    <option value="CM">CM</option>
                                        <option value="In">In</option>
                                </select>
                            </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                        <label class="form-label">Length<span  class="form-required" style="color:red">*</span></label>
                        <input type="text" name="len" value="" class="form-control datepicker" placeholder="Enter Length" autocomplete="off" required>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                        <label class="form-label">Width<span  class="form-required" style="color:red">*</span></label>
                        <input type="text" name="width" value="" class="form-control" placeholder="Width" autocomplete="off" required>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Height<span  class="form-required" style="color:red">*</span></label>
                            <input type="text" name="height" value="" class="form-control" placeholder="Height" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="d_is_active" class="form-label">Weight<span  class="form-required" style="color:red">*</span></label>
                        <select id="d_is_active" name="weight" class="form-control " required >
                          <option value="">Select Weight</option>
                          <option value="KG">KG</option>
                          <option value="LB">LB</option>

                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="d_is_active" class="form-label">Class<span  class="form-required" style="color:red">*</span></label>
                        <select id="d_is_active" name="class" class="form-control "  >
                          <option value="">Select Class</option>
                          <option value="50">50</option>
<option value="55">55</option>
<option value="60">60</option>
<option value="65">65</option>
<option value="70">70</option>
<option value="77.5">77.5</option>
<option value="85">85</option>
<option value="92.5">92.5</option>
<option value="100">100</option>
<option value="110">110</option>
<option value="125">125</option>
<option value="150">150</option>
<option value="175">175</option>
<option value="200">200</option>
<option value="250">250</option>
<option value="300">300</option>
<option value="400">400</option>
<option value="500">500</option>
<option value="Other">Other</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                        <label class="form-label">NMFC - prefix<span  class="form-required" style="color:red">*</span></label>
                        <input type="text" name="prefix" value="" class="form-control datepicker" placeholder="Enter NMFC - prefix" autocomplete="off" required>

                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                        <label class="form-label">NMFC - suffix<span  class="form-required" style="color:red">*</span></label>
                        <input type="text" name="suffix" value="" class="form-control datepicker" placeholder="Enter NMFC - suffix" autocomplete="off" required>

                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">

                      <div class="form-group">
                      <label class="form-label">Customer<span  class="form-required" style="color:red">*</span><a href="customer.php">Add Customer</a></label>
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
                        <label class="form-label">Contact Info <span  class="form-required" style="color:red">*</span></label>
                        <input type="text" name="contact" value="" class="form-control" placeholder="Contact Info" autocomplete="off" required>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                        <label class="form-label">Vehicle<span  class="form-required" style="color:red">*</span><a href="vehicle.php">Add Vehicle</a></label>
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
                            <label class="form-label">Driver<span  class="form-required" style="color:red">*</span><a href="driver.php">Add Driver</a></label>
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
                            <label class="form-label">Start Location<span  class="form-required" style="color:red">*</span><a href="locations.php">Add Location</a></label>
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
                            <label class="form-label">End Location<span  class="form-required" style="color:red">*</span><a href="locations.php">Add Location</a></label>
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
                        <label class="form-label">Commodity<span  class="form-required" style="color:red">*</span></label>
                        <input type="text" name="commodity" value="" class="form-control datepicker" placeholder="Enter Commodity" autocomplete="off" required>

                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                        <label class="form-label">Schedule Date <span  class="form-required" style="color:red">*</span></label>
                        <input type="date" name="s_date" value="" class="form-control" placeholder="Schedule Date" autocomplete="off" required>
                      </div>
                    </div>
                   
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                        <label class="form-label">Notes To Driver</label>

                      <textarea class="form-control" id="r_message" autocomplete="off" placeholder="Notes To Driver" name="noted"></textarea>
                      </div>
                    </div>


                    </div>

                </div>
                  <input type="hidden" id="d_created_by" name="d_created_by" value="1" autocomplete="off" required>
                   <input type="hidden" id="d_created_date" name="d_created_date" value="2022-07-20 02:18:17" autocomplete="off" required>
                <div class="card-footer text-right">
                  <input type="hidden" class="btn btn-primary" name="cargo_add" value="add" required>
                  <button type="submit" class="btn btn-primary"> Add Loose Cargo</button>
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
                                                <th >Customer Name</th>
                                                <th >Vehicle</th>
                                                <th >Driver</th>
                                                <th >Trip Type</th>
                                                <th >Start Location</th>
                                                <th >End Location</th>
                                                <th >Access</th>
                                                <th >Items</th>
                                                <th >Unit</th>
                                                <th >Length</th>
                                                <th >Width</th>
                                                <th >Height</th>
                                                <th >Class</th>
                                                <th >NMFC-prefix</th>
                                                <th >NMFC-Suffix</th>
                                                <th >Commodity</th>
                                                <th >Scheduled Date</th>
                                                <th >Contact Info</th>
                                                <th >Notes</th>
                                                <th >Created On</th>
                                                <th >Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
$stmt = $dbConn->prepare("SELECT u.name, u.contact, v.name as vehicle, d.name as driver,l1.title as start, l2.title as end, b.* FROM loose_cargo b inner join users u on u.id = b.customer inner join vehicle v on v.id = b.vehicle inner join driver d on d.id = b.driver inner join locations l1 on l1.id = b.start_loc inner JOIN locations l2 on l2.id = b.end_loc order by b.id desc");
$stmt->execute();
$count = $stmt->rowCount();
if ($count > 0) {
    $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    for ($i = 0; $i < $count; $i++) {
        ?>
                                                    <tr>
                                                        <td><?=$sr = $i + 1?></td>

                                                        <td><?=ucfirst($fetch_data[$i]['name']) . "<br>" . $fetch_data[$i]['contact']?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['vehicle'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['driver'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['trip_type'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['start'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['end'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['access'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['items'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['unit'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['len'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['width'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['height'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['class'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['prefix'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['suffix'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['commodity'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['s_date'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['contact'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['noted'])?></td>
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