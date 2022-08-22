<?php
session_start();
require('../connection.php');
//  $db_conn = getDB();

if (isset($_POST['add_customer'])) { 
    $gr_name = $_POST['c_name'];
    $c_mobile = $_POST['c_mobile']; 
    $c_email = $_POST['c_email']; 
    $password = $_POST['password'];  
    $c_address = $_POST['c_address']; 
    $created_on = date('d-m-Y H:i:s');
    $stmt = $dbConn->prepare("SELECT * FROM `users` WHERE contact=:c_mobile ");
    $stmt->bindParam(":c_mobile", $c_mobile, PDO::PARAM_STR);
    $stmt->execute();
    $hash_password = trim(hash('sha256', $password)); 
    $count = $stmt->rowCount();
    if ($count <= 0) {
        $stm = $dbConn->prepare("INSERT INTO `users`( `name`, `contact`, `email`, `password`, `address`,`status`)
         VALUES (:name, :contact, :email,:password,:address,'A')");
        $stm->bindParam(":name", $gr_name, PDO::PARAM_STR); 
        $stm->bindParam(":contact", $c_mobile, PDO::PARAM_STR);
        $stm->bindParam(":email", $c_email, PDO::PARAM_STR);  
        $stm->bindParam(":password", $hash_password, PDO::PARAM_STR);  
        $stm->bindParam(":address", $c_address, PDO::PARAM_STR);  
        $stm->execute();
        $count = $stm->rowCount();
        if ($count > 0){
                ?>
                <script>
                    window.location.href = '../customer.php?status=success';
                </script>
                <?php
        } else{
                ?>
                <script>
                    window.location.href = '../customer.php?status=failed';
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