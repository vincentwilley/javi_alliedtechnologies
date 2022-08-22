<?php

session_start();

require '../connection.php';
require 'send_mail.php';

//  $db_conn = getDB();

// ini_set('display_errors', 1);

// ini_set('display_startup_errors', 1);

// error_reporting(E_ALL);

// print_r($_POST);

if (isset($_GET['delete_location'])) {

    $id = $_GET['7thas'];

    $status = $_GET['status'];

    $stmt = $dbConn->prepare("UPDATE `locations` SET  `status`= :status where id = :id");

    $stmt->bindParam(":status", $status, PDO::PARAM_STR);

    $stmt->bindParam(":id", $id, PDO::PARAM_STR);

    $stmt->execute();

    $count = $stmt->rowCount();

    if ($count > 0) {

        ?>

        <script>

            window.location.href = '../locations.php?d_status=success';

        </script>

        <?php

    } else {

        ?>

        <script>

            window.location.href = '../locations.php?d_status=failed';

        </script>

        <?php

    }

}

if (isset($_GET['delete_vehicle'])) {

    $id = $_GET['7thas'];

    $status = $_GET['status'];

    $stmt = $dbConn->prepare("UPDATE `vehicle` SET  `status`= :status where id = :id");

    $stmt->bindParam(":status", $status, PDO::PARAM_STR);

    $stmt->bindParam(":id", $id, PDO::PARAM_STR);

    $stmt->execute();

    $count = $stmt->rowCount();

    if ($count > 0) {

        ?>

        <script>

            window.location.href = '../vehicle.php?d_status=success';

        </script>

        <?php

    } else {

        ?>

        <script>

            window.location.href = '../vehicle.php?d_status=failed';

        </script>

        <?php

    }

}

if (isset($_GET['delete_driver'])) {

    $id = $_GET['7thas'];

    $status = $_GET['status'];

    $stmt = $dbConn->prepare("UPDATE `driver` SET  `status_record`= :status where id = :id");

    $stmt->bindParam(":status", $status, PDO::PARAM_STR);

    $stmt->bindParam(":id", $id, PDO::PARAM_STR);

    $stmt->execute();

    $count = $stmt->rowCount();

    if ($count > 0) {

        ?>

        <script>

            window.location.href = '../driver.php?d_status=success';

        </script>

        <?php

    } else {

        ?>

        <script>

            window.location.href = '../driver.php?d_status=failed';

        </script>

        <?php

    }

}

if (isset($_GET['delete_booking'])) {

    $id = $_GET['7thas'];

    $status = $_GET['status'];

    $stmt = $dbConn->prepare("UPDATE `requests` SET  `status`= :status where id = :id");

    $stmt->bindParam(":status", $status, PDO::PARAM_STR);

    $stmt->bindParam(":id", $id, PDO::PARAM_STR);

    $stmt->execute();

    $count = $stmt->rowCount();

    if ($count > 0) {

        ?>

        <script>

            window.location.href = '../bookings.php?d_status=success';

        </script>

        <?php

    } else {

        ?>

        <script>

            window.location.href = '../bookings.php?d_status=failed';

        </script>

        <?php

    }

}

if (isset($_GET['delete_reminder'])) {

    $id = $_GET['7thas'];

    $status = $_GET['status'];

    if ($status == 'Y') {

        $stmt = $dbConn->prepare("UPDATE `reminder` SET `r_isread`= :status where id = :id");

    } else {

        $stmt = $dbConn->prepare("UPDATE `reminder` SET  `status`= :status where id = :id");

    }

    $stmt->bindParam(":status", $status, PDO::PARAM_STR);

    $stmt->bindParam(":id", $id, PDO::PARAM_STR);

    $stmt->execute();

    $count = $stmt->rowCount();

    if ($count > 0) {

        ?>

        <script>

            window.location.href = '../reminder.php?d_status=success';

        </script>

        <?php

    } else {

        ?>

        <script>

            window.location.href = '../reminder.php?d_status=failed';

        </script>

        <?php

    }

}

