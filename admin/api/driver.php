<?php
session_start();
require('../connection.php');
//  $db_conn = getDB();

if (isset($_POST['driver_add'])) { 
    $name = $_POST['name'];
    $age = $_POST['age'];
    $mobile = $_POST['mobile'];
    $license_no = $_POST['license_no'];
    $license_expiry = $_POST['license_expiry'];
    $exp = $_POST['exp'];
    $joining_date = $_POST['joining_date'];
    $address = $_POST['address'];
    $notes = $_POST['notes']; 
    $status = $_POST['status'];
    $created_on = date('d-m-Y H:i:s');
    $stmt = $dbConn->prepare("SELECT * FROM `driver` WHERE mobile=:mobile and status != 'D'");
    $stmt->bindParam(":mobile", $mobile, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count <= 0) {
        $stm = $dbConn->prepare("INSERT INTO `driver`( `name`, `age`, `mobile`, `license_no`, `license_expiry`, `exp`, `joining_date`, `address`, `notes`, `status`, `created_on`)
            VALUES (:name, :age, :mobile, :license_no, :license_expiry,:exp, :joining_date,:address, :notes,:status,:created_on)");
        $stm->bindParam(":name", $name, PDO::PARAM_STR);
        $stm->bindParam(":age", $age, PDO::PARAM_STR);
        $stm->bindParam(":mobile", $mobile, PDO::PARAM_STR);
        $stm->bindParam(":license_no", $license_no, PDO::PARAM_STR);
        $stm->bindParam(":license_expiry", $license_expiry, PDO::PARAM_STR); 
        $stm->bindParam(":exp", $exp, PDO::PARAM_STR);
        $stm->bindParam(":joining_date", $joining_date, PDO::PARAM_STR);
        $stm->bindParam(":address", $address, PDO::PARAM_STR);
        $stm->bindParam(":notes", $notes, PDO::PARAM_STR);
        $stm->bindParam(":status", $status, PDO::PARAM_STR);
        $stm->bindParam(":created_on", $created_on, PDO::PARAM_STR);  
        $stm->execute();
        $count = $stm->rowCount();
        if ($count > 0){
                ?>
                <script>
                    window.location.href = '../driver.php?status=success';
                </script>
                <?php
        } else{
                ?>
                <script>
                    window.location.href = '../driver.php?status=failed';
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