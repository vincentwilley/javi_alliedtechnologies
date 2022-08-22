<?php
function send_mail($to,$subject,$msg){ 

$message = "
<html>
<head>
<title>$subject</title>
</head>
<body>
<p>$msg</p>  
<br>
<br>
<br>
<br>
Regards,<br>
Truck Quest.
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <alliedtechnologies59@gmail.com>';

return mail($to,$subject,$message,$headers);
}
?>