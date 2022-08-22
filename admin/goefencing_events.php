<?php

session_start();



?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Geo Fencing | Dashboard</title>

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

                            <h1>Geo Fence Events</h1>

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

      <form method="post" id="customer_add" class="card" action="api/geofence.php" novalidate="novalidate">

          <div class="card-body">



                  <div class="row">

                   <input type="hidden" name="c_id" id="c_id" value="" autocomplete="off">



                    <div class="col-sm-6 col-md-4">

                      <div class="form-group">

                          <label class="form-label">Name<span class="form-required">*</span></label>

                          <input type="text" required="true" class="form-control" value="" id="c_name" name="name" placeholder="Event Name" autocomplete="off">

                      </div>

                    </div>

                    <div class="col-sm-6 col-md-4">
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

                    <div class="col-sm-6 col-md-4">

                      <div class="form-group">

                         <label class="form-label">Area<span class="form-required">*</span></label>

                          <input type="text" required="true" class="form-control" value="" id="c_email" name="area" placeholder="Enter Area Name" autocomplete="off">



                      </div>

                    </div>

                </div><div class="row">


 

                    <div class="col-sm-12 col-md-12">

                      <div class="form-group">

                       <label class="form-label">Description<span class="form-required">*</span></label>

                        <textarea class="form-control" required="true" id="c_address" autocomplete="off" placeholder="Enter Description" name="description"></textarea>

                      </div>

                    </div>

                    </div>









                </div>

                 <input type="hidden" id="c_created_date" name="add_events" value="2022-07-20 03:01:40" autocomplete="off">



      <div class="modal-footer">



                  <button type="submit" class="btn btn-primary"> Add Event</button>

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

                                            <th >Name</th>

                                            <th >Description</th>

                                            <th >Area</th>

                                            <th >Vehicle</th>

                                            <th >Created On</th>

                                            <th >Status</th> 

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <?php

                                                $stmt = $dbConn->prepare("SELECT g.name, g.description, g.area, g.created_on, v.name as vehicle,g.status FROM geo_events g inner join vehicle v on g.vehicle = v.id where g.status != 'D'");

                                                $stmt->execute();

                                                $count = $stmt->rowCount();

                                                if ($count > 0) {

                                                    $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                    for ($i = 0; $i < $count; $i++) {

                                                        $fetch_data[$i]['status'] = $fetch_data[$i]['status'] == 'A' ? 'Active' : 'Deleted';

                                                        ?>

                                                    <tr>

                                                        <td><?=$sr = $i + 1?></td>

                                                        <td><?=ucfirst($fetch_data[$i]['name'])?></td>

                                                        <td><?=ucfirst($fetch_data[$i]['description'])?></td>

                                                        <td><?=ucfirst($fetch_data[$i]['area'])?></td>

                                                        <td><?=ucfirst($fetch_data[$i]['vehicle'])?></td>

                                                        <td><?=ucfirst($fetch_data[$i]['created_on'])?></td>

                                                        <td><?=ucfirst($fetch_data[$i]['status'])?></td>

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

            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

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

                    title: 'Customer',

                    subtitle: 'close',

                    body: 'Similar Customer exists, try another mobile Number'

                });

            </script>

            <?php

}

if (isset($_GET['status']) && $_GET['status'] == 'success') {

    ?>

                    <script>

                        $(document).Toasts('create', {

                            class: 'bg-success',

                            title: 'Customer',

                            subtitle: 'close',

                            body: 'Customer Added'

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