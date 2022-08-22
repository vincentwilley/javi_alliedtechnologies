<?php 
session_start();
require('../admin/connection.php'); 

    $response["response"] = array();
    $data = array();
    $stmt = $dbConn->prepare("SELECT * FROM `locations` WHERE status='A'");
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count > 0) {
        $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < $count; $i++) {
            $data["id"] = $fetch_data[$i]['id'];
            $data["title"] = ucfirst($fetch_data[$i]['title']);
            $data["lati"] = $fetch_data[$i]['lati'];
            $data["longi"] = $fetch_data[$i]['longi'];
            $data["status"] = "success";
            $data["reason"] = "category_details_loaded";
            array_push($response["response"], $data);
        }
    } else {
        $data["status"] = "failed";
        $data["reason"] = "failed_to_load";
        array_push($response["response"], $data);
    }
    echo json_encode($response); 
?>