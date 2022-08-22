<?php
session_start();
require '../admin/connection.php';
//  $db_conn = getDB();

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$response["response"] = array();
$data = array(); 
if (isset($_POST['submit-message'])) {
  
    $email = $_POST['email'];
    $msg = $_POST['message'];  
    $status = 'A';
    $created_on = date('d-m-y H:i:s');
    $stmt = $dbConn->prepare("SELECT * FROM `contact` WHERE email=:email and status != 'D' ");
    $stmt->bindParam(":email", $email, PDO::PARAM_STR); 
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count <= 0) {
        $stm = $dbConn->prepare("INSERT INTO `contact`(`email`, `msg`, `created_on`, `status`)  
            VALUES (:email, :msg, :created_on,  'A')");
        $stm->bindParam(":email", $email, PDO::PARAM_STR);
        $stm->bindParam(":msg", $msg, PDO::PARAM_STR);
        $stm->bindParam(":created_on", $created_on, PDO::PARAM_STR); 
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
