<?php

session_start();

require('../connection.php');

//  $db_conn = getDB();
if (isset($_POST['cargo_add'])) { 

    $access = $_POST['access'];
    
    $items = $_POST['items'];
    $user_id = $_POST['user_id'];
    $vehicle_id = $_POST['vehicle_id'];
    $driver_id = $_POST['driver_id'];
    $trip_type = $_POST['trip_type'];
    $start_loc_id = $_POST['start_loc_id'];
    $end_loc_id = $_POST['end_loc_id']; 
    $unit = $_POST['unit'];
    $len = $_POST['len'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $class = $_POST['class'];
    $prefix = $_POST['prefix'];
    $suffix = $_POST['suffix'];
    $commodity = $_POST['commodity'];
    $weight = $_POST['weight'];
    $s_date = $_POST['s_date'];
    $contact = $_POST['contact'];
    $noted = $_POST['noted'];
    $status = 'A';
    $created_on = date('d-m-Y H:i:s');
 
    $stmt = $dbConn->prepare("SELECT * FROM `loose_cargo` WHERE customer=:user_id and  vehicle=:vehicle_id and  start_loc=:start_loc_id and  end_loc=:end_loc_id and  status != 'D'");
    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
    $stmt->bindParam(":vehicle_id", $vehicle_id, PDO::PARAM_STR); 
    $stmt->bindParam(":start_loc_id", $start_loc_id, PDO::PARAM_STR); 
    $stmt->bindParam(":end_loc_id", $end_loc_id, PDO::PARAM_STR);
    $stmt->execute(); 
    $count = $stmt->rowCount(); 
    if ($count <= 0) {

        $stm = $dbConn->prepare("INSERT INTO `loose_cargo`(`access`, `items`, `unit`, `len`, `width`, `height`, `weight`, `class`, `prefix`, `suffix`, `customer`, `vehicle`, `driver`, `trip_type`, `start_loc`, `end_loc`, `commodity`, `s_date`, `contact`, `noted`, `status`, `created_on`)  
            VALUES 
(:access, :items, :unit, :len, :width, :height, :weight, :class, :prefix, :suffix, :customer, :vehicle, :driver, :trip_type, :start_loc, :end_loc, :commodity, :s_date, :contact, :noted, :status, :created_on)  ");

        $stm->bindParam(":access", $access, PDO::PARAM_STR);
        $stm->bindParam(":items", $items, PDO::PARAM_STR);
        $stm->bindParam(":unit", $unit, PDO::PARAM_STR);
        $stm->bindParam(":len", $len, PDO::PARAM_STR);
        $stm->bindParam(":width", $width, PDO::PARAM_STR);
        $stm->bindParam(":height", $height, PDO::PARAM_STR);
        $stm->bindParam(":weight", $weight, PDO::PARAM_STR);
        $stm->bindParam(":class", $class, PDO::PARAM_STR);
        $stm->bindParam(":prefix", $prefix, PDO::PARAM_STR);
        $stm->bindParam(":suffix", $suffix, PDO::PARAM_STR); 
        $stm->bindParam(":customer", $user_id, PDO::PARAM_STR);
        $stm->bindParam(":vehicle", $vehicle_id, PDO::PARAM_STR);
        $stm->bindParam(":driver", $driver_id, PDO::PARAM_STR);
        $stm->bindParam(":trip_type", $trip_type, PDO::PARAM_STR);
        $stm->bindParam(":start_loc", $start_loc_id, PDO::PARAM_STR); 
        $stm->bindParam(":end_loc", $end_loc_id, PDO::PARAM_STR);
        $stm->bindParam(":commodity", $commodity, PDO::PARAM_STR);
        $stm->bindParam(":s_date", $s_date, PDO::PARAM_STR);
        $stm->bindParam(":contact", $contact, PDO::PARAM_STR);
        $stm->bindParam(":noted", $noted, PDO::PARAM_STR);
        $stm->bindParam(":status", $status, PDO::PARAM_STR); 
        $stm->bindParam(":created_on", $created_on, PDO::PARAM_STR);  
        $stm->execute();

        $count = $stm->rowCount();

        if ($count > 0){

                ?>

                <script>

                    window.location.href = '../loose_cargo.php?status=success';

                </script>

                <?php

        } else{

                ?>

                <script>

                    window.location.href = '../loose_cargo.php?status=failed';

                </script>

                <?php

        }

    } else {

            ?>

            <script>

                window.location.href = '../loose_cargo.php?status=failed&reason=exists';

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