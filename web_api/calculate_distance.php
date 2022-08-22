<?php
session_start();
require '../admin/connection.php';
print_r($_POST);
$lat_title = $_POST['lat_title'];
$long_title = $_POST['long_title'];
$response["response"] = array();
$data = array();
$stmt = $dbConn->prepare("SELECT * FROM `locations` WHERE title= :lat_title");
$stmt->bindParam(':lat_title', $lat_title, PDO::PARAM_STR);
$lat1 = '';
$lng1 = '';
$stmt->execute();
$count = $stmt->rowCount();
if ($count > 0) {
    $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $lat1 = $fetch_data[0]['lati'];
    $lng1 = $fetch_data[0]['longi'];
}

$lat2 = '';
$lng2 = '';
$stmt = $dbConn->prepare("SELECT * FROM `locations` WHERE title= :long_title");
$stmt->bindParam(':long_title', $long_title, PDO::PARAM_STR);
$stmt->execute();
$count = $stmt->rowCount();
if ($count > 0) {
    $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $lat1 = $fetch_data[0]['lati'];
    $lng1 = $fetch_data[0]['longi'];

}
echo distance(floatval($lat1), floatval($lng1), floatval($lat2), floatval($lng2), 'K');

function distance($lat1, $lon1, $lat2, $lon2, $unit) {

    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);
  
    if ($unit == "K") {
        return ($miles * 1.609344);
    } else if ($unit == "N") {
        return ($miles * 0.8684);
    } else {
        return $miles;
    }
  }