<?php

session_start();

require('../connection.php');

//  $db_conn = getDB();



ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

print_r($_POST);

if (isset($_POST['create_vehicle'])) { 

    $reg_no = $_POST['reg_no'];

    $name = $_POST['name'];

    $model = $_POST['model'];

    $email = $_POST['email'];

    $ms_sac = $_POST['ms_sac']; 

    $manufacture = $_POST['manufacture'];

    $type = $_POST['type'];

    $color = $_POST['color'];

    $expiry = $_POST['expiry'];

    $dot_number = $_POST['dot_number'];

    $fleet_size = $_POST['fleet_size'];

    $api_url = $_POST['api_url'];

    $username = $_POST['username'];

    $password = $_POST['password'];

    $api_url = $_POST['api_url'];

    $created_on = date('d-m-Y H:i:s');

    $api_url = $_POST['api_url'];

    $chasis_number = $_POST['chasis_number'];
    $mx_ff = $_POST['mx_ff'];

    $status = 'A';

    $stmt = $dbConn->prepare("SELECT * FROM `vehicle` WHERE reg_no=:reg_no and status != 'D'");

    $stmt->bindParam(":reg_no", $reg_no, PDO::PARAM_STR);

    $stmt->execute();

    $count = $stmt->rowCount();

    if ($count <= 0) {

        $stm = $dbConn->prepare("INSERT INTO `vehicle`(`reg_no`,chasis_no, `name`, `model`, `email`, `ms_sac`, `mx_ff`,`manufacture`, `type`, `color`, `expiry`, `fleet_size`, `dot_number`, `api_url`, `username`, `password`, `created_on`, `status`)

            VALUES (:reg_no, :chasis_no, :name, :model, :email,:ms_sac ,:mx_ff, :manufacture,:type, :color,:expiry, :fleet_size, :dot_number,:api_url, :username, :password,:created_on, :status)");

        $stm->bindParam(":reg_no", $reg_no, PDO::PARAM_STR);

        $stm->bindParam(":chasis_no", $chasis_number,PDO::PARAM_STR); 

        $stm->bindParam(":name", $name, PDO::PARAM_STR);

        $stm->bindParam(":model", $model, PDO::PARAM_STR);

        $stm->bindParam(":email", $email, PDO::PARAM_STR);

        $stm->bindParam(":ms_sac", $ms_sac, PDO::PARAM_STR); 
        $stm->bindParam(":mx_ff", $mx_ff, PDO::PARAM_STR); 

        $stm->bindParam(":manufacture", $manufacture, PDO::PARAM_STR); 

        $stm->bindParam(":type", $type, PDO::PARAM_STR); 

        $stm->bindParam(":color", $color, PDO::PARAM_STR); 

        $stm->bindParam(":expiry", $expiry, PDO::PARAM_STR); 

        $stm->bindParam(":fleet_size", $fleet_size, PDO::PARAM_STR); 

        $stm->bindParam(":dot_number", $dot_number, PDO::PARAM_STR); 

        $stm->bindParam(":api_url", $api_url,PDO::PARAM_STR); 

        $stm->bindParam(":username", $username,PDO::PARAM_STR); 

        $stm->bindParam(":password", $password,PDO::PARAM_STR); 

        $stm->bindParam(":created_on", $created_on,PDO::PARAM_STR); 

        $stm->bindParam(":status", $status,PDO::PARAM_STR);  

        $stm->execute();

        $count = $stm->rowCount();
        $count = $stm->debugDumpParams();

        if ($count > 0){

                ?>

                <script>

                    // window.location.href = '../vehicle.php?status=success';

                </script>

                <?php

        } else{

                ?>

                <script>

                    // window.location.href = '../vehicle.php?status=failed&reason=na';

                </script>

                <?php

        }

    } else {

            ?>

            <script>

                // window.location.href = '../vehicle.php?status=failed&reason=exists';

            </script>

            <?php

    } 

}

?>