<?php
session_start();
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Locations | Dashboard</title>
    <?php include('header_links.php'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <span style="font-weight: 500; font-size: 1.4em;" class="animation__shake">Loading please wait...</span>
            <!-- <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"> -->
        </div>

        <!-- Navbar -->
        <?php include('header.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include('sidebar.php'); ?> 

        <!-- Content Wrapper. Contains page content -->
        
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Locations</h1>
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
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <!-- <div class="card-header">
                  <h3 class="card-title">Quick Example</h3>
                </div> -->
                <!-- /.card-header -->
                <!-- form start -->
                
                <form  action="api/locations.php" method="post"> 
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12 form-group">
                        <label for="exampleInputEmail1">Location Title</label>
                        <input type="text" name="title" placeholder="Enter location name (e.g. Washington - 50 Massachusetts Ave NE)" class="form-control" require>
                      </div>
                      <div class="col-md-6 form-group">
                        <label for="exampleInputEmail1">Latitude:</label>
                        <input type="text" name="lati" placeholder="Enter latitude (eg. xx.xxxx)" class="form-control"  require>
                      </div>
                       <div class="col-md-6 form-group">
                        <label for="exampleInputEmail1">Longitude:</label>
                        <input type="text" name="longi" placeholder="Enter latitude (eg. xx.xxxx)" class="form-control"  require>
                      </div> 
                    </div>
  
                  <div class="card-footer"> 
                    <input type="submit" name="location_add" class="btn btn-primary"/> 
                  </div>
                </form>
              </div> 
            </div>
            <!--/.col (left) -->

          </div>
          <!-- /.row -->
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
                                               <th >Sr No</th>
                                               <th >Title</th>
                                                <th >Location</th>  
                                                <th >Status</th>  
                                                <th >Action</th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stmt = $dbConn->prepare("SELECT * FROM locations where status != 'D' order by title asc");
                                            $stmt->execute();
                                            $count = $stmt->rowCount();
                                            if ($count > 0) {
                                                $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                for ($i = 0; $i < $count; $i++) {
                                                    $fetch_data[$i]['status'] = $fetch_data[$i]['status'] =='A'?'Active':'Deleted';
                                            ?>
                                                    <tr>
                                                        <td><?= $sr = $i + 1 ?></td>
                                                        <td><?= ucfirst($fetch_data[$i]['title'])   ?></td> 
                                                        <td><a href="https://www.google.com/maps/@<?= ucfirst($fetch_data[$i]['id']) ?>,<?= ucfirst($fetch_data[$i]['id']) ?>,15z" target="_blank">Map</a><br>
                                                        <?= "Latitude: ".ucfirst($fetch_data[$i]['id'])."<br>"."Longitude: ".ucfirst($fetch_data[$i]['id']) ?>
                                                             
                                                        <td><?= ucfirst($fetch_data[$i]['status']) ?></td> 
                                                        <td><a href="api/delete_api.php?delete_location=true&7thas=<?= $fetch_data[$i]['id'];?>&status=D" class="btn-delete" >Delete</a></td> 
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
        <?php include('footer.php'); ?>
    </div>
    <!-- ./wrapper -->
    <?php include('footer_links.php'); ?>

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