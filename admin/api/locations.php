<?php
session_start();
require('../connection.php');
//  $db_conn = getDB();

if (isset($_POST['location_add'])) { 
    $title = $_POST['title'];
    $lati = $_POST['lati'];
    $longi = $_POST['longi'];
    $status = 'A';
    $stmt = $dbConn->prepare("SELECT * FROM `locations` WHERE title=:title and status != 'D'");
    $stmt->bindParam(":title", $title, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count <= 0) {
        $stm = $dbConn->prepare("INSERT INTO `locations`(`title`, `lati`, `longi`, `status`, `created_on`) 
            VALUES (:title, :lati, :longi, :status,:created_on)");
        $stm->bindParam(":title", $title, PDO::PARAM_STR);
        $stm->bindParam(":lati", $lati, PDO::PARAM_STR);
        $stm->bindParam(":longi", $longi, PDO::PARAM_STR);
        $stm->bindParam(":status", $status, PDO::PARAM_STR);
        $stm->bindParam(":created_on", $added_by, PDO::PARAM_STR); 
        $stm->execute();
        $count = $stm->rowCount();
        if ($count > 0){
                ?>
                <script>
                    window.location.href = '../locations.php?status=success';
                </script>
                <?php
        } else{
                ?>
                <script>
                    window.location.href = '../locations.php?status=failed';
                </script>
                <?php
        }
    } else {
            ?>
            <script>
                window.location.href = '../locations.php?status=failed';
            </script>
            <?php
    } 
}
?>