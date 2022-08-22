<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Truck Quest</title> 
	<?php include 'includes/links.php';?>
		<!-- Fav and touch icons -->
		<link rel="apple-touch-icon" sizes="180x180" href="img/favicon_io/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="img/favicon_io/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="img/favicon_io/favicon-16x16.png">
		<link rel="manifest" href="img/favicon_io/site.webmanifest">
</head>

<body id="top" data-spy="scroll" data-target=".navbar" data-offset="260">
	<!-- Header start -->
	<?php include 'includes/header.php';?>
		<!-- Header end -->
		<!-- Teaser start -->
		<section id="teaser">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-xs-12 pull-right">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							<!-- Wrapper for slides start -->
							<div class="carousel-inner">

								<div class="item active">
									<h1 class="title">Get real time pricing
                      <span class="subtitle">Plan now</span></h1>
									<div class="car-img"> <img src="img/truck.png" class="img-responsive" alt="TruckQuest Truck image"> </div>
								</div>
							</div>
							<!-- Wrapper for slides end -->
             </div>
					</div>
					<div class="col-md-5 col-xs-12 pull-left">
						<div class="reservation-form-shadow">
							<form action="#" method="post" name="car-select-form" id="book_now_form">
								<div class="alert alert-danger hidden" id="car-select-form-msg">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <strong>Note:</strong> All fields required! </div>
								<!-- Car select start -->
									<div class="styled-select-car">
									<select name="v_type" id="car-select" required>
										<option value="">Select Vehicle Type <span style="color:red">*</span></option>
										<!-- <option value="">Select Vehicle Type</option>  -->
										<option value="Bobtail">Bobtail</option>
										<option value="Van">Van</option>
										<option value="Truck">Truck</option>
									</select>
								</div>
								<!-- Car select end -->
								<div class="alert alert-danger hidden" id="car-select-form-msg">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <strong>Note:</strong> All fields required! </div>
								<!-- Car select start -->
									<div class="styled-select-car">
									<select name="eqp" id="car-select" required>
										<option value="">Select Equipment Network <span style="color:red">*</span></option>
										<!-- <option value="">Select Vehicle Type</option>  -->
										<option value="Standard - 20">Standard - 20'</option>
										<option value="Standard - 40'">Standard - 40'</option>
										<option value="High Cube - 40'">High Cube - 40'</option>
										<option value="High Cube - 45'">High Cube - 45'</option>
										<option value="Reefer - 20">Reefer - 20'</option>
										<option value="Reefer - 40">Reefer - 40'</option>
										<option value="Double doors- 20'">Double doors- 20'</option>
										<option value="Double doors - 40">Double doors - 40'</option>
										<option value="Open Top - 20'">Open Top - 20'</option>
										<option value="Open Top - 40'">Open Top - 40'</option>
										<option value="Pallet wide - 20'">Pallet wide - 20'</option>
										<option value="Pallet wide - 40'">Pallet wide - 40'</option>
										<option value="Flat rack - 20'">Flat rack - 20'</option>
										<option value="Flat rack - 40'">Flat rack - 40'</option>
										<option value="Hard Top - 20'">Hard Top - 20'</option>
										<option value="Hard Top - 40'">Hard Top - 40'</option>
										<option value="Hard Top - 40' High cube' ">Hard Top - 40' High cube' </option>
										<option value="Flat bed - 20'">Flat bed - 20'</option>
										<option value="Flat bed - 40">Flat bed - 40'</option>
										<option value="Expandable Flat Bed - 40'">Expandable Flat Bed - 40'</option>
										<option value="Expandable Flat Bed - 4">Expandable Flat Bed - 45'</option>
										<option value="Side door - 20'">Side door - 20'</option>
										<option value="Side door - 40'">Side door - 40'</option>
										<option value="Low boy flat bed">Low boy flat bed</option>
										<option value="Other">Other</option>
										<option value="Garment on Hanger - 20'">Garment on Hanger - 20'</option>
										<option value="BobtaGarment on Hanger - 40'il">Garment on Hanger - 40'</option>
										<option value="Drive van">Drive van</option>
										<option value="Power only">Power only</option>

									</select>
								</div>
								<!-- Car select end -->
								<!-- Pick-up location start -->
								<div class="location">
									<div class="input-group pick-up"> <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span> Pick-up <span style="color:red">*</span></span>
										<input type="text" name="pick-up-location" id="pick-up-location" class="form-control autocomplete-location" placeholder="Enter a City or Town" required> </div>
								</div>
								<!-- Drop-off location end -->
								<div class="location">
								 	<div class="input-group pick-up"> <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span> Drop <span style="color:red">*</span> </span>
									<input type="text" name="drop-location" id="drop-up-location" class="form-control autocomplete-location" placeholder="Enter a City or Town" onchange="calculate_distance()" required> </div>

								</div>
								<!-- Pick-up date/time start -->
								<div class="datetime pick-up">
										<div class="input-group"> <span class="input-group-addon pixelfix"><span class="glyphicon glyphicon-calendar"></span> Pick-up <span style="color:red">*</span></span>
											<input type="text"   name="pick-up-date" id="pick-up-date" class="form-control datepicker" placeholder="MM/DD/YYYY" required> </div>


									<div class="clearfix"></div>
								</div>
								<!-- Pick-up date/time end -->

								<input type="hidden" class="submit" name="save_request" value="Book Now" id="checkoutModalLabel">
								<input type="submit" class="submit" name="save_request" value="Search" id="checkoutModalLabel"> </form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="arrow-down"></div>
		<!-- Teaser end -->
		<!-- Services start -->
		<section id="services" class="container">
			<div class="row">
				<div class="col-md-12 title">
					<h2>Services</h2> <span class="underline">&nbsp;</span> </div>
				<!-- Service Box start -->
				<div class="col-md-4">
					<div class="service-box wow fadeInLeft" data-wow-offset="100">
						<div class="service-icon"><img src="img/icons/leadership.png" style="width:100%"></div>
						<h3 class="service-title">Leadership</h3>
						<div class="clearfix"></div>
						<p class="service-content">Experts who have extensive, hands-on experience in supply chain management.</p>
					</div>
				</div>
				<!-- Service Box end -->
				<!-- Service Box start -->
				<div class="col-md-4">
					<div class="service-box wow fadeInLeft" data-wow-offset="100">
						<div class="service-icon"><img src="img/icons/technology.png" style="width:100%"></div>
						<h3 class="service-title">Technology</h3>
						<div class="clearfix"></div>
						<p class="service-content">Innovative and varied use of technology on the road, ocean, railways, in the air.</p>
					</div>
				</div>
				<!-- Service Box end -->
				<!-- Service Box start -->
				<div class="col-md-4">
					<div class="service-box wow fadeInLeft" data-wow-offset="100">
						<div class="service-icon"><img src="img/icons/solution.png" style="width:100%"></div>
						<h3 class="service-title">Solution</h3>
						<div class="clearfix"></div>
						<p class="service-content">Global leaders in intermodal, less-than-truckload, supply chain management.</p>
					</div>
				</div>
				<!-- Service Box end -->
			</div>
		</section>
		<!-- Services end -->
		<!-- Newsletter start -->
		<section id="newsletter" class="wow slideInLeft" data-wow-offset="300">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						 <h2 class="count">"We help part of the Supply Chain, logistics industry, and multiple land carriers to improve, integrate and streamline their operations and mutual communication, No more empty miles, reducing carbon emissions to contribute to the Environment."</h2>
					</div>
				</div>
			</div>
		</section>
		<!-- Newsletter end -->
		<!-- Newsletter start -->
		<section id="newsletter" class="wow slideInLeft" data-wow-offset="300">
			<div class="container">
				<div class="row">
					<div class="col-md-12">

					</div>
					<div class="col-md-3 col-xs-12 text-center">
						 <img src="img/icons/appdownload.png" style="width:60%">
						 <span><h2 class="count"><b>8 M+</b></h2></span><br>
						 <span><h3 class="count">App downloads<h3></span><br>
					</div>
					<div class="col-md-3 col-xs-12 text-center">
						 <img src="img/icons/business.png" style="width:60%">
						 <span><h2 class="count"><b>700 M+</b></h2></span><br>
						 <span><h3 class="count">Truck-safe miles routed<h3></span><br>
					</div>
					<div class="col-md-3 col-xs-12 text-center">
						 <img src="img/icons/community.png" style="width:60%">
						 <span><h2 class="count"><b>4 M+</b></h2></span><br>
						 <span><h3 class="count">Community generated updates<h3></span><br>
					</div>
					<div class="col-md-3 col-xs-12 text-center">
						 <img src="img/icons/truck.png" style="width:60%">
						 <span><h2 class="count"><b>500 K+</b></h2></span><br>
						 <span><h3 class="count">Local business partners<h3></span><br>
					</div>
				</div>
			</div>
		</section>
		<!-- Newsletter end -->
		<!-- Partners start -->
		<section id="partners" class="wow fadeIn" data-wow-offset="50">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2>Track Your Shipment Here</h2> <span class="underline">&nbsp;</span>
						<!-- <p>To contribute to positive change and achieve our sustainability goals, we partner with many extraordinary organizations around the world. Their expertise enables us to do far more than we could alone, and their passion and talent inspire us. It is our pleasure to introduce you to a handful of the organizations whose accomplishments and commitments are representative of all the organizations we are fortunate to call our partners.</p> -->
					</div>
					<div class="col-md-12 col-xs-12 text-center">
						<form>
							<div class="form-group col-md-12">
								<input type="text" class="input" id="email" placeholder="Enter Shipment ID">
							</div>
							<div class="form-group col-md-12 text-center">
									<input type="submit" class="btn submit" name="submit" value="Track" id="checkoutModalLabel">
							</div>


						</form>
					</div>
				</div>
			</div>
		</section>
		<!-- Partners end -->
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
							<input type="email" class="form-control email text-field" name="email" placeholder="Enter Email"> </div>
						<div class="form-group">
							<textarea class="form-control message" name="message" placeholder="Message:"></textarea>
						</div>
						<input type="hidden"  name="submit-message" value="Submit">
						<input type="submit" class="btn submit-message" value="Submit Query"> </form>
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