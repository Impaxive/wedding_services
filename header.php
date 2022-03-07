<?php
session_start();
 ?>
<!DOCTYPE html>

<head>

    <!-- Basic Page Needs ================================================== -->
    <title>Wedding Services | Home - Wedding Services</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS ================================================== -->
    <link rel="stylesheet" href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/css/style.css">
    <link rel="stylesheet" href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/css/main-color.css" id="colors">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>

        .main-search-container:before {
            background: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0));
        }

        .main-search-container h2 {
            color: #fff;
            font-size: 41px;
            font-weight: 500;
        }


        @media (max-width: 776px) {

            .main-search-container h2 {
                color: #fff;
                font-size: 28px;
                font-weight: 400;
            }

            .main-search-container {
                height: auto;
            }

            .main-search-inner {
                position: relative;
                top: 0;
                transform: none;
                padding-top: 30px;
                padding-bottom: 45px;
            }

        }

        .main-search-inner {
            text-align: center;
        }

        .main-search-input .chosen-container-single .chosen-single div {
            display: inline-block;
            position: relative;
            top: -2px;
            float: right;
        }


        #servicesPageLink h3 {
            color: #ef55a0;
            text-align: right;
            font-size: 18px;
            font-weight: 500;
        }

        #servicesPageLink h3:hover {
            color: rgb(73, 55, 55);
        }

        .main-search-input-item .chosen-container-single .chosen-single {
            z-index: 0;
        }

        @media (min-width: 768px) {

            #iconsBoxWithText {
                width: 33.33%;
                float: left;
            }
        }

        @media (max-width: 768px) {

            .items-center {
                justify-content: center !important;
            }
        }

        #modalLink:hover {
            cursor: pointer;
        }

        #modalLink, #modalLink i {
	      margin-left: 10px;
	      margin-right: 10px;
        }

        .modal-content {
           min-height: 600px;
        }
        .modal-backdrop {
            background-color:transparent;
        }

         /* The Close Button */
        .close {
           color: #000;
           float: right;
           font-size: 28px;
           font-weight: bold;
           opacity: 1;
        }

        .close:hover, .close:focus {
           color: rgb(90, 70, 70);
           text-decoration: none;
           cursor: pointer;
        }

        #myModal .main-search-input-item {
            padding: 0px;
            box-shadow: 0px 0px 6px 0px rgb(0 0 0 / 15%);
        }

        #myModal .chosen-container-single .chosen-single {
            overflow: hidden;
            z-index: 100;
        }

        #myModal .chosen-container-single .chosen-single div:after {
            content: "\f002" !important;
            font-family: "FontAwesome";
        }

        #myModal .chosen-container-active.chosen-with-drop .chosen-single div:after {
            transform: translate3d(0, 0, 0) rotate(360deg);
        }

        .boxed-photo-banner-text {
            position: relative;
            z-index: 10;
            max-width: 100%;
        }

        .boxed-photo-banner:before {
            background: linear-gradient(270deg, rgba(250, 250, 250, 1) 0%, rgba(0, 0, 0, 1) 100%);
            opacity: 1;
        }
        #breadcrumbs ul li:before {
            font-size: 10px !important;
        }
        .social-icons li {
            margin-top: unset;
            margin-right: 6px;
            transform: scale(0.9);
            -webkit-transform: scale(0.9);
        }
        .social-icons li a {
            width: 40px;
            height: 40px;
            background-color: unset;
        }
        .social-icons li a:hover, .social-icons li a i {
            color: #fff;
            background-color: #32bde6 !important;
            border-radius: 50% !important;
        }
        .social-icons li a:hover i {
            top: -1px !important;
        }
        .facebook i {
            margin: 13px 0 0 13px !important;
        }
        .instagram i {
            margin: 13px 0 0 13px !important;
        }
        .youtube i {
            margin: 13px 0 0 13px !important;
        }
        .pinterest i {
            margin: 13px 0 0 13px !important;
        }
        .facebook:before {
            color: white;
            margin: 13px 0 0 13px !important;
        }
        .twitter:before {
            color: white;
            margin: 13px 0 0 13px !important;
        }
        .instagram:before {
            color: white;
            margin: 13px 0 0 13px !important;
        }
        .youtube:before {
            color: white;
            margin: 13px 0 0 13px !important;
        }
        .pinterest:before {
            color: white;
            margin: 13px 0 0 13px !important;
        }
        .btn {
            background: #32bde6 !important;
            color: #fff !important;
            font-weight: 400 !important;
        }
        .btn:hover {
            border: 1px solid #32bde6;
            color: #32bde6 !important;
            background: #fff !important;
            font-weight: 400 !important;
        }
        .btn-live {
            background: #32bde6 !important;
            color: #fff !important;
            font-weight: 400 !important;
        }
        .btn-live:hover {
            color: #fff !important;
            background: #ef55a0 !important;
            font-weight: 400 !important;
        }
        .btn-def {
            border: 1px solid #ef55a0 !important;
            background: #fff !important;
            color: #ef55a0 !important;
            font-weight: 400 !important;
        }
        .btn-def:hover {
            border: 1px solid #32bde6 !important;
            color: #fff !important;
            background: #32bde6 !important;
            font-weight: 400 !important;
            text-decoration: unset !important;
        }
        .font-center {
            display: flex;
            justify-content: center;
        }
        a {
            text-decoration: unset !important;
        }
        /* mycheckavModal CSS */

       /* .modal-content {
           min-height: 600px;
        }
        .modal-backdrop {
            background-color:transparent;
        }

         /* The Close Button */
        /*.close-model {
           color: #000;
           float: right;
           font-size: 28px;
           font-weight: bold;
           opacity: 1;
        }

        .close-model:hover,.close-model:focus {
           color: rgb(90, 70, 70);
           text-decoration: none;
           cursor: pointer;
        } */
    </style>
