<?php include 'admin/connection.php';

//   echo basename($_SERVER['PHP_SELF']);

?>



<div id="snackbar"><span id="msg"> </span></div>

<header data-spy="affix" data-offset-top="39" data-offset-bottom="0" class="large">



    <div class="row container box">

        <div class="col-md-4">

            <!-- Logo start -->

            <div class="brand">

                <h1><a class="scroll-to" href="#top"><img class="img-responsive" src="img/javi.png?1" alt="Car|Rental"></a></h1>

            </div>

            <!-- Logo end -->

        </div>



        <div class="col-md-8">

            <br>



            <div class="clearfix"></div>



            <!-- start navigation -->

            <nav class="navbar navbar-default" role="navigation">

                <div class="container-fluid">

                    <!-- Toggle get grouped for better mobile display -->

                    <div class="navbar-header">

                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

                            <span class="sr-only">Toggle navigation</span>

                            <span class="icon-bar"></span>

                            <span class="icon-bar"></span>

                            <span class="icon-bar"></span>

                        </button>

                        <a class="navbar-brand scroll-to" href="#top"><img class="img-responsive"  src="img/javi.png?" alt="Car|Rental"></a>

                    </div>

                    <!-- Collect the nav links, for toggling -->

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                        <!-- Nav-Links start -->

                        <ul class="nav navbar-nav navbar-right">

                            <li <?php if(basename($_SERVER['PHP_SELF']) =='index.php') echo ' class="active"';?> ><a href="index.php#top" class="scroll-to">Home</a></li> 

                            <li <?php if(basename($_SERVER['PHP_SELF']) =='carrier.php') echo ' class="active"';?>><a href="carrier.php" class="scroll-to">Carrier</a></li>

                            <li <?php if(basename($_SERVER['PHP_SELF']) =='faq.php') echo ' class="active"';?>><a href="faq.php" class="scroll-to">FAQ</a></li>
 

                            <li class="dropdown <?php if(basename($_SERVER['PHP_SELF']) =='brokers.php') echo 'active';?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Network <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/admin">Admin Trucker   </a></li>
                                    <li><a href="brokers.php">Admin Network</a></li>
                                </ul>
                            </li>

                            <li <?php if(basename($_SERVER['PHP_SELF']) =='partners.php') echo ' class="active"';?>><a href="partners.php" class="scroll-to">Partners</a></li>

                            <li  ><a href="index.php" class="scroll-to">Contact</a></li>

                            <?php

if (isset($_SESSION['truckquest_email']) && !empty($_SESSION['truckquest_email'])) {

    ?><li><a href="index.php#contact" class="scroll-to"><?php echo explode("@",ucfirst($_SESSION['truckquest_email']))[0]; ?></a></li>

                                <?php

} else {

    ?>

 <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Account <span class="caret"></span></a>

                                <ul class="dropdown-menu" role="menu">

                                    <li><a href="signin.php">Sign In</a></li>

                                    <li><a href="signup.php">Sign Up</a></li>

                                </ul>

                            </li>

<?php

}

?>



                        </ul>

                        <!-- Nav-Links end -->

                    </div>

                </div>

            </nav>

            <!-- end navigation -->

        </div>

    </div>



</header>

