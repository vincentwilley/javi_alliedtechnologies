<?php
session_start();

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// print_r($_POST);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Carrier | Dashboard</title>
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
                            <h1>Carrier Request</h1>
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
                                            <th >User Name</th>
                                            <th >User Mobile</th>
                                            <th >User Email</th>
                                            <th >Vehicle Type</th>
                                            <th >DOT</th>
                                            <th >Carrier Name</th>
                                            <th >Business Email</th>
                                            <th >MS / SAC</th>
                                            <th >MX / FF</th>
                                            <th >Best</th>
                                            <th >Fleet Size</th>
                                            <th >Requested On</th>
                                            <th >Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
            $stmt = $dbConn->prepare("SELECT cr.id, u.name as username,u.contact as usercontact, u.email as useremail, `dot`, cr.`name`, cr.`contact`, `ms_sac`, `mx_ff`, `type`, vg.gr_name as fleet_size, `requested_on`,cr.best, cr.status FROM carrier_request cr inner join `users` u on  u.id = cr.user_id inner join vehicle_group vg on vg.gr_id = cr.fleet_size where cr.status !='D' order by cr.id desc");
            $stmt->execute();
            $count = $stmt->rowCount();
            if ($count > 0) {
                $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                for ($i = 0; $i < $count; $i++) {
                    ?>
                                                    <tr>
                                                        <td><?=$sr = $i + 1?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['username'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['usercontact'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['useremail'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['type'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['dot'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['name'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['contact'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['ms_sac'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['mx_ff'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['best'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['fleet_size'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['requested_on'])?></td>
                                                        <td>
                                                            <?php
                                                            if($fetch_data[$i]['status']=='P'){ 
                                                                ?>
                                                                <a href="api/delete_api.php?delete_carrier=book&7thas=<?=$fetch_data[$i]['id']?>&status=A" class="btn-delete">Approve / </a><br>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <a href="api/delete_api.php?delete_carrier=book&7thas=<?=$fetch_data[$i]['id']?>&status=P" class="btn-delete">Suspend / </a><br>
                                                                <?php
                                                            }
                                                            ?>
                                                            
                                                            <a href="api/delete_api.php?delete_carrier=book&7thas=<?=$fetch_data[$i]['id']?>&status=D" class="btn-delete">Delete</a>
                                                        </td> 
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