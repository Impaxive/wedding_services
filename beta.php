<?php include('dbconn.php') ?>
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
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

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
                                            <div id="myBtn">
                                                <?php if(!$_SESSION['locationUrl']){?>
                                                    <span>Select City</span>
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
                                                    <p><?php echo $cityLoc;?></p>
                                               <?php } ?>
                                                
                                            </div>
                                            <!-- The Modal -->
                                               
                                           
                                           
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
        <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
        
        <?php 
            if(isset($_POST['submitloc'])){
                $urlLoc = $_POST['location_url']; 
                $_SESSION['locationUrl'] = $urlLoc;
            // echo $_POST['location_url'];
            echo "<script>window.location.href='$urlLoc';</script>";
        }
        ?>


    

 
    <!-- banner ================================================== -->
    <div class="main-search-container"
        style="background-image: url('/images1/HomePage/AdobeStock_183485123.jpeg');">
       
        <div class="main-search-inner">

            <div class="container">
                <form enctype="multipart/form-data" method="POST">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2>Find Nearby Wedding <span class="typed-words"></span></h2>
                            <h4></h4>

                            <div class="main-search-input">
                                <div class="main-search-input-item">
                                    <select data-placeholder="What are you looking for?" name="category_id" class="chosen-select">
                                        <option>What are you looking for?</option>
                                        <?php 
                                        $sql3 = "SELECT * FROM categories";
                                        $result3 = $conn->query($sql3);
                                        // output data of each row
                                        if($result3->num_rows > 0){
                                            while ($row = $result3->fetch_assoc()) {
                                                $title = $row['title'];
                                                $caturl = $row['url'];
                                        ?>
                                        <option value="<?php echo $caturl; ?>"><?php echo $title; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="main-search-input-item">
                                    <select name="location_id" data-placeholder="All Categories" class="chosen-select">
                                    <option>All Cities</option>
                                    <?php 
                                        $sql3 = "SELECT * FROM locations";
                                        $result3 = $conn->query($sql3);
                                        // output data of each row
                                        if($result3->num_rows > 0){
                                            while ($row = $result3->fetch_assoc()) {
                                                $city = $row['city'];
                                                $locationId = $row['location_id'];
                                                $url = $row['url'];
                                    ?>
                                        <option value="<?php echo $url; ?>"><?php echo $city; ?></option>
                                    <?php 
                                            }
                                        }
                                    ?>
                                    </select>
                                </div>

                                <button class="button" type="submit" name="submit">Search</button>

                            </div>
                        </div>
                    </div>
                </form>   
            </div>

        </div>
    </div>

    <!-- Cotegories ================================================== -->
    <div class="container margin-top-70">
        <div class="row">

            <div class="col-md-12">
                <h3 class="headline centered margin-bottom-45">
                    <strong class="headline-with-separator">Popular Categories</strong>
                </h3>
            </div>

            <div class="col-md-12">
                <a href="/HTML/Our-Complete-Services.html" id="servicesPageLink">
                    <h3>
                        View All Categories
                    </h3>
                </a>
            </div>

            <div class="col-md-12 ">
                <div class="simple-slick-carousel dots-nav">
                <?php
                    if(isset($_POST['submit']))
                    {
                        $lid = $_POST['location_id'];
                        $cat_id = $_POST['category_id'];
                        // if($_POST['location_id'] !='' && $_POST['category_id'] != ''){
                            $sql_loc = "SELECT * FROM locations WHERE `url` = '$lid'";
                            $res_loc = $conn -> query($sql_loc);
                            // output data of each row
                            if($res_loc->num_rows > 0){
                                while ($row = $res_loc->fetch_assoc()) {
                                    $locationId = $row['location_id'];


                                    $sql_cat = "SELECT * FROM categories WHERE `url` = '$cat_id'";
                                    $res_cat = $conn -> query($sql_cat);
                                    // output data of each row
                                    if($res_cat->num_rows > 0){
                                        while ($row = $res_cat->fetch_assoc()) {
                                            $category_id = $row['category_id'];


                                            $sql = "SELECT * FROM listing_table WHERE location_id = $locationId AND category_id='$category_id'";
                                            $result = $conn->query($sql); 
                                            if($result->num_rows>0){
                                                echo "<script>window.location.href='http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/$lid/$cat_id';</script>";
                                            }else{
                                                echo "No Data Found";
                                            }
                                        }
                                    }
                                }
                            }
                            
                            
                        // }
                            
                    }
                    else{ 
                        $sql = "SELECT * FROM listing";   
                    }
                    ?>
                    <?php
                    $sql = "SELECT * FROM categories"; 
                    $result = $conn->query($sql);  
                    if($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()) {
                        $title = $row['title'];
                        $category_url = $row['url'];
                        $featured_image = $row['featured_image'];
                        $catid = $row['category_id'];
                        $desc = $row['description'];
                    ?>
                    <?php echo  $_SESSION['locationUrl'],$row['url']; ?>

                    <!-- Listing Item -->
                    <div class="carousel-item">
                        <a href="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/<?php echo $_SESSION['locationUrl']?>/<?php echo $category_url; ?>" class="listing-item-container">
                            <div class="listing-item">
                                <img src="https://mywedservices.s3.ap-south-1.amazonaws.com/<?php echo $featured_image;  ?>" alt="">
                                <div class="listing-item-content">
                                    <h3><?php echo $title; ?></h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Listing Item / End -->
                    <?php 
                }
                }
                ?>
                </div>

            </div>

        </div>
    </div>
    <!-- Listings / End -->

    <!-- Venues Carousel -->
    <section class="fullwidth border-top margin-top-65 padding-top-75 padding-bottom-70"
        data-background-color="#fff">

        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h3 class="headline centered margin-bottom-45">
                        <strong class="headline-with-separator">Top 10 Wedding Venues</strong>

                    </h3>
                </div>
            </div>
        </div>

        <!-- Carousel / Start -->
        <div class="simple-fw-slick-carousel dots-nav">
           <?php
            if(isset($_POST['submit']))
            {
                $locId = $_POST['location_url'];
                echo "$locId";
                $sql_loc = "SELECT * FROM locations WHERE `url` = '$locId'";
                $res_loc = $conn -> query($sql_loc);
                // output data of each row
                if($res_loc->num_rows > 0){
                    while ($row = $res_loc->fetch_assoc()) {
                        $locationId = $row['location_id'];   
                    }
                }
                $list_sql = "SELECT * FROM listing_table WHERE location_id = $locationId";
                // echo "SUBMIT";
                    
            }else{
                $list_sql = "SELECT * FROM listing_table";
            }
            $list_result = $conn->query($list_sql); 
            if($list_result->num_rows>0){
                while ($row = $list_result->fetch_assoc()) {
                    $id=$row['list_id'];
                    // $alias = $row['alias'];
                    $correl_id = $row['correl_id'];
                    $title = $row['title'];
                    $about = $row['about'];
                    $category_id = $row['category_id'];
                    $location_id = $row['location_id'];
                    $list_url = $row['url'];
                    $meta_tags = $row['meta_tags'];
                    $featured_image = $row['featured_image'];
                    $pricing = $row['pricing'];
                    $price_range = $row['price_range'];
                    $position = $row['position'];
            ?>
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="https://mywedservices.s3.ap-south-1.amazonaws.com/<?php echo $featured_image ?>" alt="">
                        <div class="listing-item-content">
                            <h3><?php echo $title; ?></h3>
                        </div>
                    </div>
                </a>
            </div>
            <?php 
                }
            }
            ?>
            <!-- Listing Item / End -->
        </div>
        <!-- Carousel / End -->


    </section>
    <!-- Fullwidth Section / End -->

    <!-- Decorators Carousel -->
    <section class="fullwidth border-top margin-top-65 padding-top-75 padding-bottom-70"
        data-background-color="#fff">

        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h3 class="headline centered margin-bottom-45">
                        <strong class="headline-with-separator">Top 10 Wedding Decorators</strong>

                    </h3>
                </div>
            </div>
        </div>

        <!-- Carousel / Start -->
        <div class="simple-fw-slick-carousel dots-nav">

            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Decoration/IMG-20201222-WA0032.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Decoration-1</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Decoration/IMG-20201222-WA0039.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Decoration-2</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Decoration/IMG-20201222-WA0042.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Decoration-3</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Decoration/IMG-20201222-WA0030.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Decoration-4</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Decoration/IMG-20201222-WA0032.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Decoration-5</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Decoration/IMG-20201222-WA0034.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Decoration-6</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Decoration/IMG-20201222-WA0027.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Decoration-7</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Decoration/IMG-20210513-WA0045.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Decoration-8</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Decoration/IMG-20201222-WA0028.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Decoration-9</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Decoration/IMG-20201222-WA0029.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Decoration-10</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->

        </div>
        <!-- Carousel / End -->


    </section>
    <!-- Fullwidth Section / End -->

    <!-- Caterers Carousel -->
    <section class="fullwidth border-top margin-top-65 padding-top-75 padding-bottom-70"
        data-background-color="#fff">

        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h3 class="headline centered margin-bottom-45">
                        <strong class="headline-with-separator">Top 10 Wedding Catering</strong>

                    </h3>
                </div>
            </div>
        </div>

        <!-- Carousel / Start -->
        <div class="simple-fw-slick-carousel dots-nav">

            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Catering/Catering(1).jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Catering-1</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Catering/catering.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Catering-2</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Catering/Copy of IMG-20210408-WA0016.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Catering-3</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Catering/Copy of IMG-20210408-WA0018.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Catering-4</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Catering/IMG-20210408-WA0013.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Catering-5</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Catering/IMG-20210408-WA0018.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Catering-6</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Catering/IMG-20210408-WA0025.jpg" alt="">
                        <div class="listing-item-content">
                            <h3Catering-7< /h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Catering/Catering(1).jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Catering-8</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Catering/catering.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Catering-9</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Catering/IMG-20210408-WA0018.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Catering-10</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->

        </div>
        <!-- Carousel / End -->


    </section>
    <!-- Fullwidth Section / End -->

    <!-- Photography Carousel -->
    <section class="fullwidth border-top margin-top-65 padding-top-75 padding-bottom-70"
        data-background-color="#fff">

        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h3 class="headline centered margin-bottom-45">
                        <strong class="headline-with-separator">Top 10 Wedding Photography</strong>

                    </h3>
                </div>
            </div>
        </div>

        <!-- Carousel / Start -->
        <div class="simple-fw-slick-carousel dots-nav">

            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Photography/20.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Photography-1</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Photography/25.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Photography-2</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Photography/AdobeStock_298635216.jpeg" alt="">
                        <div class="listing-item-content">
                            <h3>Photography-3</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Photography/18.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Photography-4</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Photography/14.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Photography-5</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Photography/20.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Photography-6</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Photography/25.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Photography-7</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Photography/AdobeStock_298635216.jpeg" alt="">
                        <div class="listing-item-content">
                            <h3>Photography-8</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Photography/18.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Photography-9</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Photography/14.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Photography-10</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->

        </div>
        <!-- Carousel / End -->


    </section>
    <!-- Fullwidth Section / End -->

    <!-- Makeup Carousel -->
    <section class="fullwidth border-top margin-top-65 padding-top-75 padding-bottom-70"
        data-background-color="#fff">

        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h3 class="headline centered margin-bottom-45">
                        <strong class="headline-with-separator">Top 10 Wedding Make up</strong>

                    </h3>
                </div>
            </div>
        </div>

        <!-- Carousel / Start -->
        <div class="simple-fw-slick-carousel dots-nav">

            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Makeup/make up.1.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Makeup-1</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Makeup/Makeup1.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Makeup-2</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Makeup/Makeup2.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Makeup-3</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Makeup/Makeup3.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Makeup-4</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Makeup/Makeup4.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Makeup-5</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Makeup/make up 3.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Makeup-6</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Makeup/Make up.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Makeup-7</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Makeup/make up.1.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Makeup-8</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Makeup/Makeup1.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Makeup-9</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->
            <!-- Listing Item -->
            <div class="fw-carousel-item">
                <a href="#" class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="images1/Makeup/Makeup3.jpg" alt="">
                        <div class="listing-item-content">
                            <h3>Makeup-10</h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Listing Item / End -->

        </div>
        <!-- Carousel / End -->


    </section>
    <!-- Fullwidth Section / End -->

    <!-- Info Section -->
    <section class="fullwidth padding-top-75 padding-bottom-70" data-background-color="#f9f9f9">
        <div class="container padding-50">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h3 class="headline centered headline-extra-spacing">
                        <strong class="headline-with-separator">Plan The Vacation of Your Dreams</strong>
                        <span class="margin-top-25">Explore some of the best tips from around the world from our
                            partners and friends. Discover some of the most popular listings!</span>
                    </h3>
                </div>
            </div>

            <div class="row icons-container">
                <!-- Stage -->
                <div class="col-md-4" id="iconsBoxWithText">
                    <div class="icon-box-2 with-line">
                        <i class="im im-icon-Map2"></i>
                        <h3>Find Interesting Place</h3>
                        <p>Proin dapibus nisl ornare diam varius tempus. Aenean a quam luctus, finibus.</p>
                    </div>
                </div>

                <!-- Stage -->
                <div class="col-md-4" id="iconsBoxWithText">
                    <div class="icon-box-2 with-line">
                        <i class="im im-icon-Speach-Bubble3"></i>
                        <h3>Check Reviews</h3>
                        <p>Maecenas pulvinar, risus in facilisis dignissim, quam nisi.</p>
                    </div>
                </div>

                <!-- Stage -->
                <div class="col-md-4" id="iconsBoxWithText">
                    <div class="icon-box-2">
                        <i class="im im-icon-Checked-User"></i>
                        <h3>Make a Reservation</h3>
                        <p>Faucibus ante, in porttitor tellus blandit et. Phasellus tincidunt metus.</p>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Info Section / End -->

    <!-- Wedding Stories Blog Posts -->
    <section class="fullwidth padding-top-75 padding-bottom-75">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h3 class="headline centered margin-bottom-45">
                        <strong class="headline-with-separator">Wedding Stories</strong>
                    </h3>
                </div>
            </div>

            <div class="row">
                <!-- Blog Post Item -->
                <div class="col-md-4">
                    <a href="/HTML/Wedding-Stories1.html" class="blog-compact-item-container">
                        <div class="blog-compact-item">
                            <img src="images1/weddingstories/AdobeStock_286280748.jpeg" alt="">
                            <div class="blog-compact-item-content">
                                <ul class="blog-post-tags">
                                </ul>
                                <h3>Lorem Ipsum</h3>
                                <p>Sed sed tristique nibh iam porta volutpat finibus. Donec in aliquet urneget
                                    mattis lorem. Pellentesque pellentesque.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Blog post Item / End -->

                <!-- Blog Post Item -->
                <div class="col-md-4">
                    <a href="/HTML/Wedding-Stories2.html" class="blog-compact-item-container">
                        <div class="blog-compact-item">
                            <img src="images1/weddingstories/23.jpg" alt="">
                            <div class="blog-compact-item-content">
                                <ul class="blog-post-tags">
                                </ul>
                                <h3>Lorem Ipsum</h3>
                                <p>Sed sed tristique nibh iam porta volutpat finibus. Donec in aliquet urneget
                                    mattis lorem. Pellentesque pellentesque.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Blog post Item / End -->

                <!-- Blog Post Item -->
                <div class="col-md-4">
                    <a href="/HTML/Wedding-Stories3.html" class="blog-compact-item-container">
                        <div class="blog-compact-item">
                            <img src="images1/weddingstories/24.jpg" alt="">
                            <div class="blog-compact-item-content">
                                <ul class="blog-post-tags">
                                </ul>
                                <h3>Lorem Ipsum</h3>
                                <p>Sed sed tristique nibh iam porta volutpat finibus. Donec in aliquet urneget
                                    mattis lorem. Pellentesque pellentesque.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Blog post Item / End -->

                <div class="col-md-12 centered-content">
                    <a href="#" class="button border margin-top-10">View More</a>
                </div>

            </div>

        </div>
    </section>
    <!-- Recent Blog Posts / End -->

    <!-- Flip banner -->
    <a href="listings-half-screen-map-list.html" class="flip-banner parallax"
        data-background="images1/HomePage/homePageFlipBanner.jpg" data-color="#000" data-color-opacity="0.45"
        data-img-width="2500" data-img-height="1666">
        <div class="flip-banner-content">
            <h2 class="flip-visible">Are you a Vendor?</h2>
            <h2 class="flip-hidden">Click here to Associate with us<i class="sl sl-icon-arrow-right"></i></h2>
        </div>
    </a>
    <!-- Flip banner / End -->
    
     <!-- Footer ================================================== -->
  <div id="footer">
            <!-- Main -->
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <h3>About Us</h3>
                        <p>We will make your wedding planning easy by providing all the relevant information on the
                            services you need.</p>
                    </div>

                    <div class="col-md-6  col-sm-12">
                        <h3>Contact Us</h3>
                        <ul class="margin-top-20">
                            <li>Road No #1, Street No 23, Hyderabad, TG</li>
                            <li>Phone : +91 xxxxxxxx</li>
                        </ul>

                    </div>

                </div>

                <!-- Copyright -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyrights">©AmSon Wedding Services. All Rights Reserved.</div>
                    </div>
                </div>

            </div>

        </div>
        <!-- Footer / End -->


        <!-- Back To Top Button -->
        <div id="backtotop"><a href="#"></a></div>


    </div>


    <!-- Scripts
================================================== -->
    <script type="text/javascript" src="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/scripts/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/scripts/jquery-migrate-3.3.2.min.js"></script>
    <script type="text/javascript" src="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/scripts/mmenu.min.js"></script>
    <script type="text/javascript" src="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/scripts/chosen.min.js"></script>
    <script type="text/javascript" src="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/scripts/slick.min.js"></script>
    <script type="text/javascript" src="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/scripts/rangeslider.min.js"></script>
    <script type="text/javascript" src="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/scripts/magnific-popup.min.js"></script>
    <script type="text/javascript" src="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/scripts/waypoints.min.js"></script>
    <script type="text/javascript" src="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/scripts/counterup.min.js"></script>
    <script type="text/javascript" src="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/scripts/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/scripts/tooltips.min.js"></script>
    <script type="text/javascript" src="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/scripts/custom.js"></script>
    <script type="text/javascript" src="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/scripts/extensions/revolution.extension.carousel.min.js"></script>

    <!-- Leaflet // Docs: https://leafletjs.com/ -->
    <script src="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/scripts/leaflet.min.js"></script>

    <!-- Leaflet Maps Scripts -->
    <script src="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/scripts/leaflet-markercluster.min.js"></script>
    <script src="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/scripts/leaflet-gesture-handling.min.js"></script>
    <script src="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/scripts/leaflet-listeo.js"></script>

    <!-- Leaflet Geocoder + Search Autocomplete // Docs: https://github.com/perliedman/leaflet-control-geocoder -->
    <script src="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/scripts/leaflet-autocomplete.js"></script>
    <script src="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/scripts/leaflet-control-geocoder.js"></script>



    <!-- Typed Script -->
    <script type="text/javascript" src="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/scripts/typed.js"></script>
    <script>
        var typed = new Typed('.typed-words', {
            strings: ["Services", " Venues", " Caterers"],
            typeSpeed: 80,
            backSpeed: 80,
            backDelay: 4000,
            startDelay: 1000,
            loop: true,
            showCursor: true
        });
    </script>


    <!-- Location Model Script -->
    <script type="text/javascript">
       $(window).load(function()
        {
            $('#myModal').modal('show');
        });
    </script>


    <!-- Home Search Scripts -->
    <script>
        $(window).on('load', function () { $('.msps-shapes').addClass('shapes-animation'); });
    </script>

    <script src="http://ec2-13-234-29-49.ap-south-1.compute.amazonaws.com/scripts/parallax.min.js"></script>
    <script>
        const parent = document.getElementById('scene');
        const parallax = new Parallax(parent, {
            limitX: 50,
            limitY: 50,
        });


        $('.msps-slider').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 5000,
            speed: 1000,
            fade: true,
            cssEase: 'linear'
        });

    </script>


</body>

</html>