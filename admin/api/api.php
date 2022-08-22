<?php
session_start();
require('connection.php');
//  $db_conn = getDB();

date_default_timezone_set('Asia/Kolkata');
$added_on =  date('d-m-Y H:i:s');

$response["response"] = array();
$data = array();

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// print_r($_POST);

if (isset($_POST['register'])) {
    $status = 'A';
    $username = $_POST['username'] ?? '';
    $type = $_POST['type'] ?? '';
    $added_by = $_POST['username'] ?? '';

    // $resume = $_POST['resume'] ?? '';
    $stmt_names = $dbConn->prepare("Select id,code from `ga_users` where type = :type"); //buyer
    $stmt_names->bindParam(":type", $type, PDO::PARAM_STR);
    $stmt_names->execute();
    $count_names = $stmt_names->rowCount();
    $code = strtoupper($type[0]) . str_pad(intval($count_names + 1), 4, "0", STR_PAD_LEFT); //0005

    $stmt_names = $dbConn->prepare("Select id,code from `ga_users` where name = :name");
    $stmt_names->bindParam(":name", $username, PDO::PARAM_STR);
    $stmt_names->execute();

    // $stmt_names = $dbConn->prepare("SELECT id,code from ga_users");
    // $stmt_names->execute();
    // $count_names = $stmt_names->rowCount();
    $count = $stmt_names->rowCount();

    if ($count > 0) {
        $fetch_data = $stmt_names->fetchAll(PDO::FETCH_ASSOC);
        $data["added_by"] = $added_by;
        $data["code"] = $fetch_data[0]['code'];
        $data["status"] = 'success';
        $data["reason"] = 'application_inserted';
        array_push($response["response"], $data);
    } else {
        $stm = $dbConn->prepare("INSERT INTO `ga_users`(`name`,`type`,`code`, `status`, `added_by` ,`added_on`) VALUES (:username, :type, :code, :status,:added_by,:added_on)");
        $stm->bindParam(":username", $username, PDO::PARAM_STR);
        $stm->bindParam(":type", $type, PDO::PARAM_STR);
        $stm->bindParam(":code", $code, PDO::PARAM_STR);
        $stm->bindParam(":status", $status, PDO::PARAM_STR);
        $stm->bindParam(":added_by", $added_by, PDO::PARAM_STR);
        $stm->bindParam(":added_on", $added_on, PDO::PARAM_STR);
        $stm->execute();
        $count = $stm->rowCount();

        if ($count > 0) {
            $data["added_by"] = $added_by;
            $data["code"] = $code;
            $data["status"] = 'success';
            $data["reason"] = 'application_inserted';
            array_push($response["response"], $data);
        } else {
            $data["status"] = 'failed';
            $data["reason"] = 'insert_failed';
            array_push($response["response"], $data);
        }
    }
    // array_push($response["response"], $data);
    echo json_encode($response);  // translator
}
if (isset($_POST['order_now'])) {
    $status = 'A';
    $code = $_POST['code'] ?? '';
    // $type = $_POST['type'] ?? '';
    $amount = $_POST['amount'] ?? '';
    $pro_id = array();
    $pro_name = array();
    $pro_price = array();
    $pro_id = $_POST['pro_id'];
    $pro_id = explode(",", $pro_id);
    $pro_name = $_POST['pro_name'];
    $pro_name = explode(",", $pro_name);
    $pro_price = $_POST['pro_price'];
    $pro_price = explode(",", $pro_price);
    $requested_by = $_POST['requested_by'];
    $stmt_names = $dbConn->prepare("SELECT id from `ga_order_master`");
    $stmt_names->execute();
    $count_names = $stmt_names->rowCount();
    $order_id = str_pad(intval($count_names + 1), 6, "0", STR_PAD_LEFT); //00006
    $count = $stmt_names->rowCount();

    $stm = $dbConn->prepare("INSERT INTO `ga_order_master`(`order_id`, `code`, `amount`, `requested_by`, `requested_on`, `status`, `added_by`,`added_on`) VALUES (:order_id, :code,:amount, :requested_by, :requested_on, :status, :added_by,:added_on)");
    $stm->bindParam(":order_id", $order_id, PDO::PARAM_STR);
    $stm->bindParam(":code", $code, PDO::PARAM_STR);
    $stm->bindParam(":amount", $amount, PDO::PARAM_STR);
    $stm->bindParam(":requested_by", $requested_by, PDO::PARAM_STR);
    $stm->bindParam(":requested_on", $added_on, PDO::PARAM_STR);
    $stm->bindParam(":status", $status, PDO::PARAM_STR);
    $stm->bindParam(":added_by", $added_by, PDO::PARAM_STR);
    $stm->bindParam(":added_on", $added_on, PDO::PARAM_STR);
    $stm->execute();

    $count = $stm->rowCount();
    if ($count > 0) {
        for ($i = 0; $i < count($pro_id); $i++) {
            $temp_pro_id = $pro_id[$i];
            $temp_pro_name = $pro_name[$i];
            $temp_pro_price = $pro_price[$i];
            $stm = $dbConn->prepare("INSERT INTO `ga_order_details`(`order_id`, `pro_id`, `pro_name`, `price`, `status`, `added_on`, `added_by`) values(:order_id,:pro_id,:pro_name,:price,:status,:added_on,:added_by);");
            $stm->bindParam(":order_id", $order_id, PDO::PARAM_STR);
            $stm->bindParam(":pro_id", $temp_pro_id, PDO::PARAM_STR);
            $stm->bindParam(":pro_name", $temp_pro_name, PDO::PARAM_STR);
            $stm->bindParam(":price", $temp_pro_price, PDO::PARAM_STR);
            $stm->bindParam(":status", $status, PDO::PARAM_STR);
            $stm->bindParam(":added_on", $added_on, PDO::PARAM_STR);
            $stm->bindParam(":added_by", $added_by, PDO::PARAM_STR);
            $stm->execute();
        }

        $data["added_by"] = $added_by;
        $data["status"] = 'success';
        $data["reason"] = 'application_inserted';
        array_push($response["response"], $data);
    } else {
        $data["status"] = 'failed';
        $data["reason"] = 'insert_failed';
        array_push($response["response"], $data);
    }
    array_push($response["response"], $data);
    echo json_encode($response);  // translator
}
if (isset($_POST['getAllApprover'])) {


    $stmt = $dbConn->prepare("SELECT * FROM `ga_users` WHERE type='approver'");
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count > 0) {
        $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < $count; $i++) {
            $data["id"] = $fetch_data[$i]['id'];
            $data["name"] = ucfirst($fetch_data[$i]['name']);
            $data["code"] = $base_url . $fetch_data[$i]['code'];
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
}