</head>

<body>
<!-- Modal -->
<form enctype="multipart/form-data" method="POST">
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content" style="min-height: 450px;">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                    <h4 class="modal-title">Select City</h4>
                </div>
                <div class="modal-body">
                    <div class="main-search-input-item">
                        <select name="location_url" class="chosen-select" data-placeholder="Search Your City">
                            <option></option>
                            <?php 
                                $sql3 = "SELECT * FROM locations";
                                $result3 = $conn->query($sql3);
                                // output data of each row
                                if($result3->num_rows > 0){
                                    while ($row = $result3->fetch_assoc()) {
                                        $city = $row['city'];
                                        $locationId = $row['location_id'];
                                        $location_url = $row['url'];
                            ?>
                                <option value="<?php echo $row['url']; ?>"><?php echo $city; ?></option>
                            <?php 
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="button" type="submit" name="submitloc">Submit</button>
                </div> 
            </div>
        </div>
    </div>
</form>


<?php echo $_SESSION['list_vendor_id'];
echo $_SESSION['list_individual_id'];
 ?>

<form enctype="multipart/form-data" method="POST">
	<div class="modal" id="mycheckavModal">
		<div class="modal-dialog">
			<div class="modal-content" style="450px">
				<div class="modal-header">
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
					<h4 class="modal-title">Check Availability</h4>
				</div>
					<?php
						if (isset($_POST['submitca'])){
							$name=$_POST['name'];
							$email_id=$_POST['email_id'];
							$created_date =date('Y-m-d');
							$mobile_number = $_POST['mobile_number'];
							$requirement = $_POST['requirement'];
							$from_d = $_POST['from_date'];
							$from_date = date('Y-m-d', strtotime($from_d));
							$to_d = $_POST['to_date'];
							$to_date = date('Y-m-d', strtotime($to_d));
							$budget = $_POST['budget'];

                            $v_name = $_SESSION['list_vendor_id'];
                            $listing_id = $_SESSION['list_individual_id'];

							$sql = "INSERT INTO contact(name,email_id,mobile_number,requirement,list_id,vendor_id,from_date,to_date,budget,created_date)
									VALUES('$name','$email_id','$mobile_number','$requirement','$listing_id','$v_name','$from_date','$to_date','$budget','$created_date')";
							$insresult = $conn->query($sql);
							if($insresult === TRUE){
								$new_id = $conn->insert_id;
								// echo '<script> alert("Request Submitted Successfully");</script>';
								// echo "<script>window.location.href='http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/$locurl/$catUrl/$listurl';</script>";
							}
							else{
								echo '<script> alert("Something went wrong!");</script>';
							}
						}
					?>
				<div class="modal-body">
					<fieldset>
						<div class="row">
							<div class="col-md-12">
								<label>Name:</label>
								<input type="text" value="" name="name" />
							</div>
								
							<div class="col-md-6">
								<label>Email:</label>
								<input type="email" value="" name="email_id" />
							</div>

							<div class="col-md-6">
								<label>Mobile Number:</label>
								<input type="number" value="" name="mobile_number" />
							</div>

							<div class="col-md-6">
								<label>From Date:</label>
								<input type="date" value="" name="from_date" style="margin: 0px 0px 16px 0px;" />
							</div>

							<div class="col-md-6">
								<label>To Date:</label>
								<input type="date" value="" name="to_date" style="margin: 0px 0px 16px 0px;" />
							</div>

							<div class="col-md-12">
								<label>Budget:</label>
								<input type="text" value="" name="budget" />
							</div>

							<div class="col-md-12">
								<label>Requirement:</label>
								<textarea type="text" rows="2" value="" name="requirement"></textarea>
							</div>
						</div>

					</fieldset>
				</div>
				<div class="modal-footer">
					<button class="button" type="submit" name="submitca">Submit</button>
					<div class="clearfix"></div>
				</div> 
			</div>
		</div>
	</div>
</form>



<form enctype="multipart/form-data" method="POST">
    <div class="modal" id="mycontactModal">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <span class="close" data-bs-dismiss="modal" aria-label="Close">&times;</span> -->
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                    <h4 class="modal-title">Contact</h4>
                </div>
                    <?php
                        if (isset($_POST['submitcontact'])){
                            $name=$_POST['name'];
                            $email_id=$_POST['email_id'];
                            $created_date =date('Y-m-d');
                            $mobile_number = $_POST['mobile_number'];
                            $requirement = $_POST['requirement'];

                            $v_name = $_SESSION['list_vendor_id'];
                            $listing_id = $_SESSION['list_individual_id'];

                            $sql = "INSERT INTO contact(name,email_id,mobile_number,requirement,list_id,vendor_id,created_date)
                                    VALUES('$name','$email_id','$mobile_number','$requirement','$listing_id','$v_name','$created_date')";
                            $insresult = $conn->query($sql);
                            if($insresult === TRUE){
                                $new_id = $conn->insert_id;
                                // echo '<script> alert("Request Submitted Successfully");</script>';
                                // echo "<script>window.location.href='http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/$locurl/$catUrl/$listurl';</script>";
                            }
                            else{
                                echo '<script> alert("Something went wrong!");</script>';
                            }
                        }
                    ?>
                <div class="modal-body">
                    <fieldset>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Name:</label>
                                <input type="text" value="" name="name" />
                            </div>
                                
                            <div class="col-md-12">
                                <label>Email:</label>
                                <input type="email" value="" name="email_id" />
                            </div>

                            <div class="col-md-12">
                                <label>Mobile Number:</label>
                                <input type="number" value="" name="mobile_number" />
                            </div>

                            <div class="col-md-12">
                                <label>Requirement:</label>
                                <input type="text" value="" name="requirement">
                            </div>
                        </div>


                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button class="button" type="submit" name="submitcontact">Submit</button>
                    <div class="clearfix"></div>
                </div> 
            </div>
        </div>
    </div>
</form>

    <div id="wrapper">

        <!-- Header Container ================================================== -->
        <header id="header-container" class="fullwidth">
            <!-- Header -->
            <div id="header" style="padding-top: 0px;">
                <div style="background: #ef55a0;">
                    <div class="container" style="width: 100% !important;">
                        <div class="row margin-top-5">
                            <div class="col-md-4 col-sm-12 col-xs-12 items-center padding-left-0 padding-right-0" style="display: flex; justify-content: start; align-items: center;">
                                <?php if(!$_SESSION['locationUrl']){
                                    $sql = "SELECT * FROM locations WHERE url = 'hyderabad' ";
                                    $result = $conn ->query($sql);
                                    if($result->num_rows > 0){
                                        while ($row = $result->fetch_assoc()) {
                                            $cityLoc = $row['city'];
                                            $locationId = $row['location_id'];
                                            $url = $row['url'];
                                            $_SESSION['locationUrl'] = $url;
                                            
                                        }}
                                    ?>
                                    <a id="modalLink" data-bs-toggle="modal" data-bs-target="#myModal" style="color: white; padding: 12px 0px;">
                                        <i class="fa fa-map-marker"></i><?php echo $cityLoc ?>
                                    </a>
                                <?php }else if($_SESSION['locationUrl']){
                            
                                $location_url = $_SESSION['locationUrl'];
                                // $location_url = mysqli_real_escape_string($conn,$_GET['url']);
                                $sql = "SELECT * FROM locations WHERE url = '$location_url' ";
                                $result = $conn ->query($sql);
                                if($result->num_rows > 0){
                                    while ($row = $result->fetch_assoc()) {
                                        $cityLoc = $row['city'];
                                        $locationId = $row['location_id'];
                                        
                                    }}
                                    ?>
                                    <a id="modalLink"  data-bs-toggle="modal" data-bs-target="#myModal" style="color: white; padding: 12px 0px;">
                                        <i class="fa fa-map-marker"></i><?php echo $cityLoc;?>
                                    </a>
                                    <!-- <p></p> -->
                                <?php } ?>
                            </div>
                            <div class="col-md-8 col-sm-12 col-xs-12 items-center padding-left-0 padding-right-0" style="display: flex; justify-content: flex-end; align-items: center;">
                                <ul class="social-icons" style="margin-bottom: 0px;">
                                    <li><a class="facebook" href="https://www.facebook.com/Wedding-Services-107199971716697" target="_blank"><i class="icon-facebook"></i></a></li>
                                   <!-- <li><a class="twitter" href="#"><i class="icon-twitter" target="_blank"></i></a></li>-->
                                    <li><a class="instagram" href="https://www.instagram.com/weddingservicesofficial/" target="_blank"><i class="icon-instagram"></i></a></li>
                                    <li><a class="youtube" href="https://www.youtube.com/channel/UC5CYKd_JWdfx1p5YsLVA86Q" target="_blank"><i class="icon-youtube"></i></a></li>
                                    <li><a class="pinterest" href="https://in.pinterest.com/weddingservicesindiapvtltd/_saved/" target="_blank"><i class="icon-pinterest"></i></a></li>
                                </ul>

                                <a href="tel:+919030099995" style="color: white;">+91 9030099995</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container padding-top-20 padding-bottom-15" style="width: 100% !important;">
                    <!-- Left Side Content -->
                    <div class="left-side">
                        
                        <!-- Logo -->
                        <div id="logo">
                            <a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/index.php"><img src="https://mywedservices.s3.ap-south-1.amazonaws.com/images/amsan-wedding-services.png" alt=""></a>
                        </div>

                        <?php
                            $l_url = $_SESSION['locationUrl'];
                            $sql = "SELECT * FROM categories WHERE category_id = '11'"; 
                            $result = $conn->query($sql);  
                            if($result->num_rows > 0){
                            while ($row = $result->fetch_assoc()) {
                                $title = $row['title'];
                                $category_u = $row['url'];
                                $featured_image = $row['featured_image'];
                                $catid = $row['category_id'];
                                $desc = $row['description'];
                            }
                        }   
                        ?>

                        <!-- Mobile Navigation -->
                        <div class="mmenu-trigger">
                            <button class="hamburger hamburger--collapse" type="button">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>

                        <!-- Main Navigation -->
                        <nav id="navigation" class="style-1">
                            <ul id="responsive">

                                <li><a class="" href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/index.php">Home</a>
                                </li>

                                <li><a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/<?php echo $l_url ?>/<?php echo $category_u ?>">Venues</a>
                                </li>

                                <li><a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/categories">Services</a>
                                    <!-- <div class="mega-menu mobile-styles three-columns">

                                        <div class="mega-menu-section">
                                            <ul style="text-align: center;">
                                                <li class="mega-menu-headline">Services #1</li>
                                                <li><a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/categories">Service 1</a></li>
                                                <li><a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/categories">Service 2</a></li>
                                                <li><a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/categories">Service 3</a></li>
                                                <li><a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/categories">Service 4</a></li>
                                            </ul>
                                        </div>

                                        <div class="mega-menu-section">
                                            <ul style="text-align: center;">
                                                <li class="mega-menu-headline">Services #2</li>
                                                <li><a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/categories">Service 5</a></li>
                                                <li><a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/categories">Service 6</a></li>
                                                <li><a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/categories">Service 7</a></li>
                                                <li><a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/categories">Service 8</a></li>
                                            </ul>
                                        </div>

                                        <div class="mega-menu-section">
                                            <ul style="text-align: center;">
                                                <li class="mega-menu-headline">Services #3</li>
                                                <li><a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/categories">Service 9</a></li>
                                                <li><a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/categories">Service 10</a></li>
                                                <li><a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/categories">Service 11</a></li>
                                                <li><a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/categories">Service 12</a></li>
                                            </ul>
                                        </div>

                                    </div> -->
                                </li>

                                <!-- <li><a href="/wedding-stories.php">Wedding Stories</a>
                                </li> -->

                                <!-- <li><a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/contact-form.php">Contact</a>
                                </li> -->

                                <li><a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/vendors.php">For Vendors</a>
                                </li>

                                <li class="visible-sm visible-xs visible-sm-block visible-xs-block"><a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/live-booking.php">Live Booking</a>
                                </li>

                                <li class="margin-left-70 visible-lg visible-md visible-lg-block visible-md-block"><a class="btn-live" href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/live-booking.php">Live Booking</a>
                                </li>


                            </ul>
                        </nav>
                        <div class="clearfix"></div>

                    </div>
                    <!-- Left Side Content / End -->

                </div>
            </div>
            <!-- Header / End -->

        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->

        
        <?php 
            if(isset($_POST['submitloc'])){
                $urlLoc = $_POST['location_url']; 
                $_SESSION['locationUrl'] = $urlLoc;
                $baseurl='http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/index.php';
            //echo $_POST['location_url'];
            echo "<script>window.location.href='$baseurl';</script>";
        }
        ?>