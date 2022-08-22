<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer | Dashboard</title>
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
                            <h1>Reminder</h1>
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
      <form method="post" id="reminder_add" class="card" action="api/reminder.php">

        <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6 col-md-offset-2 ">



       <div class="card-body">

                     <div class="form-group">
                        <label class="form-label">Vechicle<span class="form-required">*</span></label>
                        <select id="r_v_id" class="form-control selectized" name="r_v_id" tabindex="-1"  >
                         <?php
$stmt = $dbConn->prepare("SELECT * FROM `vehicle_group`");
$stmt->execute();
$count = $stmt->rowCount();
if ($count > 0) {
    $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    for ($i = 0; $i < $count; $i++) {
        ?>
													<option value="<?=$fetch_data[$i]["gr_id"]?>"><?=$fetch_data[$i]["gr_name"]?></option>
													<?php
}
}

?>
                    </select> </div>


                     <div class="form-group">
                       <label>Date</label>
                       <input type="date" class="form-control datepickerpastdisable" required="true" value="" id="r_date" name="r_date" placeholder="Enter Username" autocomplete="off">
                     </div>


                      <div class="form-group">
                       <label>Message</label>
                      <textarea class="form-control" id="r_message" autocomplete="off" placeholder="Message" name="r_message"></textarea>
                     </div>

                     <input type="hidden"  value="add_reminder" value="Okay">
                      <div class="modal-footer"> 
                     
                     <button type="submit" class="btn btn-primary"> Add reminder</button>
                    </div>
                   </div>
                 </div>
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
                                            <th >Vehicle Name</th>
                                            <th >Date</th>
                                            <th >Message</th> 
                                            <th >Created On</th>
                                            <th >Status</th>
                                            <th >Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
$stmt = $dbConn->prepare("SELECT v.gr_name, `r_v_id`, `r_date`, `r_message`, `r_isread`, `r_created_date`,r.id FROM reminder r inner join vehicle_group v on v.gr_id = r.r_v_id where r.status !='D' order by r.id desc");
$stmt->execute();
$count = $stmt->rowCount();
if ($count > 0) {
    $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    for ($i = 0; $i < $count; $i++) {
        $fetch_data[$i]['r_isread'] = $fetch_data[$i]['r_isread'] == 'N' ? 'Unread' : 'Read';
        ?>
                                                    <tr>
                                                        <td><?=$sr = $i + 1?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['gr_name'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['r_date'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['r_message'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['r_created_date'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['r_isread'])?></td>
                                                        <td>
                                                            <a href="api/delete_api.php?delete_reminder=remi&7thas=<?=$fetch_data[$i]['id']?>&status=Y">Read</a><br>
                                                            <a href="api/delete_api.php?delete_reminder=remi&7thas=<?=$fetch_data[$i]['id']?>&status=D" class="btn-delete">Delete</a>
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