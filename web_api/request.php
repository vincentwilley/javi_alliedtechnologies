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

    $p_date = $_POST['pick-up-date'];

    $v_type = $_POST['v_type'];
    $eqp = $_POST['eqp'];

    $pickup = $_POST['pick-up-location'];

    $r_drop = $_POST['drop-location'];   

    $status = 'A';

    $stmt = $dbConn->prepare("SELECT * FROM `requests` WHERE user_id=:user_id and p_date=:p_date and  status != 'D'");

    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);

    $stmt->bindParam(":p_date", $p_date, PDO::PARAM_STR);

    $stmt->execute();

    $count = $stmt->rowCount();

    if ($count <= 0) {

        $stm = $dbConn->prepare("INSERT INTO `requests`( `user_id`, `v_type`,`eqp`, `pickup`, `r_drop`, `p_date`, `status`, `created_on`)

            VALUES (:user_id, :v_type, :eqp, :pickup, :r_drop, :p_date, :status,:created_on)");

        $stm->bindParam(":user_id", $user_id, PDO::PARAM_STR);

        $stm->bindParam(":v_type", $v_type, PDO::PARAM_STR);
        $stm->bindParam(":eqp", $eqp, PDO::PARAM_STR);

        $stm->bindParam(":pickup", $pickup, PDO::PARAM_STR);

        $stm->bindParam(":r_drop", $r_drop, PDO::PARAM_STR);

        $stm->bindParam(":p_date", $p_date, PDO::PARAM_STR);

        $stm->bindParam(":status", $status, PDO::PARAM_STR);

        $stm->bindParam(":created_on", $added_by, PDO::PARAM_STR);

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

