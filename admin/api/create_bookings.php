<?php

session_start();

require('../connection.php');

//  $db_conn = getDB();
if (isset($_POST['bookings_add'])) { 
    $user_id = $_POST['user_id'];
    $vehicle_id = $_POST['vehicle_id'];
    $driver_id = $_POST['driver_id'];
    $trip_type = $_POST['trip_type'];
    $start_loc_id = $_POST['start_loc_id'];
    $end_loc_id = $_POST['end_loc_id'];
    $approx_total_km = $_POST['approx_total_km'];
    $start_date = $_POST['start_date'];
    $qty = $_POST['qty']; 
    $item_pack = $_POST['item_pack']; 
    $end_date = $_POST['end_date']; 
    $status = $_POST['status'];
    $amt = $_POST['amt'];
    $notify = $_POST['notify'];
    $equipment = $_POST['equipment'];
    $created_on = date('d-m-Y H:i:s');

    $track_code = 0;

    $stmt = $dbConn->prepare("SELECT * FROM `bookings` WHERE status != 'D' order by id desc"); 
    $stmt->execute(); 
    $count = $stmt->rowCount();
    if ($count > 0) {
        $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $track_code = str_pad(intval($fetch_data[0]['track_code'])+1, 4, '0', STR_PAD_LEFT);
        
    }
    $stmt = $dbConn->prepare("SELECT * FROM `users` WHERE id != :id order by id desc"); 
    $stmt->bindParam(":id", $user_id, PDO::PARAM_STR); 
    $stmt->execute(); 
    $count = $stmt->rowCount();
    if ($count > 0) {
        $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $email = $fetch_data[0]['email'];
        if($notify == 'Y'){

        }
        
    }

    $stmt = $dbConn->prepare("SELECT * FROM `bookings` WHERE user_id=:user_id and  vehicle_id=:vehicle_id and  start_loc_id=:start_loc_id and  end_loc_id=:end_loc_id and  status != 'D'");
    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
    $stmt->bindParam(":vehicle_id", $vehicle_id, PDO::PARAM_STR); 
    $stmt->bindParam(":start_loc_id", $start_loc_id, PDO::PARAM_STR); 
    $stmt->bindParam(":end_loc_id", $end_loc_id, PDO::PARAM_STR);
    $stmt->execute(); 
    $count = $stmt->rowCount(); 
    if ($count <= 0) {

        $stm = $dbConn->prepare("INSERT INTO `bookings`(track_code,`user_id`, `vehicle_id`, `driver_id`, `trip_type`, `start_loc_id`, `end_loc_id`, `approx_total_km`,
         `start_date`, `end_date`, `status`, `qty`, `item_pack`,`amt`, `notify`, `equipment`,`created_on` )  
            VALUES (:track_code, :user_id, :vehicle_id, :driver_id, :trip_type, :start_loc_id,:end_loc_id, :approx_total_km,:start_date, :end_date,
            :status, :qty,:item_pack,:amt, :notify,:equipment,:created_on)");

        $stm->bindParam(":track_code", $track_code, PDO::PARAM_STR);
        $stm->bindParam(":user_id", $user_id, PDO::PARAM_STR);
        $stm->bindParam(":vehicle_id", $vehicle_id, PDO::PARAM_STR);
        $stm->bindParam(":driver_id", $driver_id, PDO::PARAM_STR);
        $stm->bindParam(":trip_type", $trip_type, PDO::PARAM_STR);
        $stm->bindParam(":start_loc_id", $start_loc_id, PDO::PARAM_STR); 
        $stm->bindParam(":end_loc_id", $end_loc_id, PDO::PARAM_STR);
        $stm->bindParam(":approx_total_km", $approx_total_km, PDO::PARAM_STR);
        $stm->bindParam(":start_date", $start_date, PDO::PARAM_STR);
        $stm->bindParam(":end_date", $end_date, PDO::PARAM_STR);
        $stm->bindParam(":status", $status, PDO::PARAM_STR);
        $stm->bindParam(":qty", $qty, PDO::PARAM_STR);
        $stm->bindParam(":item_pack", $item_pack, PDO::PARAM_STR); 
        $stm->bindParam(":amt", $amt, PDO::PARAM_STR); 
        $stm->bindParam(":notify", $notify, PDO::PARAM_STR); 
        $stm->bindParam(":equipment", $equipment, PDO::PARAM_STR); 
        $stm->bindParam(":created_on", $created_on, PDO::PARAM_STR);  
        $stm->execute();

        $count = $stm->rowCount();

        if ($count > 0){

                ?>

                <script>

                    window.location.href = '../create_bookings.php?status=success';

                </script>

                <?php

        } else{

                ?>

                <script>

                    window.location.href = '../create_bookings.php?status=failed';

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
function send_email($to,$track){ 
    $subject = "[UPDTAE] Truck Quest Booking Created";

    $message = "
    <html>
    <head>
    <title> </title>
    </head>
    <body>
    <p>Hello, Greetings from Truck Quest </p>
    <p>Your booking is created, Track you booking with <h2>#$track</h2> </p>
    <br><br><br><br> 
    <p>Regards,<br>Truck Quest<p>
    </body>
    </html>
    ";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <alliedtechnologies59@gmail.com>' . "\r\n"; 

    mail($to,$subject,$message,$headers);
}
?>