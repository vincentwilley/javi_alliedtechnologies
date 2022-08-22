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

	<title>Truck Quest</title>

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

		<!-- Teaser start -->

		<section id="teaser">

			<div class="container">

				<div class="row">

					<div class="col-md-5 col-xs-12 pull-right">

						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

							<!-- Wrapper for slides start -->

							<div class="carousel-inner">



								<div class="item active">

									<h1 class="title">A multiple loads from Supply Chain and logistics industry

                      <span class="subtitle">Truck Quest Carrier</span></h1>

									<div class="car-img"> <img src="img/truck.png" class="img-responsive" alt="TruckQuest Truck image"> </div>

								</div>

							</div>

							<!-- Wrapper for slides end -->

             </div>

					</div>

					<div class="col-md-7 col-xs-12 pull-left">

						<div class="reservation-form-shadow">

							<form action="#" method="post" name="car-select-form" id="carrier_form">

								<div class="alert alert-danger hidden" id="car-select-form-msg">

									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <strong>Note:</strong> All fields required! </div>



								<!-- Pick-up location start -->

								<div class="col-md-6 location">

									<div class="input-group pick-up">  

										<label>First Name<span style="color:red">*</span></label> 

										<input type="text" name="fname" id="pick-up-location" class="form-control  " placeholder="Enter First Name " required> </div>

								</div>

								<!-- Drop-off location end -->

								<div class="col-md-6  location">

									<div class="input-group pick-up">  

										<label>Last Name<span style="color:red">*</span></label> 

								 	 <input type="text" name="lname"   class="form-control  " placeholder="Enter Last Name "  required> </div>



								</div>
								<!-- Pick-up location start -->

								<div class="col-md-6 location">

									<div class="input-group pick-up">  

										<label>Carrier Name<span style="color:red">*</span></label> 

										<input type="text" name="name" id="pick-up-location" class="form-control  " placeholder="Enter Carrier Name " required> </div>

								</div>

								<!-- Drop-off location end -->

								<div class="col-md-6  location">

									<div class="input-group pick-up">  

										<label>Contact Number<span style="color:red">*</span></label> 

								 	 <input type="text" name="contact"   class="form-control  " placeholder="Enter Contact Number "  required> </div>



								</div>

								<div class="col-md-6  ">

										<label>Vehicle Type<span style="color:red">*</span></label> 

									<select name="type" id="car-select" class="form-control  " required>

										<option value="">Select Vehicle Type <span style="color:red">*</span></option>

										 <?php

										$stmt = $dbConn->prepare("SELECT * FROM `vehicle` ");

										$stmt->execute();

										$count = $stmt->rowCount();

										if ($count > 0) {

											$fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

											for ($i = 0; $i < $count; $i++) {

												?>

													<option value="<?=$fetch_data[$i]["reg_no"]?>"><?=$fetch_data[$i]["name"]?></option>

													<?php

												}

										}



										?>

									</select>

								</div>

								<!-- Drop-off location end -->

								<div class="col-md-6 location">

									<div class="input-group pick-up"> 

										<label>DOT<span style="color:red">*</span></label>

								 	 <input type="number" name="dot"   class="form-control  " placeholder="DOT number(1-8 digits)"  required> </div>



								</div>

								<div class="col-md-6 location">

									<div class="input-group pick-up"> 

										<label>Business Email<span style="color:red">*</span></label>

								 	 <input type="text" name="drop-location"   class="form-control  " placeholder="Must be email@yourdomain.com"  required> </div>



								</div>

								<div class="col-md-6 location">

									<div class="input-group pick-up">

										<label>MC / SCAC Code<span style="color:red">*</span></label> 

								 	 <input type="text" name="ms_sac"   class="form-control  " placeholder="Enter MC / SCAC Code"  required> </div>



								</div> 

								<div class="col-md-6 location">

									<div class="input-group pick-up"> 

										<label>MX / FF Code<span style="color:red">*</span></label>

								 	 <input type="text" name="mx_ff"   class="form-control  " placeholder="Enter MX / FF Code"  required> </div>



								</div> 

								<div class="col-md-6  ">

										<label>What best specifies?<span style="color:red">*</span></label>

									<select name="best" id="car-select" class="form-control  " required>

										<option value="">Select   <span style="color:red">*</span></option>

										<option value="Dispatcher">Dispatcher</option>
										<option value="Company Driver">Company Driver</option>
										<option value="Owner operator">Owner operator</option>
										<option value="Driver-dispatcher">Driver-dispatcher  </option>

									</select>

								</div>

								<div class="col-md-12  ">

										<label>Select Fleet Size <span style="color:red">*</span></label>

									<select name="fleet_size" id="car-select" class="form-control  " required>

										<option value="">Select Fleet Size <span style="color:red">*</span></option>
										<?php
											$stmt = $dbConn->prepare("SELECT * FROM `vehicle_group` where status = 'A' ");
											$stmt->execute();
											$count = $stmt->rowCount();
											if ($count > 0) {
												$fetch_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
												for ($i = 0; $i < $count; $i++) {
													?>
														<option value="<?=$fetch_data[$i]["gr_id"]?>"><?=$fetch_data[$i]["gr_name"]?></option>
													<?php
											}
											}

											?>
									</select>

								</div>



								<!-- Pick-up date/time end -->



								<input type="hidden" class="submit" name="save_request" value="Sign Up" id="checkoutModalLabel">

								<input type="submit" class="submit" name="save_request" value="Sign Up" id="checkoutModalLabel"> </form>

						</div>

					</div>

				</div>

			</div>

		</section>

		<div class="arrow-down"></div>

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