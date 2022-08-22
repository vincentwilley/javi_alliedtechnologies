<?php

session_start();

require '../admin/connection.php';

//  $db_conn = getDB();



// ini_set('display_errors', 1);

// ini_set('display_startup_errors', 1);

// error_reporting(E_ALL);

$response["response"] = array();

$data = array(); 

if (isset($_POST['save_request'])) {



    if (!isset($_SESSION['truckquest_email']) && empty($_SESSION['truckquest_email'])) {

        ?>

        <script>

            window.location.href= 'singin.php';

        </script>

        <?php

    }

    $user_id = $_SESSION['truckquest_id'];

    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    $dot = $_POST['dot'];

    $contact = $_POST['contact'];

    $ms_sac = $_POST['ms_sac'];   

    $mx_ff = $_POST['mx_ff'];   

    $type = $_POST['type'];   

    $fleet_size = $_POST['fleet_size'];   
    $best = $_POST['best'];   

    $status = 'P';

    $requested_on = date('d-m-Y H:i:s');

    $stmt = $dbConn->prepare("SELECT * FROM `carrier_request` WHERE user_id=:user_id and name=:name  ");

    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);

    $stmt->bindParam(":name", $name, PDO::PARAM_STR);

    $stmt->execute();

    $count = $stmt->rowCount();

    if ($count <= 0) {

        $stm = $dbConn->prepare("INSERT INTO `carrier_request`(`user_id`,  `fname`, `lname`, `dot`, `name`, `contact`, `ms_sac`, `mx_ff`, `type`, `fleet_size`,best, requested_on)   

            VALUES (:user_id, :fname, :lname, :dot, :name,:contact, :ms_sac, :mx_ff, :type,:fleet_size,:best, :requested_on)");

        $stm->bindParam(":user_id", $user_id, PDO::PARAM_STR);

        $stm->bindParam(":fname", $fname, PDO::PARAM_STR);

        $stm->bindParam(":lname", $lname, PDO::PARAM_STR);
        
        $stm->bindParam(":dot", $dot, PDO::PARAM_STR);

        $stm->bindParam(":name", $name, PDO::PARAM_STR);

        $stm->bindParam(":contact", $contact, PDO::PARAM_STR);

        $stm->bindParam(":ms_sac", $ms_sac, PDO::PARAM_STR);

        $stm->bindParam(":mx_ff", $mx_ff, PDO::PARAM_STR);

        $stm->bindParam(":type", $type, PDO::PARAM_STR);

        $stm->bindParam(":fleet_size", $fleet_size, PDO::PARAM_STR); 
        $stm->bindParam(":best", $best, PDO::PARAM_STR); 

        $stm->bindParam(":requested_on", $requested_on, PDO::PARAM_STR); 

        $stm->execute();

        $count = $stm->rowCount();

        if ($count > 0) {

            $data["status"] = "success";

            $data["reason"] = "created_request";

            array_push($response["response"], $data);

        } else {

            $data["status"] = "failed";

            $data["reason"] = "failed_to_insert";

            array_push($response["response"], $data);

        }

    } else {

        $data["status"] = "failed";

        $data["reason"] = "already_exists";

        array_push($response["response"], $data);

    }

    

    echo json_encode($response);

}

