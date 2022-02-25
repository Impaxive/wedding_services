
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
            color: rgb(255, 0, 51);
            text-align: right;
            font-size: 18px;
            font-weight: 500;
        }

        #servicesPageLink h3:hover {
            color: black;
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


        /* The Modal (background) */
        .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: #e6e6e6; /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        height:60%;
        }

        /* The Close Button */
        .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        }

        .close:hover,
        .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
        }

    </style>
</head>

<body>

    <div id="wrapper">

        <!-- Header Container ================================================== -->
        <header id="header-container" class="fullwidth">

            <!-- Header -->
            <div id="header">
                <div class="container">

                    <!-- Left Side Content -->
                    <div class="left-side">
                        
                        <!-- Logo -->
                        <div id="logo">
                            <form enctype="multipart/form-data" method="POST">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="col-md-6 col-xs-6">
                                        <a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/index.php"><img src="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/images1/HomePage/logo.png" alt=""></a>
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                            <!-- <div id="myBtn">
                                                <span>Select City</span>
                                            </div> -->
                                            <!-- The Modal -->
                                            <?php 
                                               
                                                if($_SESSION['locationUrl']){
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
                                                    <p><?php echo $cityLoc ?></p>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                            <!-- <span style="margin-right:10px;">
                                <div class="col-12 col-md-4">
                                    
                                </div>
                            </span> -->
                        </div>

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

                                <li><a class="current" href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/index.php">Home</a>
                                </li>

                                <li><a href="/HTML/Our-Complete-Services.html">Services</a>
                                </li>

                                <li><a href="/HTML/Venues.html">Venues</a>
                                </li>

                                <li><a href="#">Wedding Stories</a>
                                </li>

                                <li><a href="/HTML/contact.html">Contact</a>
                                </li>

                                <li><a href="/HTML/vendors.html">For Vendors</a>
                                </li>

                                <li><a href="#">Live Booking</a>
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