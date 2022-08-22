<?php

session_start();

require('../connection.php');

//  $db_conn = getDB();



if (isset($_POST['add_events'])) { 

    $name = $_POST['name'];

    $description = $_POST['description'];

    $area = $_POST['area'];
    $vehicle = $_POST['vehicle_id'];


    $created_on = date('d-m-Y H:i:s');
    $status = 'A';

    $stmt = $dbConn->prepare("SELECT * FROM `geo_events` WHERE name=:name and status != 'D'");

    $stmt->bindParam(":name", $name, PDO::PARAM_STR);

    $stmt->execute();

    $count = $stmt->rowCount();

    if ($count <= 0) {

        $stm = $dbConn->prepare("INSERT INTO `geo_events`( `name`, `description`, `area`, `vehicle`, `created_on`, `status`)  

            VALUES (:name, :description, :area, :vehicle, :created_on,:status)");

        $stm->bindParam(":name", $name, PDO::PARAM_STR);

        $stm->bindParam(":description", $description, PDO::PARAM_STR);

        $stm->bindParam(":area", $area, PDO::PARAM_STR);

        $stm->bindParam(":vehicle", $vehicle, PDO::PARAM_STR);

        $stm->bindParam(":created_on", $created_on, PDO::PARAM_STR); 
        
        $stm->bindParam(":status", $status, PDO::PARAM_STR);

        $stm->execute();

        $count = $stm->rowCount();

        if ($count > 0){

                ?>

                <script>

                    window.location.href = '../goefencing_events.php?status=success';

                </script>

                <?php

        } else{

                ?>

                <script>

                    window.location.href = '../goefencing_events.php?status=failed';

                </script>

                <?php

        }

    } else {

            ?>

            <script>

                window.location.href = '../goefencing_events.php?status=failed';

            </script>

            <?php

    } 

}

?>