<?php
session_start();
require('../connection.php');
//  $db_conn = getDB();

if (isset($_POST['fleet_add'])) { 
    $gr_name = $_POST['name'];
    $gr_desc = $_POST['gr_desc']; 
    $created_on = date('d-m-Y H:i:s');
    $stmt = $dbConn->prepare("SELECT * FROM `vehicle_group` WHERE gr_name=:gr_name ");
    $stmt->bindParam(":gr_name", $gr_name, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count <= 0) {
        $stm = $dbConn->prepare("INSERT INTO `vehicle_group`( `gr_name`, `gr_desc`, `gr_created_date`,`status`) VALUES (:name, :gr_desc, :gr_created_date,'A')");
        $stm->bindParam(":name", $gr_name, PDO::PARAM_STR); 
        $stm->bindParam(":gr_desc", $gr_desc, PDO::PARAM_STR);
        $stm->bindParam(":gr_created_date", $created_on, PDO::PARAM_STR);  
        $stm->execute();
        $count = $stm->rowCount();
        if ($count > 0){
                ?>
                <script>
                    window.location.href = '../fleet_size.php?status=success';
                </script>
                <?php
        } else{
                ?>
                <script>
                    window.location.href = '../fleet_size.php?status=failed';
                </script>
                <?php
        }
    } else {
            ?>
            <script>
                window.location.href = '../driver.php?status=failed&reason=exists';
            </script>
            <?php
    } 
}
?>