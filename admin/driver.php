<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Broadcast | Dashboard</title>
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
                            <h1>Driver</h1>
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
        <form method="post" id="add_driver" class="card"  action="api/driver.php"   >
                <div class="card-body">


                  <div class="row">
                   <input type="hidden" name="d_id" id="d_id" value="" autocomplete="off" required>

                    <div class="col-sm-6 col-md-3">
                        <label class="form-label">Driver Name<span  class="form-required" style="color:red">*</span></label>
                      <div class="form-group">
                        <input type="text" name="name" id="d_name" class="form-control" placeholder="Driver Name" value="" autocomplete="off" required>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Mobile<span  class="form-required" style="color:red">*</span></label>
                        <input type="text" name="mobile" value="" class="form-control" placeholder="Mobile" autocomplete="off" required>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Age<span  class="form-required" style="color:red">*</span></label>
                        <input type="number" max="99" name="age" value="" class="form-control" placeholder="Age" autocomplete="off" required>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">License No<span  class="form-required" style="color:red">*</span></label>
                        <input type="text" name="license_no" value="" class="form-control" placeholder="License No" autocomplete="off" required>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">License Expiry Date<span  class="form-required" style="color:red">*</span></label>
                        <input type="date" name="license_expiry" value="" class="form-control datepickerpastdisable" placeholder="License Expiry Date" autocomplete="off" required>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                        <label class="form-label">Total Experiance<span  class="form-required" style="color:red">*</span></label>
                        <input type="text" name="exp" value="" class="form-control" placeholder="Total Experiance" autocomplete="off" required>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                        <label class="form-label">Date of Joining<span  class="form-required" style="color:red">*</span></label>
                        <input type="text" name="joining_date" value="" class="form-control datepicker" placeholder="Date of Joining" autocomplete="off" required>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                        <label class="form-label">Reference/Notes</label>
                        <input type="text" name="notes" value="" class="form-control" placeholder="Reference or Notes" autocomplete="off" required>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                        <label class="form-label">Address<span  class="form-required" style="color:red">*</span></label>
                        <textarea class="form-control" autocomplete="off" placeholder="Address" name="address"></textarea>

                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="d_is_active" class="form-label">Driver Status</label>
                        <select id="d_is_active" name="status" class="form-control " required="">
                          <option value="">Select Driver Status</option>
                          <option value="A">Active</option>
                          <option value="S">Inactive</option>
                        </select>
                      </div>
                    </div>
                    </div>

                </div>
                  <input type="hidden" id="d_created_by" name="d_created_by" value="1" autocomplete="off" required>
                   <input type="hidden" id="d_created_date" name="d_created_date" value="2022-07-20 02:18:17" autocomplete="off" required>
                <div class="card-footer text-right">
                  <input type="hidden" class="btn btn-primary" name="driver_add" value="add" required>
                  <button type="submit" class="btn btn-primary"> Add Driver</button>
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
                                                <th >Mobile</th>
                                                <th >License No</th>
                                                <th >License Exp Date</th>
                                                <th >Date of Joining</th>
                                                <th >Is Active</th>
                                                <th >Action</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
$stmt = $dbConn->prepare("SELECT * FROM driver where status_record != 'D' order by id desc");
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
                                                        <td><?=ucfirst($fetch_data[$i]['mobile'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['license_no'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['license_expiry'])?></td>
                                                        <td><?=ucfirst($fetch_data[$i]['joining_date'])?></td>  
                                                        <td><?=ucfirst($fetch_data[$i]['status'])?></td>
                                                        <td><a href="api/delete_api.php?delete_driver=vehicle&7thas=<?=$fetch_data[$i]['id']?>&status=D" class="btn-delete">Delete</a></td> 
                                                   
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
 
if (isset($_GET['status'])  && $_GET['status'] == 'failed') {
    ?>
            <script>
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'Driver',
                    subtitle: 'close',
                    body: 'Similar Driver exists, try another mobile Number'
                });
            </script>
            <?php
        } 
        if (isset($_GET['status'])  && $_GET['status'] == 'success') {
            ?>
                    <script>
                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'Driver',
                            subtitle: 'close',
                            body: 'Driver Added'
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