if (isset($_POST['update_status'])) { 
    $modified_on = date('d-m-Y H:i:s');
    $modified_by =  $_POST['code'];
    $order_id =  $_POST['order_id'];
    $status =  $_POST['status'];
    $query = "UPDATE `ga_order_master` SET `status` = :status, `modified_on` = :modified_on, `modified_by` = :modified_by WHERE order_id = :order_id";
    $stmt = $dbConn->prepare($query);
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->bindParam(':modified_on', $modified_on, PDO::PARAM_STR);
    $stmt->bindParam(':modified_by', $modified_by, PDO::PARAM_STR);
    $stmt->bindParam(':order_id', $order_id, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count > 0) { 
        $data["status"] = "success";
        $data["reason"] = "category_details_loaded";
        array_push($response["response"], $data); 
    } else {
        $data["status"] = "failed";
        $data["reason"] = "failed_to_load";
        array_push($response["response"], $data);
    }
    echo json_encode($response);
}

if (isset($_POST['getAllOrders'])) {
    $code = $_POST['code'];
    $type = $_POST['type'];

    if (strtolower($type) == 'approver') {
        $stmt = $dbConn->prepare("SELECT * FROM `ga_order_master` WHERE code= :code order by id desc"); //code == requested_for
    } else {
        $stmt = $dbConn->prepare("SELECT * FROM `ga_order_master` WHERE requested_by= :code order by id desc");
    }
    $stmt->bindParam(":code", $code, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count > 0) {
        $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC); //Order Master All records
        for ($i = 0; $i < $count; $i++) { //5
            $order_details = array();
            // Get User Details
            if (strtolower($type) == 'approver') {
                $code = $fetch_data[$i]['requested_by'];
                $stmt_names = $dbConn->prepare("Select id,code,name from `ga_users` where code = :code");
                $stmt_names->bindParam(":code", $code, PDO::PARAM_STR);
                $stmt_names->execute();
                $count_names = $stmt_names->rowCount();
                if ($count_names > 0) {
                    $fetch_data_user_name = $stmt_names->fetchAll(PDO::FETCH_ASSOC);
                    $person_name = $fetch_data_user_name[0]['name'];
                }
            } else {
                $code = $fetch_data[$i]['code']; //code == requested_for
                $stmt_names = $dbConn->prepare("Select id,code,name from `ga_users` where code = :code");
                $stmt_names->bindParam(":code", $code, PDO::PARAM_STR);
                $stmt_names->execute();
                $count_names = $stmt_names->rowCount();
                if ($count_names > 0) {
                    $fetch_data_user_name = $stmt_names->fetchAll(PDO::FETCH_ASSOC);
                    $person_name = $fetch_data_user_name[0]['name'];
                }
            }

            $order_id = $fetch_data[$i]['order_id'];
            $stmt_od = $dbConn->prepare("SELECT * FROM `ga_order_details` WHERE order_id= :order_id");
            $stmt_od->bindParam(":order_id", $order_id, PDO::PARAM_STR);
            $stmt_od->execute();
            $count_od = $stmt_od->rowCount();
            if ($count_od > 0) {
                $fetch_data_od = $stmt_od->fetchAll(PDO::FETCH_ASSOC);
                for ($j = 0; $j < $count_od; $j++) { //6
                    $order_details[] = array(
                        "id" => $fetch_data_od[$j]['id'],
                        "pro_id" => $fetch_data_od[$j]['pro_id'],
                        "pro_name" => $fetch_data_od[$j]['pro_name'],
                        "price" => $fetch_data_od[$j]['price']
                    );
                }
            }
            $data["id"] = $fetch_data[$i]['id'];
            $data["order_details"] = $order_details;
            $data["order_id"] = ucfirst($fetch_data[$i]['order_id']);
            $data["person_name"] = ucfirst($person_name);
            $data["amount"] = ucfirst($fetch_data[$i]['amount']);
            $data["requested_on"] = time_elapsed_string(ucfirst($fetch_data[$i]['requested_on']));
            $data["order_status_value"] = ucfirst($fetch_data[$i]['status']);
            if(ucfirst($fetch_data[$i]['status']) == 'A'){
                $data["order_status"] = "Order Waiting For Approval";
            }
            elseif(ucfirst($fetch_data[$i]['status']) == 'R'){
                $data["order_status"] = "Request Rejected";
            }
            elseif(ucfirst($fetch_data[$i]['status']) == 'C'){
                $data["order_status"] = "Request Accepted/Approved";
            } elseif(ucfirst($fetch_data[$i]['status']) == 'B'){
                $data["order_status"] = "Order Completed";
            }
            $data["status"] = "success";
            $data["reason"] = "orders_found";
            array_push($response["response"], $data);
        }
    } else {
        $data["status"] = "failed";
        $data["reason"] = "failed_to_load";
        array_push($response["response"], $data);
    }
    echo json_encode($response);
}
function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