if (isset($_GET['delete_fleet'])) {

    $id = $_GET['7thas'];

    $status = $_GET['status'];

    $stmt = $dbConn->prepare("UPDATE `vehicle_group` SET  `status`= :status where gr_id = :id");

    $stmt->bindParam(":status", $status, PDO::PARAM_STR);

    $stmt->bindParam(":id", $id, PDO::PARAM_STR);

    $stmt->execute();

    $count = $stmt->rowCount();

    if ($count > 0) {

        ?>

        <script>

            window.location.href = '../fleet_size.php?d_status=success';

        </script>

        <?php

    } else {

        ?>

        <script>

            window.location.href = '../fleet_size.php?d_status=failed';

        </script>

        <?php

    }

}

if (isset($_GET['delete_contact'])) {

    $id = $_GET['7thas'];

    $status = $_GET['status'];

    $stmt = $dbConn->prepare("UPDATE `contact` SET  `status`= :status where id = :id");

    $stmt->bindParam(":status", $status, PDO::PARAM_STR);

    $stmt->bindParam(":id", $id, PDO::PARAM_STR);

    $stmt->execute();

    $count = $stmt->rowCount();

    if ($count > 0) {

        ?>

        <script>

            window.location.href = '../contact.php?d_status=success';

        </script>

        <?php

    } else {

        ?>

        <script>

            window.location.href = '../contact.php?d_status=failed';

        </script>

        <?php

    }

}

if (isset($_GET['delete_bookings'])) {

    $id = $_GET['7thas'];

    $status = $_GET['status'];

    $stmt = $dbConn->prepare("UPDATE `bookings` SET  `status`= :status where id = :id");

    $stmt->bindParam(":status", $status, PDO::PARAM_STR);

    $stmt->bindParam(":id", $id, PDO::PARAM_STR);

    $stmt->execute();

    $count = $stmt->rowCount();

    if ($count > 0) {

        ?>

        <script>

            window.location.href = '../create_bookings.php?d_status=success';

        </script>

        <?php

    } else {

        ?>

        <script>

            window.location.href = '../create_bookings.php?d_status=failed';

        </script>

        <?php

    }

}

if (isset($_GET['delete_carrier'])) {

    $id = $_GET['7thas'];

    $status = $_GET['status'];
    if($status =='A'){
        $stmt = $dbConn->prepare("SELECT cr.contact FROM carrier_request cr inner join `users` u on  u.id = cr.user_id inner join vehicle_group vg on vg.gr_id = cr.fleet_size where cr.id=:id order by cr.id desc");

        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count > 0) {
            $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            send_mail($fetch_data[0]['contact'],'[Update] Your account is approved','Hello,<br> You account is Approved, now you are a verified carrier with Truck Quest');

        }
    }
    if($status =='P'){
        $stmt = $dbConn->prepare("SELECT cr.contact FROM carrier_request cr inner join `users` u on  u.id = cr.user_id inner join vehicle_group vg on vg.gr_id = cr.fleet_size where cr.id=:id order by cr.id desc");
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count > 0) {
            $fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            send_mail($fetch_data[0]['contact'],'[Update] Your account is suspended','Hello,<br> You account is Suspended, Your account has been suspended, you can contact us for more details');

        }
    }

    $stmt = $dbConn->prepare("UPDATE `carrier_request` SET  `status`= :status where id = :id");

    $stmt->bindParam(":status", $status, PDO::PARAM_STR);

    $stmt->bindParam(":id", $id, PDO::PARAM_STR);

    $stmt->execute();

    $count = $stmt->rowCount();

    if ($count > 0) {

        ?>

        <script>

            window.location.href = '../carrier.php?d_status=success';

        </script>

        <?php

    } else {

        ?>

        <script>

            window.location.href = '../carrier.php?d_status=failed';

        </script>

        <?php

    }

}

?>