<?php
session_start();

if (!isset($_SESSION['truckquest_email'])) {
    ?>
	<script>
	 window.location.href = 'signin.php';
	 </script>
	<?php
}
?>

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TruckQuest</title>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link href="css/ie8fix.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:900' rel='stylesheet' type='text/css'>
    <![endif]-->
	<?php include 'includes/links.php';?>
		<!-- Fav and touch icons -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="img/ico/apple-touch-icon-57-precomposed.png">
		<link rel="shortcut icon" href="img/ico/favicon.png"> </head>

<body id="top" data-spy="scroll" data-target=".navbar" data-offset="260">
	<!-- Header start -->
	<?php include 'includes/header.php';?>
		<!-- Header end -->
		 
		<!-- Teaser end -->

		<!-- Contact start -->
		<section id="contact" class="container wow bounceInUp" data-wow-offset="50">
			<div class="row">
				<div class="col-md-12">
					<h2>Contact Us</h2> </div>

				<div class="col-md-12 col-xs-12 pull-left">
					<p class="contact-info">You have any questions or need additional information?
					 </p>
					<form action="#" method="post" id="contact-form" name="contact-form">
						<div class="form-group">
							<input type="email" class="form-control email text-field" name="email" placeholder="Email:"> </div>
						<div class="form-group">
							<textarea class="form-control message" name="message" placeholder="Message:"></textarea>
						</div>
						<input type="submit" class="btn submit-message" name="submit-message" value="Submit Query"> </form>
				</div>
			</div>
		</section>
		<!-- Contact end --><a href="#" class="scrollup">ScrollUp</a>
		<!-- Footer start -->
		<?php include 'includes/footer.php';?>
			<!-- Footer end -->

			<?php include 'includes/scripts.php';?>
</body>

</html>