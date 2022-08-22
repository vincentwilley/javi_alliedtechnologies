<?php
session_start();
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vehicle | Dashboard</title>
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
                            <h1>Vehicle</h1>
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
        <form method="post" id="vehicle_add" class="card" action="api/vehicle.php"  >
                <div class="card-body">


                  <div class="row">
                   <input type="hidden" name="v_id" id="v_id" value="" autocomplete="off">

                    <div class="col-sm-6 col-md-4">
                        <label class="form-label">Registration Number</label>
                      <div class="form-group">
                        <input type="text" name="reg_no" id="v_registration_no" class="form-control" placeholder="Registration Number" value="" autocomplete="off">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label class="form-label">Vehicle Name</label>
                      <div class="form-group">
                        <input type="text" name="name" id="v_name" class="form-control" placeholder="Vehicle Name" value="" autocomplete="off">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">Model</label>
                        <input type="text" name="model" value="" class="form-control" placeholder="Model" autocomplete="off">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">Business Email</label>
                        <input type="email" name="email" value="" class="form-control" placeholder="Business Email" autocomplete="off">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">MC / SCAC code </label>
                        <input type="text" name="ms_sac" value="" class="form-control" placeholder="MC / SCAC code " autocomplete="off">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">Manufactured By</label>
                        <input type="text" min="0" name="manufacture" value="" class="form-control" placeholder="Manufactured By" autocomplete="off">
                      </div>
                    </div>
                    </div>
                    <div class="row">
                     <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">Vehicle Type</label>
                        <select id="v_type" name="type" class="form-control " required="">
                         <option value="">Select Vehicle Type</option> 
                          <option value="CAR">CAR</option> 
                          <option value="VAN">VAN</option> 
                          <option value="BOBTAIL">BOBTAIL</option> 
                          <option value="MOTORCYCLE">MOTORCYCLE</option> 
                          <option value="TRUCK">TRUCK</option> 
                          <option value="BUS">BUS</option> 
                           <option value="TAXI">TAXI</option> 
                           <option value="BICYCLE">BICYCLE</option> 
                        </select>

                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label for="v_color" class="form-label">Vehicle Color<small> (To show in Map)</small></label>
                        <input id="add-device-color" type="color" name="color" class="jscolor {valueElement:'add-device-color', styleElement:'add-device-color', hash:true, mode:'HSV'} form-control" value="#F399EB" required="" autocomplete="off" style="background-image: none; background-color: rgb(243, 153, 235); color: rgb(0, 0, 0);">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">Registration Expiry Date</label>
                        <input type="date" required="" name="expiry" value="" class="form-control datepicker" placeholder="Registration Expiry Date" autocomplete="off">
                      </div>
                  </div>
                   <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="v_group" class="form-label">Fleet Size</label>
                        <select id="v_group" name="fleet_size" class="form-control " required="">
                          <option value="">Select Fleet Size</option> 
                          <?php
                            $stmt = $dbConn->prepare("SELECT * FROM `vehicle_group` where status !='D' ");
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
                        </select>
                      </div>
                    </div>
					 <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">DOT Number</label>
                        <input type="text" required="" name="dot_number" value="" class="form-control" placeholder="DOT Number" autocomplete="off">
                      </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Chasis Number</label>
                        <input type="text" required="" name="chasis_number" value="" class="form-control" placeholder="Chasis Number" autocomplete="off">
                      </div>
                  </div> 
                  <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">MX / FF code</label>
                        <input type="text" required="" name="mx_ff" value="" class="form-control" placeholder="MX / FF code" autocomplete="off">
                      </div>
                  </div>
                   

                    </div>
                    <hr>
                    <div class="form-label"><b>GPS API Details(Feed GPS Data)</b></div>
                     <div class="row">
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">API URL</label>
                        <input type="text" name="api_url" class="form-control" placeholder="API URL" value="https://javi.alliedtechnologies.co/api" readonly="" autocomplete="off">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">API Username</label>
                        <input type="text" id="username" value="" name="username" class="form-control" placeholder="API Username" >
                      </div>
                    </div>
                  <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">API Password</label>
                        <input type="text" name="password" class="form-control" placeholder="API Password" value="485971">
                      </div>
                    </div>
                  </div>
                </div>
                  <input type="hidden" id="v_created_by" name="v_created_by" value="1" autocomplete="off">
                   <input type="hidden" id="v_created_date" name="create_vehicle" value="2022-07-19 10:58:11" autocomplete="off">
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary"> Add Vehicle</button>
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
                                            <th>S.No</th>
                                            <th >Vehicle Name</th>
                                            <th >Registration Number</th>
                                            <th >Model</th>
                                            <th >Business Email</th> 
                                            <th >Chassis No</th> 
                                            <th >MS SAC</th> 
                                            <th >MX FF</th> 
                                            <th >Manufacturer</th> 
                                            <th >Vehicle Type</th> 
                                            <th >Expiry Date</th> 
                                            <th >Dot Number</th> 
                                            <th >Created On</th> 
                                            <th >Action</th></tr>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stmt = $dbConn->prepare("SELECT * FROM vehicle where status !='D' order by id desc");
                                            $stmt->execute();
                                            $count = $stmt->rowCount();
                                            if ($count > 0) {
                                                $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                for ($i = 0; $i < $count; $i++) {
                                                    $fetch_data[$i]['status'] = $fetch_data[$i]['status'] =='A'?'Active':'Deleted';
                                            ?>
                                                    <tr>
                                                        <td style="background:<?= ucfirst($fetch_data[$i]['color'])   ?>"><?= $sr = $i + 1 ?></td>
                                                        <td><?= ucfirst($fetch_data[$i]['name'])   ?></td> 
                                                        <td><?= ucfirst($fetch_data[$i]['reg_no'])   ?></td> 
                                                        <td><?= ucfirst($fetch_data[$i]['model'])   ?></td> 
                                                        <td><?= ucfirst($fetch_data[$i]['email'])   ?></td> 
                                                        <td><?= ucfirst($fetch_data[$i]['chasis_no'])   ?></td> 
                                                        <td><?= ucfirst($fetch_data[$i]['ms_sac'])   ?></td>    
                                                        <td><?= ucfirst($fetch_data[$i]['mx_ff'])   ?></td>    
                                                        <td><?= ucfirst($fetch_data[$i]['manufacture'])   ?></td>  
                                                        <td><?= ucfirst($fetch_data[$i]['type'])   ?></td>    
                                                        <td><?= ucfirst($fetch_data[$i]['expiry'])   ?></td>    
                                                        <td><?= ucfirst($fetch_data[$i]['dot_number'])   ?></td>    
                                                        <td><?= ucfirst($fetch_data[$i]['created_on'])   ?></td>    
                                                        <td><a href="api/delete_api.php?delete_vehicle=vehicle&7thas=<?=$fetch_data[$i]['id']?>&status=D" class="btn-delete">Delete</a></td> 
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
if (isset($_GET['status'])  && $_GET['status'] == 'failed') {
    ?>
            <script>
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'Vehicle',
                    subtitle: 'close',
                    body: 'Similar Vehicle exists, try another Registration Number'
                });
            </script>
            <?php
        } 
        if (isset($_GET['status'])  && $_GET['status'] == 'success') {
            ?>
                    <script>
                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'Vehicle',
                            subtitle: 'close',
                            body: 'Vehicle Added'
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