<?php
session_start();
require('../connection.php');
//  $db_conn = getDB();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
print_r($_POST);
if (isset($_POST['r_message'])) { 
    $r_v_id = $_POST['r_v_id'];
    $r_date = $_POST['r_date']; 
    $r_message = $_POST['r_message']; 
    $r_created_date = date('d-m-Y H:i:s'); 
        $stm = $dbConn->prepare("INSERT INTO `reminder`( `r_v_id`, `r_message`, `r_date`, `r_created_date`, `r_isread`)
         VALUES (:r_v_id, :r_message, :r_date,:r_created_date,'N')");
        $stm->bindParam(":r_v_id", $r_v_id, PDO::PARAM_STR); 
        $stm->bindParam(":r_message", $r_message, PDO::PARAM_STR);
        $stm->bindParam(":r_date", $r_date, PDO::PARAM_STR);  
        $stm->bindParam(":r_created_date", $r_created_date, PDO::PARAM_STR);   
        $stm->execute();
        $count = $stm->rowCount();
        if ($count > 0){
                ?>
                <script>
                    window.location.href = '../reminder.php?status=success';
                </script>
                <?php
        } else{
                ?>
                <script>
                    window.location.href = '../reminder.php?status=failed';
                </script>
                <?php
        }
     
}
?>