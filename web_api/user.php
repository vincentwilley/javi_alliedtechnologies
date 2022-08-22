<?php
session_start();
require('../admin/connection.php');
//  $db_conn = getDB();

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$response["response"] = array();
$data = array();
// print_r($_POST);
if (isset($_POST['signup_btn'])) { 
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address']; 
    $hash_password = trim(hash('sha256', $password));
    $status = 'A';
    $stmt = $dbConn->prepare("SELECT * FROM `users` WHERE email=:email and status != 'D'");
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count <= 0) {
        $stm = $dbConn->prepare("INSERT INTO `users`(`name`, `contact`, `email`, `password`, `address`, `status`, `created_on`)
            VALUES (:name, :contact, :email, :password, :address, :status,:created_on)");
        $stm->bindParam(":name", $name, PDO::PARAM_STR);
        $stm->bindParam(":contact", $contact, PDO::PARAM_STR);
        $stm->bindParam(":email", $email, PDO::PARAM_STR);
        $stm->bindParam(":password", $hash_password, PDO::PARAM_STR);
        $stm->bindParam(":address", $address, PDO::PARAM_STR); 
        $stm->bindParam(":status", $status, PDO::PARAM_STR);
        $stm->bindParam(":created_on", $added_by, PDO::PARAM_STR); 
        $stm->execute();
        $count = $stm->rowCount();
        if ($count > 0) { 
            $data["status"] = "success";
            $data["reason"] = "created_account";
            array_push($response["response"], $data); 
        } else {
            $data["status"] = "failed";
            $data["reason"] = "failed_to_insert";
            array_push($response["response"], $data);
        }
    }  else {
        $data["status"] = "failed";
        $data["reason"] = "already_exists";
        array_push($response["response"], $data);
    }
}if (isset($_POST['signin_btn'])) {  
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash_password = trim(hash('sha256', $password)); 
    $status = 'A';
    $stmt = $dbConn->prepare("SELECT * FROM `users` WHERE email=:email and  password = :password and status != 'D'");
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":password", $hash_password, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count > 0) { 
        $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['truckquest_email'] = $email;
        $_SESSION['truckquest_id'] = $fetch_data[0]['id'];
        $data["status"] = "success";
        $data["reason"] = "account_found";
        array_push($response["response"], $data); 
    } else {
        $data["status"] = "failed";
        $data["reason"] = "account_not_found";
        array_push($response["response"], $data);
    }
}else {
    $data["status"] = "failed";
    $data["reason"] = "account_not_found";
    array_push($response["response"], $data);
}
echo json_encode($response);
?>